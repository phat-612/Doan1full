<?php
    class BaseController
    {
        private $productModel;
        // data cho toàn bộ view
        public function __construct(){
            $this->importModel('ProductModel');
            $this->productModel = new ProductModel();
            $_SESSION['category'] = $this->productModel->getDescProduct('danhmuc');
            $_SESSION['collection'] = $this->productModel->getDescProduct('bosuutap');
            $_SESSION['color'] = $this->productModel->getDescProduct('mausac');
            $_SESSION['size'] = $this->productModel->getDescProduct('kichthuoc');
        }
        public function render($path, $data = [])
        {
            extract($data);
            return include "Views/$path.php";
        }
        public function importModel($nameModel)
        {
            return include_once "Models/$nameModel.php";
        }
        public function gotoPage($path){
            return header('Location: '. _WEB_ROOT . '/' . $path);
        }
    }
?>