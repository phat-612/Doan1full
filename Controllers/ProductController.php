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
            $this->render('layouts/user',[
                'content'=> 'products/index',
                'title'=> 'Sản Phẩm',
                'css'=> 'sanpham',
                'subcontent'=> [
                    
                ]
            ]);
        }
        // thong tin chi tiet 1 san pham
        public function detail()
        {
            $this->render('layouts/user',[
                'content'=> 'products/detail',
                'title'=> 'Tên sản phẩm',
                'css'=> ['chitietsanpham', 'sanpham'],
                'subcontent'=> [
                    
                ]
            ]);
        }
        //api them san pham
        
        
    }
?>