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
            $dataCollection = isset($data["bosuutap"]) ? $data["bosuutap"] : [];
            
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
        // tìm sản phẩm
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
        // lấy mô tả sản phẩm
        public function getDescProduct($name){
            $query = $this->select($name, '*');
            return $query;
        }
        public function getListProduct($collection='',$category='', $sort='ten', $find = '', $limit = '', $page = '', $isImg = true){
            if (!$sort){
                $sort = 'ten';
            }
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
            ORDER by s.$sort";
            if ($limit && !$page){
                $sql .= " LIMIT $limit";
            }
            if ($limit && $page){
                $sql .= " LIMIT $limit offset ". ($page-1)*$limit;
            }
            $query = $this->select_by_sql($sql);
            if (!$query){
                return false;
            }
            if ($isImg){
                foreach ($query as $key => $value) {
                    $imgs = $this->select('hinhanh', 'hinhanh', "idsanpham = '".$value['id']."'");
                    $output[$key] = $value;
                    $output[$key]['hinhanh'] = $this->arr2to1($imgs, true);
                }
                return $output;
            } else {
                return $query;
            }
        }
        // code ML
        // lấy số lượng sản phẩm
        public function getQuaProduct(){
            $sql ="SELECT count(*) soluongsanpham FROM sanpham;";
            $query = $this->select_by_sql($sql);
            return $query[0]['soluongsanpham']; 
        }
        // lấy dữ liệu 1 sản phẩm
        public function getDataProduct($id=''){
            $sql1 = "SELECT sp.id , sp.ten , sp.mota , sp.gia 
            FROM  sanpham AS sp WHERE sp.id = '$id'";
            $sql2 = "SELECT kt.kichthuoc,ms.mausac,ct.soluong, ct.id
            FROM chitietsanpham ct,mausac ms,kichthuoc kt
            WHERE ct.idmausac = ms.id AND ct.idkichthuoc = kt.id AND ct.idsanpham ='$id'";
            $sql3 = "SELECT ha.hinhanh
            FROM hinhanh ha
            WHERE ha.idsanpham ='$id'";
            $query1 = $this->select_by_sql($sql1);
            if (!$query1){
                return false;
            }
            $query2=$this->select_by_sql($sql2);
            $query3=$this->select_by_sql($sql3);
                $query1[0]['chitietsanpham'] = $query2;
                $query1[0]['hinhanh']= $this->arr2to1($query3,true);
                return $this->arr2to1($query1);
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