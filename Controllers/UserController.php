<?php
class UserController extends BaseController{
    private $userModel;
    public function __construct(){
            parent::__construct();
            
            $this->importModel('UserModel');
            $this->userModel = new UserModel();
    }
    public function login(){
        if (isset($_SESSION['isLogin']) && $_SESSION['role'] == 0){
            $this->gotoPage('user/profile');
        }

        $this->render('layouts/user',[
            'content'=> 'users/dangnhap',
            'title'=> 'Đăng nhập',
            'css'=> 'dangnhap',
            'js'=>'dangnhap',
            'subcontent'=> [
                
            ]
        ]);
    }
    public function logout(){
        $this->userModel->logout();
        $this->gotoPage('user/login');
    }
    public function signup(){
        if (isset($_SESSION['isLogin']) && $_SESSION['role'] == 0){
            $this->gotoPage('user/profile');
        }
        $this->render('layouts/user',[
            'content'=> 'users/dangky',
            'title'=> 'Đăng ký',
            'css'=> 'dangky',
            'js'=> 'dangky',
            'subcontent'=> [
            ]
        ]);
    }
    public function profile(){
        $this->checkLogin();
        if (isset($_POST['changeInfo'])){
            $this->userModel->changeUserInfo();
        }
        $user = $this->userModel->getUserInfo($_SESSION['email']);
        $this->render('layouts/user_account',[
            'content'=> 'users/thongtincanhan',
            'title'=> 'Thông tin cá nhân',
            'css'=> 'taikhoan',
            'subcontent'=> [
                'user'=> $user
            ]
        ]);
    }
    public function history(){
        $this->checkLogin();
        $this->render('layouts/user_account',[
            'content'=> 'users/lichsudonhang',
            'title'=> 'Lịch sử đơn hàng',
            'css'=> 'taikhoan',
            'js'=> 'lichsudonhang',
            'subcontent'=> [
            ]
        ]);
    }
    public function changePassword(){
        $this->checkLogin();
        $this->render('layouts/user_account',[
            'content'=> 'users/doimatkhau',
            'title'=> 'Đổi mật khẩu',
            'css'=> 'taikhoan',
            'subcontent'=> [
            ]
        ]);
    }
    private function checkLogin() {
        if (!$_SESSION['isLogin']){
            $this->gotoPage('user/login');
        }
    }
}
?>