<?php
    class TestController extends BaseController{
        private $orderModel;
        private $producModel;
        public function __construct()
        {
            $this -> importModel('OrderModel');
            $this->importModel('ProductModel');
            $this -> orderModel = new OrderModel();
            $this->producModel = new ProductModel();
        }
        public function index(){
        }
        public function laythongtinsanpham(){
            $this->producModel->laytatcasanpham();
        }
    }
?>