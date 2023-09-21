<?php
    class AdminController extends BaseController
    {
        private $orderModel;
        private $userModel;
        public function __construct()
        {
            $this->importModel('OrderModel');
            $this->orderModel = new OrderModel();
            $this->importModel('UserModel');
            $this->userModel = new UserModel();
        }
        public function index(){
            if (isset($_COOKIE['verify_login'])){
                $dataUser = json_decode($this->userModel->decodeData($_COOKIE['verify_login']), true);
                // inmang($dataUser);
                $taikhoan= $dataUser['taikhoan'];
                $matkhau= $dataUser['matkhau'];
                $this->userModel->adminLogin($taikhoan, $matkhau);
            }
            $this->render('layouts/admin',[
                'content'=> 'admins/login',
                'title'=> 'Đăng nhập',
                'subcontent'=> [
                ]
            ]);
        }
        public function sanpham(){
            
            $this->render('layouts/admin',[
                'content'=> 'admins/product',
                'title'=> 'Quản lý sản phẩm',
                'subcontent'=> [
                ]
            ]);
        }
    }
?>