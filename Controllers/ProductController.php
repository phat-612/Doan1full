<?php
    class ProductController extends BaseController
    {
        private $productModel;
        public function __construct()
        {
            $this->importModel('ProductModel');
            
            $this->productModel = new ProductModel();
            
        }
        // tat ca san pham
        public function index()
        {
            
            return $this->render('layouts/user',[
                'content' => 'products/index',
                'title' => 'Sản Phẩm',
                
            ]);
        }
        // thong tin chi tiet 1 san pham
        public function detail()
        {
            $id = $_GET['id'];
            $sanpham = $this->productModel->getOneProduct('*', $id);
            return $this->render('layouts/user',[
                'content' => 'products/detail',
                'title' => 'Chi Tiết Sản Phẩm',
                'subcontent' => [
                    'sanpham' => $sanpham
                ]
            ]);
        }
        //api them san pham
        public function add(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'ten'=> $_POST['ten'],
                    'mota'=>$_POST['mota'],
                    'gia'=> $_POST['gia'],
                    'iddanhmuc'=> $_POST['iddanhmuc'],
                    'hinhanh'=>$_FILES['hinhanh'],
                    'chitietsanpham'=>$_POST['chitietsanpham']
                ];
                echo $this->productModel->addProduct($data);
            } else {
                echo 'Sai Phuong Thuc Roi';
            }
            
        }
        public function update(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id = $_POST['id'];
                $data = [
                    'ten'=> $_POST['ten'],
                    'mota'=>$_POST['mota'],
                    'gia'=> $_POST['gia'],
                    'iddanhmuc'=> $_POST['iddanhmuc'],
                    'chitietsanpham'=>$_POST['chitietsanpham']
                ];
                echo $this->productModel->updateProduct($data, $id);
            } else {
                echo 'Sai Phuong Thuc Roi';
            }
        }
        
    }
?>