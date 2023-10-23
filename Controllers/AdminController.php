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
            $this->_checkLogin();
        }
        // trang chủ
        public function index(){
            $this->render('layouts/admin',[
                'content'=> 'admins/index',
                'title'=> 'Trang chủ',
                'css'=> 'trangchu',
                'subcontent'=> [
                    
                ]
            ]);
            
        }
        public function login(){
            // đã đăng nhập
            if (isset($_SESSION['isLogin'])){
                $this->gotoPage('admin');
            }
            // yêu cầu đăng nhập bằng mật khẩu
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_POST['taikhoan']) && $_POST['matkhau']){
                    $res = $this->userModel->adminLogin($_POST['taikhoan'], $_POST['matkhau']);
                    if ($res){
                        $this->gotoPage('admin');
                    } else{
                        $this->gotoPage('admin/login?error=1');
                    }
                }
                    
            }
            // tự động đăng nhập
            if (isset($_COOKIE['verify_login'])){
                echo"Kiem tra coookie";
                $dataUser = json_decode($this->userModel->decodeData($_COOKIE['verify_login']), true);
                $taikhoan= $dataUser['taikhoan'];
                $matkhau= $dataUser['matkhau'];
                $res = $this->userModel->adminLogin($taikhoan, $matkhau);
                if ($res){
                    $this->gotoPage('admin');
                } else{
                    $this->gotoPage('admin/login');
                }
            }
            $this->render('admins/login');
            // $this->render('layouts/admin',[
            //     'content'=> 'admins/login',
            //     'title'=> 'Đăng nhập',
            //     'subcontent'=> [
            //     ]
            // ]);
        }
        public function logout(){
            $this->userModel->adminLogout();
            $this->gotoPage('admin/login');
        }
        public function product(){
            $this->render('layouts/admin',[
                'content'=> 'admins/sanpham',
                'title'=> 'Quản lý sản phẩm',
                'css'=> 'sanpham',
                'subcontent'=> [
                    
                ]
            ]);
        }
        public function detailProduct(){
            $this->render('layouts/admin',[
                'content'=> 'admins/chitietsanpham',
                'title'=> 'Quản lý sản phẩm',
                'css'=> 'chitietsanpham',
                'subcontent'=> [
                    
                ]
            ]);
        }
        private function _checkLogin(){
            $currentUrl = $_SERVER['REQUEST_URI'];
            $uriSegments = explode('/', $currentUrl);
            $pageNameWithQuery = end($uriSegments);
            $pageName = strtok($pageNameWithQuery, '?');
            if (!isset($_SESSION['isLogin']) && $pageName != 'login'){
                $this->gotoPage('admin/login');
            }
        }
    }
?>