<?php
    class ApiController extends BaseController{
        private $reqMethod;
        private $submitApi;
        private $orderModel;
        private $productModel;
        private $userModel;
        public function __construct()
        {
            $this->importModel('OrderModel');
            $this->importModel('ProductModel');
            $this->importModel('UserModel');
            $this->reqMethod = $_SERVER['REQUEST_METHOD'];
            $this->submitApi = $_POST['submit'];
            $this->orderModel = new OrderModel();
            $this->productModel = new ProductModel();
            $this->userModel = new UserModel();
            if ($this->reqMethod == 'POST'){
                switch ($this->submitApi){
                    case 'addProduct':
                        $this->addProduct();
                        break;
                    case 'updateProduct':
                        $this->updateProduct();
                        break;
                    default:
                        echo "Api không tồn tại!";
                        break;
                };
            }
        }
        public function addProduct(){
            echo 'day la api them san pham';
            $data = [
                'ten'=> $_POST['ten'],
                'mota'=>$_POST['mota'],
                'gia'=> $_POST['gia'],
                'iddanhmuc'=> $_POST['iddanhmuc'],
                'hinhanh'=>$_FILES['hinhanh'],
                'chitietsanpham'=>$_POST['chitietsanpham']
            ];
            $this->productModel->addProduct($data);

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
            $this->productModel->updateProduct($data, $id);
        }
    }
?>