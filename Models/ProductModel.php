<?php
    class ProductModel extends BaseModel
    {
        const TABLE = "sanpham";
        public function getAllProduct($column = "*", $condition = "", $order = "", $limit = "")
        {
            /*
                [
                    [
                        id=>,
                        ten=>,
                        hinhanh=>[
                            anh1,
                            anh2
                        ],
                        chitietsanpham =>[
                            [
                                mausac,
                                size,
                                soluong
                            ],
                            [
                                mausac,
                                size,
                                soluong
                            ]
                        ]
                    ]
                ]
            */
            $dataProduct = $this->select(self::TABLE, $column, $condition, $order, $limit);
            foreach ($dataProduct as $key => $value){
                $idSanPham = $value['id'];
                $dataProduct[$key]['hinhanh'] = $this->arr2to1($this->select('hinhanh', 'hinhanh', "idsanpham = $idSanPham", $order, $limit));
                $dataProduct[$key]['chitietsanpham'] = $this->select('chitietsanpham', 'mausac, kichthuoc, soluong', "idsanpham = $idSanPham", $order, $limit);
            }

            return $dataProduct;
        }
        public function getOneProduct($column = "*", $id){
            return $this->getAllProduct($column, "id = $id", "", 1);
        }
        public function addProduct($data = []){
            $dataProduct = array_slice($data, 0, 4, true);
            $dataImage = $this->saveImageProduct($_FILES['hinhanh']);
            $dataDetail = $data["chitietsanpham"];
            $id = $this->create(self::TABLE, $dataProduct);
            foreach($dataImage as $key => $value){
                $this->create("hinhanh", array("idsanpham"=> $id, "hinhanh"=> $value));
            }
            foreach($dataDetail as $key => $value){
                $this->create("chitietsanpham", array_merge(array("idsanpham"=> $id), $value));
            }
        }
        public function updateProduct($data = [], $id){
            // cập nhật sản phẩm
            $dataProduct = array_slice($data, 0, 4, true);
            $this->update(self::TABLE, $dataProduct, $id);
            // cập nhật chi tiết
            $dataDetail = $data["chitietsanpham"];
            foreach($dataDetail as $key => $value){
                $value['idsanpham'] = $id;
                if (isset($value['id'])){
                    $this->update('chitietsanpham', $value, $value['id']);
                } else{
                    $this->create('chitietsanpham', $value);
                }
            }
            // cập nhật hình ảnh
            $dataImage = $this->saveImageProduct($_FILES['hinhanh']);
            $this->deleteImgProduct($id);
            foreach($dataImage as $key => $value){
                $this->create("hinhanh", array("idsanpham"=> $id, "hinhanh"=> $value));
            }
        }
        public function deleteImgProduct($id){
            $dirImgs = $this->arr2to1($this->select('hinhanh', 'hinhanh', "idsanpham = $id"));
            foreach ($dirImgs as $dirImg) {
                $this->deleteFile($dirImg);
            }
            $this->delete("hinhanh", "idsanpham = $id");

        }
        private function saveImageProduct($files){
            $dirSaveImage = "public/assets/img/";
            $result = array();
            foreach ($files['tmp_name'] as $key => $tmp_name){
                $targetPath = $dirSaveImage . $this->generateUUIDv4() . '.png';
                if (move_uploaded_file($tmp_name, $targetPath)){
                    $result[] = $targetPath;
                }
            }
            return $result;
        }

        public function laytatcasanpham(){
            $datasanpham = $this->select('sanpham');
            inmang($datasanpham);
        }
    }

?>