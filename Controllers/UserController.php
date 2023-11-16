<?php
class UserController extends BaseController{
    private $userModel;
    public function __construct(){
            parent::__construct();
            
            $this->importModel('UserModel');
            $this->userModel = new UserModel();
    }
    public function index(){
        $this->render('layouts/user',[
            'content'=> 'users/dangnhap',
            'title'=> 'Đăng nhập',
            'css'=> 'dangnhap',
            'js'=>'dangnhap',
            'subcontent'=> [
                
            ]
        ]);
    }
    public function signup(){
        $this->render('layouts/user',[
            'content'=> 'users/dangky',
            'title'=> 'Đăng ký',
            'css'=> 'dangky',
            'subcontent'=> [
            ]
        ]);
    }
    public function profile(){

    }
}
?>