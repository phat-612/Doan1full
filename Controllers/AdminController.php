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
        public function add(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'ghichu'=> $_POST['ghichu'],
                    'trangthai'=> "Chờ xử lý",
                    'nguoidung'=>[
                        'hoten'=> $_POST['hoten'],
                        'sodienthoai'=>$_POST['sodienthoai'],
                        'diachi'=> $_POST['diachi'],
                        'mail'=> $_POST['mail']
                    ],
                    'chitietdonhang'=>$_POST['chitietdonhang']
                ];
                echo $this->orderModel->addOrder($data);
            } else {
                echo 'Sai Phuong Thuc Roi';
            }
        }
        public function status(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id = $_POST['id'];
                $status = $_POST['status'];
                $this->orderModel->changeStatusOrder($id, $status);
            } else {
                echo 'Sai Phuong Thuc Roi';
            }
        }
    }
?>