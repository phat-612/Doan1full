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
            $this->_checkMethod();
        }
        public function index(){
            echo 'khong có gì';
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
        public function changeDetailValue(){
            $res = $this->productModel->updateDetailValue($_POST['name'], $_POST['value'], $_POST['id']);
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
            
        }
        public function deleteDetailValue(){
            $res = $this->productModel->deleteDetailValue($_POST['name'], $_POST['id']);
            if ($res){
                http_response_code(200);
            } else{
                http_response_code(400);
            }
            
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