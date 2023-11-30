<?php
    class HomeController extends BaseController
    {
        private $productModel;
        private $sliderModel;
        public function __construct()
        {
            parent::__construct();
            $this->importModel('ProductModel');
            $this->importModel('SliderModel');
            $this->productModel = new ProductModel();
            $this->sliderModel = new SliderModel();
        }
        public function index()
        {
            $products = $this->productModel->getListProduct('', '', 'daban desc', '', 8);
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
        public function about(){
            $this->render('layouts/user',[
                'content'=> 'abouts/gioithieu',
                'title'=> 'Giới thiệu',
                'css'=> 'gioithieu',
                'subcontent'=> [
                ]
            ]);
        }
        public function shipping_policy(){
            $this->render('layouts/user',[
                'content'=> 'abouts/chinhsachvanchuyen',
                'title'=> 'Chính sách vận chuyển',
                'css'=> 'chinhsach',
                'subcontent'=> [
                ]
            ]);
        }
        public function return_policy(){
            $this->render('layouts/user',[
                'content'=> 'abouts/chinhsachdoitra',
                'title'=> 'Chính sách đổi trả',
                'css'=> 'chinhsach',
                'subcontent'=> [
                ]
            ]);
        }
    }
?>