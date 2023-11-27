<?php
    class AdminController extends BaseController
    {
        private $orderModel;
        private $userModel;
        private $productModel;
        private $sliderModel;
        public function __construct()
        {
            parent::__construct();
            $this->importModel('OrderModel');
            $this->orderModel = new OrderModel();
            $this->importModel('UserModel');
            $this->userModel = new UserModel();
            $this->importModel('ProductModel');
            $this->productModel = new ProductModel();
            $this->importModel('SliderModel');
            $this->sliderModel = new SliderModel();
            $this->_checkLogin();
        }
        // trang chủ
        public function index(){
            $dateStart = isset($_GET['dateStart']) ? $_GET['dateStart'] : '';
            $dateEnd = isset($_GET['dateEnd']) ? $_GET['dateEnd'] : '';     
            $quaProduct = $this->productModel->getQuaProduct();
            $totalRevenue = $this->orderModel->totalRevenue('Hoàn Thành',$dateStart,$dateEnd);
            $numberCustomers = $this -> userModel->totalCustomers();
            $numberOrder = $this->orderModel->getNumberOrder('Chờ Xử Lý','','');
            $numberOrderSS = $this->orderModel->getNumberOrder('',$dateStart,$dateEnd);
            $this->render('layouts/admin',[
                'content'=> 'admins/index',
                'title'=> 'Trang chủ Admin',
                'css'=> 'trangchu',
                'js'=> 'trangchu',
                'subcontent'=> [
                    'quaProduct' => $quaProduct,
                    'numberOrder' => $numberOrder,
                    'numberCustomers' => $numberCustomers,
                    'totalRevenue' => $totalRevenue,
                    'numberOrderSS'=> $numberOrderSS
                ]
            ]);     
        }
        public function login(){
            // đã đăng nhập
            if (isset($_SESSION['isLogin'])){
                if ($_SESSION['role'] == 1){
                    $this->gotoPage('admin');
                }
            }
            if (isset($_COOKIE['verify_login'])){
                $res = $this->userModel->login();
                if ($res){
                    $this->gotoPage('admin');
                } else{
                    setcookie('verify_login', '', time() - 3600, '/');
                }
            }
            $this->render('admins/login',[
                'title'=> 'Đăng nhập',
                'css'=> 'admins/login.css',
            ]);
        }
        public function logout(){
            $this->userModel->logout();
            $this->gotoPage('admin/login');
        }
        public function product(){
            $delete = isset($_GET['delete']) ? $_GET['delete'] :'';
            if ($delete){
                $res = $this->productModel->deleteProduct($delete);
                if ($res){
                    $this->gotoPage('admin/product');
                } else{
                    echo '<script>alert("Xóa sản phẩm thất bại!");</script>';
                }
            }
            $dmPros= $this->productModel->getDescProduct('danhmuc');   
            $category = isset($_GET['category']) ? $_GET['category'] : '';
            $sort = isset($_GET['sort']) ? $_GET['sort'] : 'ten';
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $listProduct = $this->productModel->getListProduct('',$category, $sort, $search, 8, $page, false);
            $listProduct2 = $this->productModel->getListProduct('',$category, $sort, $search, '', '' , false);
            $this->render('layouts/admin',[
                'content'=> 'admins/sanpham',
                'title'=> 'Quản lý sản phẩm',
                'css'=> 'sanpham',  
                'js'=> 'sanpham',
                'subcontent'=> [
                    'dmPros'=> $dmPros,
                    'listProduct'=> $listProduct,
                    'listProduct2'=> $listProduct2
                ]
            ]);
        }
        public function detailProduct(){
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            if (!$id){
                $this->gotoPage('admin/product');
            }

            $this->render('layouts/admin',[
                'content'=> 'admins/chitietsanpham',
                'title'=> 'Chi tiết sản phẩm',
                'css'=> 'chitietsanpham',
                'js'=> 'chitietsanpham',
                'subcontent'=> [
                    'product'=>$this->productModel->getDetailProduct($id)
                ]
            ]);
        }
        public function editProduct(){
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            if (!$id){
                $this->gotoPage('admin/product');
            }
            $this->render('layouts/admin',[
                'content'=> 'admins/chinhsua',
                'title'=> 'Chỉnh sửa sản phẩm',
                'css'=> 'chinhsua',
                'js'=> 'chinhsua',
                'subcontent'=> [
                    'product'=> $this->productModel->getDetailProduct($id)
                ]
            ]);
        }
        public function addProduct(){
          
            $this->render('layouts/admin',[
                'content'=> 'admins/themsanpham',
                'title'=> 'Thêm sản phẩm',
                'css'=> 'themsanpham',
                'js'=> 'themsanpham',
                'subcontent'=> [
                    
                ]
            ]);
        }
        public function order(){
            $status = isset($_GET['status']) ? $_GET['status'] :'';
            $sort = isset($_GET['sort']) ? $_GET['sort'] :'thoigian desc';
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $orders = $this->orderModel->getDataOrderAdmin($status,$sort,$search,8,$page);
            $orders1 = $this->orderModel->getDataOrderAdmin($status,$sort,$search,'',$page);
            $getOrder = $this->orderModel->getNumberOrder($status,'','');
            $this->render('layouts/admin',[
                'content'=> 'admins/donhang',
                'title'=> 'Đơn hàng',
                'css'=> 'donhang',
                'js'=>'donhang',
                'subcontent'=> [
                    'orders' => $orders,
                    'getOrder'=>$getOrder,
                    'orders1'=>$orders1
                ]
            ]);
        }
        public function detailOrder(){
            $order = $this->orderModel->getDetailOrder($_GET['id']);
            $this->render('layouts/admin',[
                'content'=> 'admins/chitietdonhang',
                'title'=> 'Chi tiết đơn hàng',
                'css'=> 'chitietdonhang',
                'js'=>'chitietdonhang',
                'subcontent'=> [
                    'order' => $order
                ]
            ]);
        }
        public function banner(){
            $this->render('layouts/admin',[
                'content'=> 'admins/banner',
                'title'=> 'Banner',
                'css'=> 'banner',
                'js'=>'banner',
                'subcontent'=> [
                    'banners'=>$this->sliderModel->getSlider()
                ]
            ]); 
        }
        public function danhmuc(){
            $this->render('layouts/admin',[
                'content'=>'admins/danhmuc',
                'title'=>'Thêm Danh Mục',
                'css'=> 'danhmuc',
                'js'=> 'danhmuc',
                'subcontent'=> [
                ]
            ]);
        }
        private function _checkLogin(){
            $currentUrl = $_SERVER['REQUEST_URI'];
            $uriSegments = explode('/', $currentUrl);
            $pageNameWithQuery = end($uriSegments);
            $pageName = strtok($pageNameWithQuery, '?');
            if ($pageName == 'login'){
                return false;
            }
            if (!isset($_SESSION['isLogin'])){
                $this->gotoPage('admin/login');
            }
            if ($_SESSION['role'] != 1){
                $this->gotoPage('admin/login');
            }
        }
    }
?>