<?php
    class ProductModel extends BaseModel
    {
        const TABLE = "sanpham";
        public function addProduct($data = [], $file = []){
            /*
                [
                    ten,
                    mota,
                    gia,
                    iddanhmuc,
                    hinhanh[],
                    chitietsanpham[
                        [
                            idmausac,
                            idkichthuoc,
                            soluong
                        ]
                        ],
                    bosuutap[]
                ]
            */
            $dataProduct = array_slice($data, 0, 4, true);
            $dataImage = $this->saveImageProduct($file['hinhanh']);
            $dataDetail = $data["chitietsanpham"];
            $dataCollection = $data["bosuutap"];
            
            $this->conn->begin_transaction();
            
            try {
                
                $id = $this->create(self::TABLE, $dataProduct);
                foreach($dataImage as $key => $value){
                    $this->create("hinhanh", array("idsanpham"=> $id, "hinhanh"=> $value));
                }
                foreach($dataDetail as $key => $value){
                    $this->create("chitietsanpham", array_merge(array("idsanpham"=> $id), $value));
                }
                foreach($dataCollection as $value){
                    $query = $this->select('bosuutap', 'id', "bosuutap = '$value'");
                    if ($query){
                        $idCollection = $this->arr2to1($query)['id'];
                        $data = [
                            'idsanpham' => $id,
                            'idbosuutap' => $idCollection
                        ];
                        $this->create('chitietbosuutap', $data);
                    } else{
                        echo "bộ sưu tập không tồn tại";
                    }
                }
                echo "thêm sản phẩm thành công";
                $this->conn->commit();
                return true;
            }
            catch (Exception $e){
                $this->conn->rollback();
                return false;
            }
        }
        public function updateProduct($data = [], $file , $id){
            $this->conn->begin_transaction();
            try{
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
                $dataImage = $this->saveImageProduct($file['hinhanh']);
                $this->deleteImgProduct($id);
                foreach($dataImage as $key => $value){
                    $this->create("hinhanh", array("idsanpham"=> $id, "hinhanh"=> $value));
                }
                // cập nhật bộ sưu tập
                $dataCollection = $data["bosuutap"];
                $this->delete('chitietbosuutap', "idsanpham = '$id'");
                foreach($dataCollection as $value){
                    $query = $this->select('bosuutap', 'id', "bosuutap = '$value'");
                    if ($query){
                        $idCollection = $this->arr2to1($query)['id'];
                        $data = [
                            'idsanpham' => $id,
                            'idbosuutap' => $idCollection
                        ];
                        $this->create('chitietbosuutap', $data);
                    } else{
                        echo "bộ sưu tập không tồn tại";
                    }
                }
                // hoàn thành cập nhật
                $this->conn->commit();
                return true;
            } catch (Exception $e){
                $this->conn->rollback();
                return false;
            }
        }
        public function addDetailValue($name, $value){
            $data = [
                $name => $value
            ];
            if ($this->select($name, 'id', "$name = '$value'")){
                return false;
            }
            try{
                $this->create($name, $data);
                return true;
            }catch(Exception $e){
                return false;
            }
        }
        // public function addSize($size){
            // $data = [
            //     'kichthuoc'=> $size
            // ];
            // if ($this->select('kichthuoc', 'id', "kichthuoc = '$size'")){
            //     return false;
            // }
            // try{
            //     $this->create('kichthuoc', $data);
            //     return true;
            // }catch(Exception $e){
            //     return false;
            // }
        // }
        // public function editSize($size, $id){
        //     $data = [
        //         'kichthuoc'=> $size
        //     ];
        //     try{
        //         $this->update('kichthuoc',$data, $id);
        //         return true;
        //     }catch(Exception $e){
        //         return false;
        //     }
        // }
        // public function deleteSize($id){
        //     try{
        //         $this->delete('kichthuoc', "id =$id");
        //         return true;
        //     }catch(Exception $e){
        //         return false;
        //     }
        // }
        // public function addColor($color){
        //     $data = [
        //         'mausac'=> $color
        //     ];
        //     if ($this->select('mausac', 'id', "mausac = '$color'")){
        //         return false;
        //     }
        //     try{
        //         $this->create('mausac', $data);
        //         return true;
        //     }catch(Exception $e){
        //         return false;
        //     }
        // }
        // public function editColor($color, $id){
        //     $data = [
        //         'mausac'=> $color
        //     ];
        //     try{
        //         $this->update('mausac',$data, $id);
        //         return true;
        //     }catch(Exception $e){
        //         return false;
        //     }
        // }
        // public function deleteColor($id){
        //     try{
        //         $this->delete('mausac', "id =$id");
        //         return true;
        //     }catch(Exception $e){
        //         return false;
        //     }
        // }
        // public function addCategory($category){
        //     $data = [
        //         'danhmuc'=> $category
        //     ];
        //     if ($this->select('danhmuc', 'id', "danhmuc = '$category'")){
        //         return false;
        //     }
        //     try{
        //         $this->create('danhmuc', $data);
        //         return true;
        //     }catch(Exception $e){
        //         return false;
        //     }
        // }
        // public function editCategory($category, $id){
        //     $data = [
        //         'danhmuc'=> $category
        //     ];
        //     try{
        //         $this->update('danhmuc',$data, $id);
        //         return true;
        //     }catch(Exception $e){
        //         return false;
        //     }
        // }
        // public function deleteCategory($id){
        //     try{
        //         $this->delete('danhmuc', "id =$id");
        //         return true;
        //     }catch(Exception $e){
        //         return false;
        //     }
        // }
        // public function addCollection($collection){
        //     $data = [
        //         'bosuutap'=> $collection
        //     ];
        //     if ($this->select('bosuutap', 'id', "bosuutap = '$collection'")){
        //         return false;
        //     }
        //     try{
        //         $this->create('bosuutap', $data);
        //         return true;
        //     }catch(Exception $e){
        //         return false;
        //     }
        // }
        // public function editCollection($collection, $id){
        //     $data = [
        //         'bosuutap'=> $collection
        //     ];
        //     try{
        //         $this->update('bosuutap',$data, $id);
        //         return true;
        //     }catch(Exception $e){
        //         return false;
        //     }
        // }
        // public function deleteCollection($id){
        //     try{
        //         $this->delete('bosuutap', "id =$id");
        //         return true;
        //     }catch(Exception $e){
        //         return false;
        //     }
        // }
        public function deleteImgProduct($id){
            $query = $this->arr2to1($this->select('hinhanh', 'hinhanh', "idsanpham = $id"), true);
            if (!$query){
                echo "Không tìm thấy";
            }
            $dirImgs = $query;
            foreach ($dirImgs as $dirImg) {
                $this->deleteFile($dirImg);
            }
            $this->delete("hinhanh", "idsanpham = $id");

        }
        private function saveImageProduct($files){
            $dirSaveImage = "public/assets/img/products/";
            $result = array();
            foreach ($files['tmp_name'] as $key => $tmp_name){
                $targetPath = $dirSaveImage . $this->generateUUIDv4() . '.png';
                if (move_uploaded_file($tmp_name, $targetPath)){
                    $result[] = $targetPath;
                }
            }
            return $result;
        }
    }

?>