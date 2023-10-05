<?php
    class AdminController extends BaseController
    {
        private $orderModel;
        private $userModel;
        private $productModel;
        public function __construct()
        {
            $this->importModel('OrderModel');
            $this->orderModel = new OrderModel();
            $this->importModel('UserModel');
            $this->userModel = new UserModel();
            $this->importModel('ProductModel');
            $this->productModel = new ProductModel();
        }
        public function index(){
            if (isset($_COOKIE['verify_login'])){
                $dataUser = json_decode($this->userModel->decodeData($_COOKIE['verify_login']), true);
                // inmang($dataUser);
                $taikhoan= $dataUser['taikhoan'];
                $matkhau= $dataUser['matkhau'];
                $res = $this->userModel->adminLogin($taikhoan, $matkhau);
                if ($res){
                    $this->gotoPage('admin/sanpham');
                    // die();
                } else{
                    $this->gotoPage('admin?error=true');
                    // die();
                }
            } 
            $this->render('layouts/admin',[
                'content'=> 'admins/login',
                'title'=> 'Đăng nhập',
                'subcontent'=> [
                ]
            ]);
        }
        public function sanpham(){
            
        }
    }
?>