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
            $categorys = $this->productModel->getDescProduct('danhmuc');
            $this->render('layouts/user',[
                'content'=> 'products/index',
                'title'=> 'Sản Phẩm',
                'css'=> 'sanpham',
                'js'=> 'sanpham',
                'subcontent'=> [
                    'categorys'=> $categorys
                ]
            ]);
        }
        // thong tin chi tiet 1 san pham
        public function detail()
        {
            if (!isset($_GET['id'])){
                $this->gotoPage('product');
            }
            $product = $this->productModel->getDataProduct($_GET['id']);
            if (!$product){
                $this->gotoPage('product');
            }
            $this->render('layouts/user',[
                'content'=> 'products/detail',
                'title'=> $product['ten'],
                'css'=> ['chitietsanpham', 'sanpham'],
                'subcontent'=> [
                    'product'=> $product
                ]
            ]);
        }
        //api them san pham
        
        
    }
?>