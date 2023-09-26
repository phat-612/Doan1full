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
                
            ]);
        }
    }
?>