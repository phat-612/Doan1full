<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    class UserModel extends BaseModel{
        public function sendOrderToEmail($email, $dataOrder = []){
            /*
                [
                    [
                        hoten,
                        email,
                        sodienthoai,
                        diachi,
                        ghichu,
                        chitietdonhang[
                            
                        ]
                    ],
                ]
            */
            if (!($this->isExistEmail($email))){
                return false;
            }
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
                $mail->Subject ='=?UTF-8?B?' . base64_encode('Thông tin đơn hàng bạn đã đặt') . '?=';
                $mail->Body = "<h1>Xin chào</h1>"; // Nội dung email

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
            $isVerify = $this->select('xacnhanemail', 'id', "email = '$email' and otp = '$otp' and TIMESTAMPDIFF(MINUTE, thoigian, NOW()) < 3");
            if ($isVerify){
                $_SESSION['email'] = $email;
                
                return true;
            } else{
                return false;
            }
        }
        public function adminLogin($taikhoan, $matkhau){
            $dataUser = $this->select('admin', 'taikhoan, matkhau', "taikhoan = '$taikhoan'");
            if (!$dataUser){
                return false;
            }
            $dataUser = $dataUser[0];
            if ($dataUser['taikhoan'] == $taikhoan && $dataUser['matkhau'] == $matkhau){
                $dataCookie =  $this->encodeData(json_encode($dataUser));
                setcookie('verify_login', $dataCookie, time() + 3600, '/');
                $_SESSION['isLogin'] = true;
                return true;
            } else{
                return false;
            }
        }
        // tổng số khánh hàng
        public function totalCustomers(){
            $sql = "SELECT DISTINCT COUNT(DISTINCT sodienthoai) AS total_customers
            FROM khachhang";
            $query = $this->select_by_sql($sql);
            return $query[0]['total_customers'];
        }
        public function adminLogout(){
            if (isset($_COOKIE['verify_login'])){
                setcookie('verify_login', '', time() - 10, '/');
            }
            if (isset($_SESSION['isLogin'])){
                unset($_SESSION['isLogin']);
            }
            return true;
        }
        public function randomCode() {
            $code = '';
            for ($i = 0; $i < 6; $i++){
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
        public function isExistEmail($mail){
            $query = $this->select('khachhang', 'id', "email = '$mail'");
            if ($query){
                return true;
            }
            return false;
        }
    }
?>
