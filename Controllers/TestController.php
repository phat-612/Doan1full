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

        public function delePro() {
            $res= $this->productModel->deleteProduct($_POST['id'],$_POST['status']);
            inmang($res);
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
        public function a(){
            $res = $this->productModel->getDescProduct($_POST['name']);
            inmang($res);
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
        public function getAdmin(){
            $res = $this->orderModel->getDataOrderAdmin($_GET['status'],$_GET['sort'],$_GET['$find'],6,$_GET['page']);
            inmang($res);
        }
        // public function layCT(){
        //     $res = $this->testModel->getDetailProduct($_POST['id']);
        //     inmang($res);
        // }
        public function orderAdmin(){
            $res = $this->orderModel->getNumberOrder($_POST['status'],$_POST['timeb'],$_POST['timee']);
            inmang($res);
        }
        public function layDSSP(){
            $res = $this->productModel->getListProduct($_POST['bosuutap'],$_POST['danhmuc'], 
            'id',5, $_POST['tim']);
            inmang($res);
        }
        public function laySPAdmin(){
            $data = $this->productModel->getListProduct('', $_GET['danhmuc'], $_GET['sapxep'], $_GET['timkiem'], 5, $_GET['page'], false);
            inmang($data);
        }
        public function laychitietdonhang(){
            $res = $this->orderModel->getDetailOrder($_GET['id']);
            inmang($res);
        }
        public function infoUser(){
            $res = $this->userModel->getUserInfo($_GET['email']);
            inmang($res);
        }
        public function layLSDH(){
            $res = $this->orderModel->getListOrder();
            inmang($res);
        }
        public function layCTSP(){
            $res = $this->productModel->getDetailProduct($_GET['id']);
            inmang($res);
        }
        public function layCTDH(){
            $res = $this->orderModel->getDetailOrder($_GET['id']);
            inmang($res);
        }
        public function showData(){
            inmang($_POST);
        }
    }
?>