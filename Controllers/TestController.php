<?php

    class TestController extends BaseController{
        private $orderModel;
        private $producModel;
        private $userModel;
        public function __construct()
        {
            $this -> importModel('OrderModel');
            $this->importModel('ProductModel');
            $this->importModel('UserModel');
            $this -> orderModel = new OrderModel();
            $this->producModel = new ProductModel();
            $this->userModel = new UserModel();
        }
        public function index(){
        }

        public function guimai(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = $_POST['email'];
                $this->userModel->creatOtp($email);
            }
            
        }
        public function xacnhanemail(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = $_POST['email'];
                $otp = $_POST['otp'];
                $this->userModel->verifyOtp($email, $otp);
            }
            
        }
    }
?>