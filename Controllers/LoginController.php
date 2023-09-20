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
    }
?>