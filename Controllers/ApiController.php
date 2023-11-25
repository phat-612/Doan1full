<?php
    class ApiController extends BaseController{
        private $reqMethod;
        private $orderModel;
        private $productModel;
        private $userModel;
        private $cartModel;
        private $sliderModel;
        public function __construct()
        {
            $this->importModel('OrderModel');
            $this->importModel('ProductModel');
            $this->importModel('UserModel');
            $this->importModel('CartModel');
            $this->importModel('SliderModel');
            $this->reqMethod = $_SERVER['REQUEST_METHOD'];
            $this->orderModel = new OrderModel();
            $this->productModel = new ProductModel();
            $this->userModel = new UserModel();
            $this->cartModel = new CartModel();
            $this->sliderModel = new SliderModel();
            $this->_checkMethod();
        }
        public function index(){
            echo 'khong có gì';
        }
        // thêm sản phẩm
        public function addProduct(){
            $res = $this->productModel->addProduct($_POST, $_FILES);
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
        }
        // sửa sản phẩm
        public function editProduct(){
            $this->productModel->updateProduct($_POST, $_FILES, $_POST['id']);
        }
        // đổi trạng thái đơn hàng
        public function changeStatus(){
            $this->orderModel->changeStatusOrder($_POST['id'], $_POST['status']);
            http_response_code(200);
        }
        // các xử lý liên quan đến thông tin chi tiết sản phẩm
        public function addDetailValue(){
            $res = $this->productModel->addDetailValue($_POST['name'], $_POST['value']);
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
            
        }
        // thay đổi các giá trị thuộc tính của sản phẩm
        public function changeDetailValue(){
            $res = $this->productModel->updateDetailValue($_POST['name'], $_POST['value'], $_POST['id']);
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
            
        }
        // xóa các giá trị thuộc tính của sản phẩm
        public function deleteDetailValue(){
            $res = $this->productModel->deleteDetailValue($_POST['name'], $_POST['id']);
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
            
        }
        // thêm đơn hàng
        public function addOrder(){
            $res = $this->orderModel->addOrder($_POST);
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
        }
        // lấy dữ liệu cho trang giỏ hàng
        public function getDataCart(){
            $res = $this->cartModel->getDataCart($_POST['cart']);
            if ($res){
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode($res);
            } else{
                http_response_code(400);
            }
        }
        //Lấy danh sách tất cả sản phẩm
        public function getListProduct(){
            $res = $this->productModel->getListProduct($_POST['collection'], $_POST['category'], $_POST['sort'], $_POST['find']);
            header('Content-Type: application/json');
            if ($res){
                http_response_code(200);
                echo json_encode($res);
            } else{
                echo json_encode([]);
                http_response_code(400);
            }
        }
        //Lấy dữ liệu trang chi tiết sản phẩm
        public function getDetailProduct(){
            $res = $this->productModel->getDataProduct($_POST['id']);
            if ($res){
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode($res);
            } else{
                http_response_code(400);
            }
        }
        // xử lý tài khoản
        public function getOtp(){
            $res = $this->userModel->sendOtpEmail($_POST['email'], false);
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
        }
        public function signup(){
            // inmang($_POST, true);
            $res = $this->userModel->signup();
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
        }
        public function login(){
            $res = $this->userModel->login($_POST['email'], $_POST['pass']);
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
        }
        public function forgotPassword(){
            $res = $this->userModel->forgotPassword($_POST['email']);
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
        }
        public function changePassword(){
            $res = $this->userModel->changePassword();
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
        }
        public function getListOrderUser(){
            $res = $this->orderModel->getListOrder();
            header('Content-Type: application/json');
            if ($res){
                http_response_code(200);
                echo json_encode($res);
            } else{
                echo json_encode([]);
                http_response_code(400);
            }
        }

        // xử lý banner
        public function updateBanner(){
            $this->sliderModel->updateBanner($_POST, $_FILES);
            $this->gotoPage('admin/banner');
        }
        // kiểm tra method
        private function _checkMethod($method = "POST"){
            if (!($this->reqMethod == $method)){
                echo "Sai phương thức";
                exit;
            }
        }
    }
?>