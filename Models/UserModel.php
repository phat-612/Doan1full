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
            $dataUser = $this->select('taikhoan', '*', "taikhoan = '$taikhoan'");
            if (!$dataUser){
                return false;
            }
            $dataUser = $dataUser[0];
            if ($dataUser['taikhoan'] == $taikhoan && password_verify($matkhau, $dataUser['matkhau'])){
                // $dataCookie =  $this->encodeData(json_encode($dataUser));
                // setcookie('verify_login', $dataCookie, time() + 3600, '/');
                $_SESSION['isLogin'] = true;
                $_SESSION['role'] = $dataUser['quyen'];
                $_SESSION['email'] = $dataUser['taikhoan'];
                $_SESSION['hoten'] = $dataUser['hoten'];
                $_SESSION['id'] = $dataUser['id'];
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
                'matkhau' => password_hash($_POST['matkhau'], PASSWORD_DEFAULT),
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
        public function logout(){
            // if (isset($_COOKIE['verify_login'])){
            //     setcookie('verify_login', '', time() - 10, '/');
            // }
            if (isset($_SESSION['isLogin'])){
                // unset($_SESSION['isLogin']);
                session_unset() ;
            }
            return true;
        }
        public function getUserInfo($email){
            $res = $this->select('taikhoan', 'hoten, taikhoan, ngaysinh, sodienthoai, gioitinh', "taikhoan='$email'");
            return $res[0];
        }
        public function changeUserInfo(){
            $data = [
                'hoten'=>$_POST['hoten'],
                'ngaysinh'=>$_POST['ngaysinh'],
                'gioitinh'=>$_POST['gioitinh'],
            ];
            return $this->update('taikhoan', $data, $_SESSION['id']);
        }
        // đổi mật khẩu
        public function changePassword(){
            if (!isset($_SESSION['isLogin'])){
                return false;
            }
            $user = $_SESSION['email'];
            $oldPass = $_POST['oldPass'];
            $newPass = $_POST['newPass'];
            $sql = "select * from taikhoan where taikhoan='$user'";
            $query = $this->select_by_sql($sql);
            if (!$query){
                return false;
            }
            if (!password_verify($oldPass, $query[0]['matkhau'])){
                return false;
            }
            $hashPass = password_hash($newPass, PASSWORD_DEFAULT);
            $sql = "UPDATE taikhoan SET matkhau='$hashPass' where taikhoan='$user'";
            $this->select_by_sql($sql);
            return true;
        }
        // tổng số khánh hàng
        public function totalCustomers(){
            $sql = "SELECT DISTINCT COUNT(id) AS total_customers
            FROM taikhoan";
            $query = $this->select_by_sql($sql);
            return $query[0]['total_customers'];
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
