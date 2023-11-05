<?php
    class ApiController extends BaseController{
        private $reqMethod;
        private $orderModel;
        private $productModel;
        private $userModel;
        private $cartModel;
        public function __construct()
        {
            $this->importModel('OrderModel');
            $this->importModel('ProductModel');
            $this->importModel('UserModel');
            $this->importModel('CartModel');
            $this->reqMethod = $_SERVER['REQUEST_METHOD'];
            $this->orderModel = new OrderModel();
            $this->productModel = new ProductModel();
            $this->userModel = new UserModel();
            $this->cartModel = new CartModel();
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
            if ($res){
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode($res);
            } else{
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
        // gửi đơn hàng đã đặt về email khách hàng
        // public function sendOrderToEmail(){
        //     $res = $this->orderModel->getOrderForEmail($_POST['email']);
        //     if ($res){
        //         $res = $this->userModel->sendOrderToEmail($_POST['email'], $res);
        //             if ($res){
        //                 http_response_code(200);
        //             } else{
        //                 http_response_code(400);
        //             }
        //     } else{
        //         http_response_code(400);
        //     }
        // }
        // kiểm tra method
        private function _checkMethod($method = "POST"){
            if (!($this->reqMethod == $method)){
                echo "Sai phương thức";
                exit;
            }
        }
    }
?>