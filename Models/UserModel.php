<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    class UserModel extends BaseModel{
        public function creatOtp($email){
            $mail = new PHPMailer(true);
            $otp = $this->randomCode();
            $data = [
                'email' => $email,
                'otp' => $otp,
            ];
            $this->delete('xacnhanemail', "email = '$email'");
            $this->create('xacnhanemail', $data);
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
                $mail->Subject ='=?UTF-8?B?' . base64_encode('Xác nhận đăng nhập') . '?='; //tieu de
                $mail->Body = "Mã xác nhận của bạn là $otp"; // Nội dung email

                // Gửi email và kiểm tra kết quả
                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message has been sent.';
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        public function verifyOtp($email, $otp){
            $isVerify = $this->select('xacnhanemail', 'id', "email = '$email' and otp = '$otp' and TIMESTAMPDIFF(MINUTE, thoigian, NOW()) < 3");
            if ($isVerify){
                echo "thành công";
                $_SESSION['email'] = $email;
            } else{
                echo "thất bại";
            }
        }
        public function adminLogin($taikhoan, $matkhau){
            $isLogin = $this->select('admin', 'hoten', "taikhoan = '$taikhoan' and matkhau = '$matkhau'");
            if($isLogin){
                
            } else {
                echo "thất bại";
            }
        }
        public function randomCode() {
            $code = '';
            for ($i = 0; $i < 6; $i++){
                $code .= rand(0,9);
            }
            return $code;
        }
    }
?>
<!-- xác nhận đăng nhập = mail -->
<!-- admin đăng nhập -->
