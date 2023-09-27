<?php
    class LoginController extends BaseController{
        private $userModel;
        public function __construct(){
            $this->importModel('UserModel');
            $this->userModel = new UserModel();
        }
        public function index(){
            return $this->render('layouts/user',[
                'content' => 'userlogins/login',
                'title' => 'Đăng nhập',
                'css_js' => 'login'
            ]);
        }
        public function otp(){
            return $this->render('layouts/user',[
                'content' => 'userlogins/otp',
                'title' => 'OTP',
                'css_js' => 'login'
            ]);
        }
    }
?>