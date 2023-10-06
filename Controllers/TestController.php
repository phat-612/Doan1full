<?php

    class TestController extends BaseController{
        private $orderModel;
        private $producModel;
        private $userModel;
        private $testModel;
        public function __construct()
        {
            $this -> importModel('OrderModel');
            $this->importModel('ProductModel');
            $this->importModel('UserModel');
            $this->importModel('TestModel');
            $this -> orderModel = new OrderModel();
            $this->producModel = new ProductModel();
            $this->userModel = new UserModel();
            $this->testModel = new TestModel();
        }
        public function index(){
        }

        public function guiotp(){
            $this->userModel->creatOtp($_POST['email']);
        }
        // public function countProduct(){
        //     echo $this->testModel->getNumberProduct(); 
        // }
        public function total() {
            echo $this->testModel->total_customers();
        }
        public function oders(){
            echo $this->testModel->getOrder($_POST['trangthai'], $_POST['bd'],$_POST['kt']);
        }
        public function revenue() {
            echo $this->orderModel->totalRevenue('Thành công','2023-10-04','2023-11-05');
        }
        public function themsp(){
            $this->producModel->addProduct($_POST, $_FILES);
        }
        public function suasp(){
            $this->producModel->updateProduct($_POST, $_FILES, $_POST['id']);
        }
    }
?>