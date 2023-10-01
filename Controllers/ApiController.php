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
        public function addProduct(){
            $this->_checkMethod();
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
            $this->_checkMethod();
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
        public function sendOtp(){
            $this->_checkMethod();
            error_log($_POST['email']);
            $res = $this->userModel->creatOtp($_POST['email']);
            if ($res){
                $this->gotoPage('login/otp');
            } else{
                $this->gotoPage('login?error=1');
            }
        }
        public function verifyOtp(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $res = $this->userModel->verifyOtp($_SESSION['tempEmail'], $_POST['otp']);
                if ($res){
                    $this->gotoPage('lichsumuahang');
                } else{
                    $this->gotoPage('login/otp?error=1');
                }
            }
        }
        public function addOrder(){
            $this->_checkMethod();
            $data = [
                'ghichu'=> $_POST['ghichu'],
                'trangthai'=> "Chờ xử lý",
                'nguoidung'=>[
                    'hoten'=> $_POST['hoten'],
                    'sodienthoai'=>$_POST['sodienthoai'],
                    'diachi'=> $_POST['diachi'],
                    'mail'=> $_POST['mail']
                ],
                'chitietdonhang'=>$_POST['chitietdonhang']
            ];
            echo $this->orderModel->addOrder($data);
        }
        public function status(){
            $this->_checkMethod();
            $id = $_POST['id'];
            $status = $_POST['status'];
            $this->orderModel->changeStatusOrder($id, $status);
        }
        public function adminLogin(){
            $this->_checkMethod();
            $res = $this->userModel->adminLogin($_POST['taikhoan'], $_POST['matkhau']);
            if ($res){
                $this->gotoPage('admin/sanpham');
                // die();
            } else{
                $this->gotoPage('admin/');
                // die();
            }
        }
        private function _checkMethod($method = "POST"){
            if (!($this->reqMethod == $method)){
                echo "Sai phương thức";
                exit;
            }
        }
    }
?>