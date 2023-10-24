<?php
    class PaymentController extends BaseController
    {
        public function __construct()
        {
        }
        public function index()
        {
            $this->render('layouts/user',[
                'content'=> 'payments/thanhtoan',
                'title'=> 'Thanh toán',
                'css'=> 'thanhtoan',
                'subcontent'=> [
                    
                ]
            ]);
        }
    }
?>