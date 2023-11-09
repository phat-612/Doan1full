<?php
    class AdminController extends BaseController
    {
        private $orderModel;
        private $userModel;
        private $productModel;
        public function __construct()
        {
            parent::__construct();
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
            $quaProduct = $this->productModel->getQuaProduct();
            $numberOrder = $this->orderModel->getNumberOrder('Chờ Xử Lý','','');
            $numberOrderSS = $this->orderModel->getNumberOrder('Thành Công','','');
            $numberCustomers = $this -> userModel->totalCustomers();
            $dateStart = isset($_GET['dateStart']) ? $_GET['dateStart'] : '';
            $dateEnd = isset($_GET['dateEnd']) ? $_GET['dateEnd'] : '';
            $totalRevenue = $this->orderModel->totalRevenue('Thành Công',$dateStart,$dateEnd);
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
            $dmPros= $this->productModel->getDescProduct('danhmuc');   
            $category = isset($_GET['category']) ? $_GET['category'] : '';
            $sort = isset($_GET['sort']) ? $_GET['sort'] : 'ten';
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $listProduct = $this->productModel->getListProduct('',$category, $sort, $search, 8, $page, false);
            $qualProduct = $this->productModel->getQuaProduct();
            $this->render('layouts/admin',[
                'content'=> 'admins/sanpham',
                'title'=> 'Quản lý sản phẩm',       
                'css'=> 'sanpham',
                'js'=> 'sanpham',
                'subcontent'=> [
                    'dmPros'=> $dmPros,
                    'listProduct'=> $listProduct,
                    'qualProduct'=> $qualProduct
                ]
            ]);
        }
        public function detailProduct(){
            $this->render('layouts/admin',[
                'content'=> 'admins/chitietsanpham',
                'title'=> 'Chi tiết sản phẩm',
                'css'=> 'chitietsanpham',
                'js'=> 'chitietsanpham',
                'subcontent'=> [
                    
                ]
            ]);
        }
        public function editProduct(){
            $this->render('layouts/admin',[
                'content'=> 'admins/chinhsuasanpham',
                'title'=> 'Chỉnh sửa sản phẩm',
                'css'=> 'chinhsuasanpham',
                'js'=> 'chinhsuasanpham',
                'subcontent'=> [
                    
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
            $getOrder = $this->orderModel->getNumberOrder($status,'','');
            $this->render('layouts/admin',[
                'content'=> 'admins/donhang',
                'title'=> 'Đơn hàng',
                'css'=> 'donhang',
                'js'=>'donhang',
                'subcontent'=> [
                    'orders' => $orders,
                    'getOrder'=>$getOrder
                ]
            ]);
        }
        public function detailOrder(){
            $this->render('layouts/admin',[
                'content'=> 'admins/chitietdonhang',
                'title'=> 'Chi tiết đơn hàng',
                'css'=> 'chitietdonhang',
                'subcontent'=> [
                    
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
            if (!isset($_SESSION['isLogin']) && $pageName != 'login'){
                $this->gotoPage('admin/login');
            }
        }
    }
?>