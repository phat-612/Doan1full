<?php 
    class SliderModel extends BaseModel{
        public function getSlider(){
            $output = [];
            $dir = "public/assets/img/slider"; // Thay đường dẫn thư mục vào đây
            $files = scandir($dir); //CamHung note : lấy ds thư mục
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    $output[] = $dir."/$file";
                }
            }
            return $output;
        }
        public function addSlider($file){
            $path = 'public/assets/img/slider';
            $this->saveImage($path, $file);
        }
        public function deleteSlider(){
            
        }
        public function updateBanner($data, $files){
            if (isset($data['old_img'])){
                $imgs = $this->getSlider();
                foreach($imgs as $value){
                    if (!in_array($value, $data['old_img'])){
                        $this->deleteFile($value);
                    }
                }
            }
            if ($files['hinhanh']['error'][0] == 0){
                $this->saveImage('public/assets/img/slider/', $files['hinhanh']);
            }
        }
    }
?>