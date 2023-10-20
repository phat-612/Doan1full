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
            $this ->orderModel = new OrderModel();
            $this->producModel = new ProductModel();
            $this->userModel = new UserModel();
            $this->testModel = new TestModel();
        }
        public function index(){
        }
        // public function countProduct(){
        //     echo $this->testModel->getNumberProduct(); 
        // }
        public function total() {
            echo $this->testModel->total_customers();
        }
        public function oders(){
            echo $this->testModel->getOrder('','2023-10-05','2023-12-05');
        }
        public function revenue() {
            echo $this->orderModel->totalRevenue('Thành công','2023-10-04','2023-12-20');
        }
        public function themsp(){
            $this->producModel->addProduct($_POST, $_FILES);
        }
        public function suasp(){
            $this->producModel->updateProduct($_POST, $_FILES, $_POST['id']);
        }
        public function product(){
            echo $this->testModel->getProduct();
        }
        public function size(){
            echo $this->testModel->getSizes();
        }
        public function data(){
          echo $this->testModel->getDataProduct('2');
        }
        public function dataOrder(){
            echo $this->testModel->getDataOrder('4');
        }
        public function dataPageProduct(){
            inmang($this->testModel->getPageDataProduct());
        }
        public function themKt(){
            if ($this->producModel->deleteDetailValue('kichthuoc', $_POST['id'])){
                echo 'da them';
            } else{
                echo 'chua them';
            }
        }
        public function themDh(){
            $res = $this->orderModel->addOrder($_POST);
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
        }
    }
?>