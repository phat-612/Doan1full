<?php
    class AdminController extends BaseController
    {
        private $orderModel;
        public function __construct()
        {
            $this->importModel('OrderModel');
            $this->orderModel = new OrderModel();
        }
        public function index(){
            $donhang = $this->orderModel->getAllOrder();
            $this->render('layouts/admin',[
                'content'=> 'homes/index',
                'title'=> 'Home',
                'subcontent'=> [
                ]
            ]);
        }
    }
?>