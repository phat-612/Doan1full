<?php
    class PaymentController extends BaseController
    {
        public function index()
        {
            $this->render('layouts/user',[
                'content'=> 'payments/index',
                'title'=> 'Thanh toán',
                'css'=> 'thanhtoan',
                'js'=> 'thanhtoan',
                'subcontent'=> [
                    
                ]
            ]);
        }
    }
?>