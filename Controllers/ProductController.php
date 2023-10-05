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
        }
        // thong tin chi tiet 1 san pham
        public function detail()
        {
        }
        //api them san pham
        
        
    }
?>