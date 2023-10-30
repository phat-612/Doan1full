<?php

    class TestController extends BaseController{
        private $orderModel;
        private $productModel;
        private $userModel;
        private $testModel;
        private $sliderModel;
        public function __construct()
        {
            $this->importModel('OrderModel');
            $this->importModel('ProductModel');
            $this->importModel('UserModel');
            $this->importModel('TestModel');
            $this->importModel('SliderModel');
            $this ->orderModel = new OrderModel();
            $this->productModel = new ProductModel();
            $this->userModel = new UserModel();
            $this->testModel = new TestModel();
            $this->sliderModel = new SliderModel();
        }
        public function index(){
        }
        public function sr(){
            inmang($this->productModel->srProduct($_POST['name']));
        }
        public function total() {
            echo $this->userModel->totalCustomers();
        }

        // public function oders(){
        //     echo $this->orderModel->getOrder('Chờ xử lý','','');
        // }
        public function revenue(){
            echo $this->orderModel->totalRevenue('Thành công','','');
        }
        public function themsp(){
            $this->productModel->addProduct($_POST, $_FILES);
        }
        public function suasp(){
            $this->productModel->updateProduct($_POST, $_FILES, $_POST['id']);
        }
        public function product(){
            echo $this->testModel->getProduct();
        }
        public function size(){
            echo $this->testModel->getSizes();
        }
        public function data(){
          inmang($this->testModel->getDataProduct($_POST['id']));
        }
        public function dataOrder(){
           inmang($this->testModel->getDataOrder($_POST['id']));
        }
        public function addPro(){
            inmang($this->productModel->addProduct(['ten']));
        }
        public function get_ALL(){
            // inmang($this->testModel->getAll(size: ));
        }
        // public function dataPageProduct(){ ,$_POST['collection'],$_POST['category']
        //     inmang($this->testModel->getPageDataProduct());
        // }
        public function themKt(){
            if ($this->productModel->deleteDetailValue('kichthuoc', $_POST['id'])){
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
        // public function layCT(){
        //     $res = $this->testModel->getDetailProduct($_POST['id']);
        //     inmang($res);
        // }
        public function layDSSP(){
            $res = $this->productModel->getListProduct($_POST['bosuutap'],$_POST['danhmuc'], 
            'id', $_POST['page'], 5, $_POST['tim']);
            inmang($res);
        }
        public function layslider(){
            $res = $this->sliderModel->getSlider();
            inmang($res);
        }
        public function guimail(){
            $res = $this->userModel->sendOrderToEmail($_POST['email']);
        }
    }
?>