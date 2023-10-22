<?php 
    class SliderModel extends BaseModel{
        public function getSlider(){
            $output = [];
            $dir = "public/assets/img/slider"; // Thay đường dẫn thư mục vào đây
            $files = scandir($dir);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    $output[] = $dir."/$file";
                }
            }
            return $output;
        }
    }
?>