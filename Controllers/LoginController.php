<?php
    class LoginController extends BaseController{
        private $userModel;
        public function __construct(){
            $this->importModel('UserModel');
            $this->userModel = new UserModel();
        }
        public function index(){
            
            if (isset($_SESSION['email'])){
                $this->gotoPage('lichsumuahang');
            }
            return $this->render('layouts/user',[
                'content' => 'userlogins/login',
                'title' => 'Đăng nhập',
                'css_js' => 'login'
            ]);
        }
        public function otp(){
            if (!isset( $_SESSION['tempEmail'])){
                $this->gotoPage('login');
            }
            return $this->render('layouts/user',[
                'content' => 'userlogins/otp',
                'title' => 'OTP',
                'css_js' => 'login'
            ]);
        }
    }
?>