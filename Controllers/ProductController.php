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
        
        
    }
?>