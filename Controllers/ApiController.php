<?php
    class ApiController extends BaseController{
        private $reqMethod;
        private $orderModel;
        private $productModel;
        private $userModel;
        public function __construct()
        {
            $this->importModel('OrderModel');
            $this->importModel('ProductModel');
            $this->importModel('UserModel');
            $this->reqMethod = $_SERVER['REQUEST_METHOD'];
            $this->orderModel = new OrderModel();
            $this->productModel = new ProductModel();
            $this->userModel = new UserModel();
        }
        public function index(){
            echo 'khong có gì';
        }
        
        public function status(){
            $this->_checkMethod();
            $id = $_POST['id'];
            $status = $_POST['status'];
            $this->orderModel->changeStatusOrder($id, $status);
        }
        private function _checkMethod($method = "POST"){
            if (!($this->reqMethod == $method)){
                echo "Sai phương thức";
                exit;
            }
        }
    }
?>