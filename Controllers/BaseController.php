<!--    $content: truyền views vào layouts
        $subcontent: truyền dữ liệu vào views

 -->

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
            return header('Location: ' . $path);
        }
    }
?>