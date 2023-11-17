<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    class UserModel extends BaseModel{
        public function sendOtpEmail($email, $isExist = false){
            if (!(($this->isExistEmail($email)) == $isExist)){
                return false;
            }
            $otp = $this->randomCode(6);
            $data = [
                'email'=>$email,
                'otp'=>$otp
            ];
            try {
                $this->create('otp', $data);
            } catch (\Throwable $th) {
                // xử lý email đã tồn tại trong otp
                $this->delete('otp', "email = '$email'");
                $this->create('otp', $data);
            }
            $contentEmail = "
                <html>
                    <head>
                        <style>
                            p{
                                text-align: center;
                                font-size: 48px;
                                color:red;
                            }
                        </style>
                    </head>
                    <body>
                        <h2>Mã OTP của bạn có hiệu lực trong 3 phút</h2>
                        <p>$otp</p>
                    </body>
                </html>
            ";
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'phatforstudy612@gmail.com';                     //SMTP username
                $mail->Password   = 'bkfdgfvhanesxltv';                               //SMTP password
                $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                $mail->setFrom('phatforstudy612@gmail.com'); // Địa chỉ email gửi và tên người gửi
                $mail->addAddress($email); // Địa chỉ email nhận và tên người nhận

                // Cấu hình nội dung email
                $mail->isHTML(true);
                $mail->Subject ='=?UTF-8?B?' . base64_encode('Xác Nhận Xem Lịch Sử') . '?=';
                
                $mail->Body = $contentEmail; // Nội dung email

                // Gửi email và kiểm tra kết quả
                if (!$mail->send()) {
                    return false;
                } else {
                    return true;
                }
            } catch (Exception $e) {
                return false;
            }
        }
        public function verifyOtp($email, $otp){
            $isVerify = $this->select('otp', 'email', "email = '$email' and otp = '$otp' and TIMESTAMPDIFF(MINUTE, thoigian, NOW()) < 3");
            if ($isVerify){
                return true;
            } else{
                return false;
            }
        }
        public function login($taikhoan, $matkhau){
            $dataUser = $this->select('taikhoan', 'taikhoan, matkhau', "taikhoan = '$taikhoan'");
            if (!$dataUser){
                return false;
            }
            $dataUser = $dataUser[0];
            if ($dataUser['taikhoan'] == $taikhoan && $dataUser['matkhau'] == $matkhau){
                $dataCookie =  $this->encodeData(json_encode($dataUser));
                setcookie('verify_login', $dataCookie, time() + 3600, '/');
                $_SESSION['isLogin'] = true;
                $_SESSION['role'] = $dataUser['quyen'];
                return true;
            } else{
                return false;
            }
        }
        public function signup(){
            if ($this->isExistEmail($_POST['email'])){
                return false;
            }

            $data = [
                'taikhoan' => $_POST['email'],
                'matkhau' => $_POST['matkhau'],
                'hoten' => $_POST['hoten'],
                'sodienthoai' => $_POST['sodienthoai'],
                'ngaysinh' => $_POST['ngaysinh'],
                'quyen' => isset($_POST['quyen']) ? $_POST['quyen']: '0',
            ];
            if ($this->verifyOtp($_POST['email'], $_POST['otp'])){
                return $this->create('taikhoan', $data);
            }
            return false;
        }

        // tổng số khánh hàng
        public function totalCustomers(){
            $sql = "SELECT DISTINCT COUNT(id) AS total_customers
            FROM taikhoan";
            $query = $this->select_by_sql($sql);
            return $query[0]['total_customers'];
        }
        public function logout(){
            if (isset($_COOKIE['verify_login'])){
                setcookie('verify_login', '', time() - 10, '/');
            }
            if (isset($_SESSION['isLogin'])){
                unset($_SESSION['isLogin']);
            }
            return true;
        }
        public function randomCode($length) {
            $code = '';
            for ($i = 0; $i < $length; $i++){
                $code .= rand(0,9);
            }
            return $code;
        }
        public function encodeData($data){
            $secretKey = 'qweetretewrtggdfsg';
            $key = base64_decode($secretKey);
            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
            $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
            return base64_encode($encrypted . '::' . $iv);
        }
        public function decodeData($dataEncode){
            $secretKey = 'qweetretewrtggdfsg';
            $key = base64_decode($secretKey);
            $decodeData = base64_decode($dataEncode);
            [$dataEncode, $iv] = explode('::', $decodeData);
            $decrypted = openssl_decrypt($dataEncode, 'aes-256-cbc', $key, 0, $iv);
            return $decrypted;
        }
        public function isExistEmail($email){
            $query = $this->select('taikhoan', 'id', "taikhoan = '$email'");
            if ($query){
                return true;
            }
            return false;
        }

    }
?>
