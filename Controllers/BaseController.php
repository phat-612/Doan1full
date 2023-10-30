<?php
    class BaseController
    {
        private $productModel;
        // data cho toàn bộ view
        public function __construct(){
            $this->importModel('ProductModel');
            $this->productModel = new ProductModel();
            
            $_SESSION['categorys'] = $this->productModel->getDescProduct('danhmuc');
        }
        public function render($path, $data = [])
        {
            extract($data);
            return include "Views/$path.php";
        }
        public function importModel($nameModel)
        {
            return include "Models/$nameModel.php";
        }
        public function gotoPage($path){
            return header('Location: '. _WEB_ROOT . '/' . $path);
        }
    }
?>