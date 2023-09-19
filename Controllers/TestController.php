<?php
    class TestController extends BaseController{
        private $orderModel;
        public function __construct()
        {
            $this -> importModel('OrderModel');
            $orderModel = new OrderModel();
        }
        public function index(){
            $this -> orderModel -> add();
        }
    }
?>