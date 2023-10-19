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
            $this->render('layouts/user',[
                'content'=> 'homes/index',
                'title'=> 'Đăng nhập',
                'subcontent'=> [
                ]
            ]);
        }
    }
?>