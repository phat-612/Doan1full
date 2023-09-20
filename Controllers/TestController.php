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

        public function guiotp(){
            $this->userModel->creatOtp($_POST['email']);
        }
    }
?>