<?php
    class LoginController extends BaseController{
        private $userModel;
        public function __construct(){
            $this->importModel('UserModel');
            $this->userModel = new UserModel();
        }
        public function index(){
            return $this->render('layouts/user',[
                'content' => 'verifyemail/nhapmail',
                'title' => 'Đăng nhập',
                
            ]);
        }
        public function nhapotp(){
            return $this->render('layouts/user',[
                'content' => 'verifyemail/nhapotp',
                'title' => 'Xác nhận OTP',
                
            ]);
        }
        public function guiotp(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $this->userModel->creatOtp($_POST['email']);
                $_SESSION['tempEmail'] = $_POST['email'];
                return header("Location: /" . $GLOBALS['rootPath'] . "/login/nhapotp");
            }
        }
        public function xacnhanotp(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $this->userModel->verifyOtp($_SESSION['tempEmail'], $_POST['otp']);
                if (isset($_SESSION['email'])){
                    echo 'đăng nhập thành công';
                } else{
                    echo 'sai otp';
                }
            }
        }
    }
?>