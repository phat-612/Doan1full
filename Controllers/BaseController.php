<?php
    class BaseController
    {
        public function render($path, $data = [])
        {
            extract($data);
            return include "Views/$path.php";
        }
        public function importModel($path)
        {
            return include "Models/$path.php";
        }
        public function gotoPage($path){
            return header('Location: '. _WEB_ROOT . '/' . $path);
        }
    }
?>