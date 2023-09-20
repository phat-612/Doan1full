<?php
    class ApiController extends BaseController{
        private $reqMethod = $_SERVER['REQUEST_METHOD'];
        private $submitApi = $_POST['submit'];
        private $orderModel;
        private $productModel;
        private $userModel;
        public function __construct()
        {
            $this->importModel('OrderModel');
            $this->importModel('ProductModel');
            $this->importModel('UserModel');
            $this->orderModel = new OrderModel();
            $this->productModel = new ProductModel();
            $this->userModel = new UserModel();
        }
        public function addProduct(){
            $data = [
                'ten'=> $_POST['ten'],
                'mota'=>$_POST['mota'],
                'gia'=> $_POST['gia'],
                'iddanhmuc'=> $_POST['iddanhmuc'],
                'hinhanh'=>$_FILES['hinhanh'],
                'chitietsanpham'=>$_POST['chitietsanpham']
            ];
            echo $this->productModel->addProduct($data);
        }
        public function updateProduct(){
            $id = $_POST['id'];
            $data = [
                'ten'=> $_POST['ten'],
                'mota'=>$_POST['mota'],
                'gia'=> $_POST['gia'],
                'iddanhmuc'=> $_POST['iddanhmuc'],
                'chitietsanpham'=>$_POST['chitietsanpham']
            ];
            echo $this->productModel->updateProduct($data, $id);
        }
    }
?>