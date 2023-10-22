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
            try{
                if ($this->select($name, 'id', "$name = '$value'")){
                    return false;
                }
                $this->create($name, $data);
                return true;
            }catch(Exception $e){
                return false;
            }
        }
        public function updateDetailValue($name, $value, $id){
            $data = [
                $name=> $value
            ];
            try{
                $this->update($name,$data, $id);
                return true;
            }catch(Exception $e){
                return false;
            }
        }
        public function deleteDetailValue($name, $id){
            try{
                $this->delete($name, "id =$id");
                return true;
            }catch(Exception $e){
                return false;
            }
        }
        public function getListProduct($collection='',$category='', $sort='ten', $page='1', $limit='15', $find = ''){
            $output = [];
            $sql = "SELECT s.id, s.ten, s.gia FROM sanpham s
            LEFT JOIN chitietbosuutap cb ON s.id = cb.idsanpham
            LEFT JOIN danhmuc d ON s.iddanhmuc = d.id
            LEFT JOIN bosuutap b ON b.id = cb.idbosuutap
            WHERE s.ten like '%$find%'";
            if ($collection){
                $sql .= " AND b.bosuutap = '$collection'";
            }
            if ($category){
                $sql .= " AND d.danhmuc = '$category'";
            }
            $sql .= " GROUP by s.id
            ORDER by s.$sort
            LIMIT $limit
            OFFSET ".($page-1)*$limit;
            $query = $this->select_by_sql($sql);
            if (!$query){
                return false;
            }
            foreach ($query as $key => $value) {
                $imgs = $this->select('hinhanh', 'hinhanh', "idsanpham = '".$value['id']."'");
                $output[$key] = $value;
                $output[$key]['hinhanh'] = $this->arr2to1($imgs, true);
            }
            return $output;
        }
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