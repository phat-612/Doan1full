<?php
    class HomeController extends BaseController
    {
        private $productModel;
        public function __construct()
        {
            $this->importModel('ProductModel');
            $this->productModel = new ProductModel();
        }
        public function index()
        {
            $products = $this->productModel->getListProduct('', '', 'daban desc', 1, 8);
            $this->render('layouts/user',[
                'content'=> 'homes/index',
                'title'=> 'Trang chủ',
                'css'=> 'trangchu',
                'subcontent'=> [
                    'products'=>$products
                ]
            ]);
        }
    }
?>