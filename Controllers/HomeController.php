<?php
    class HomeController extends BaseController
    {
        private $productModel;
        private $sliderModel;
        public function __construct()
        {
            $this->importModel('ProductModel');
            $this->importModel('SliderModel');
            $this->productModel = new ProductModel();
            $this->sliderModel = new SliderModel();
        }
        public function index()
        {
            $products = $this->productModel->getListProduct('', '', 'daban desc', 1, 8);
            $sliders = $this->sliderModel->getSlider();
            $this->render('layouts/user',[
                'content'=> 'homes/index',
                'title'=> 'Trang chủ',
                'css'=> 'trangchu',
                'js'=> 'trangchu',
                'subcontent'=> [
                    'products'=>$products,
                    'sliders'=>$sliders
                ]
            ]);
        }
    }
?>