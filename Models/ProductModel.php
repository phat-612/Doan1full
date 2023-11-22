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
                    // $query = $this->select('bosuutap', 'id', "bosuutap = '$value'");
                    // if ($query){
                    //     $idCollection = $this->arr2to1($query)['id'];
                    //     $data = [
                    //         'idsanpham' => $id,
                    //         'idbosuutap' => $idCollection
                    //     ];
                    //     $this->create('chitietbosuutap', $data);
                    // } else{
                    //     echo "bộ sưu tập không tồn tại";
                    // }
                    $data = [
                        'idsanpham' => $id,
                        'idbosuutap' => $value
                    ];
                    $this->create('chitietbosuutap', $data);
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
                // $dataProduct = array_slice($data, 0, 4, true);
                $dataProduct = [
                    'ten'=>$data['ten'],
                    'gia'=>$data['gia'],
                    'mota'=>$data['mota'],
                    'iddanhmuc'=>$data['iddanhmuc']
                ];
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
                // $dataImage = $this->saveImageProduct($file['hinhanh']);
                // $this->deleteImgProduct($id);
                // foreach($dataImage as $key => $value){
                //     $this->create("hinhanh", array("idsanpham"=> $id, "hinhanh"=> $value));
                // }
                // cập nhật bộ sưu tập
                if (isset($data["bosuutap"])){
                    $dataCollection = $data["bosuutap"];
                    $this->delete('chitietbosuutap', "idsanpham = '$id'");
                    foreach($dataCollection as $value){
                        $query = $this->select('bosuutap', 'id', "bosuutap = '$value'");
                        inmang($query);
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
            $sql = "SELECT s.id, s.ten, s.gia, s.daban FROM sanpham s
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
                return [];
            }
            foreach ($query as $key => $value) {
                $output[$key] = $value;
                $sql = "SELECT SUM(ct.soluong) as soluong FROM sanpham s, chitietsanpham ct WHERE s.id = ct.idsanpham AND s.id ='".$value['id']."' GROUP BY s.id";
                $soluong = $this->select_by_sql($sql);
                $output[$key]['soluong'] = $soluong[0]['soluong'];
            }
            if ($isImg){
                foreach ($query as $key => $value) {
                    $imgs = $this->select('hinhanh', 'hinhanh', "idsanpham = '".$value['id']."'");
                    $output[$key]['hinhanh'] = $this->arr2to1($imgs, true);
                }
            }
            return $output;
        }
        // lấy chi tiết sản phẩm
        public function getDetailProduct($id){
            $product = $this->select('sanpham sp, danhmuc dm', 'sp.id ,sp.ten, sp.mota, sp.gia, sp.daban, dm.danhmuc', "sp.iddanhmuc = dm.id and sp.id = '$id'");
            if (!$product){
                return false;
            } else{
                $product = $product[0];
            }
            // lấy chi tiết
            $product['chitietsanpham'] = $this->select('chitietsanpham ctsp, kichthuoc kt, mausac ms', 'ctsp.id, ctsp.soluong, kt.kichthuoc, ms.mausac', "ctsp.idmausac = ms.id and ctsp.idkichthuoc = kt.id and ctsp.idsanpham = '$id'");
            // lấy hình ảnh
            $product['hinhanh'] = $this->arr2to1($this->select('hinhanh', 'hinhanh', "idsanpham = '$id'"), true);
            // lấy bộ sưu tập
            $product['bosuutap'] = $this->arr2to1($this->select('bosuutap bst, chitietbosuutap ct', 'bst.bosuutap', "ct.idbosuutap = bst.id and ct.idsanpham = '$id'"), true);
            return $product;
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
        // xoa san pham
        public function deleteProduct($id=''){
            $sql = "SELECT sp.daban
            FROM sanpham sp
            WHERE sp.id='$id'";
            $query = $this->select_by_sql($sql);
            if (!$query){
                return false;
            }
            $res=$this->arr2to1($query);
            if($res['daban'] != 0 ){
                return false;
            }

            try {
                $this ->delete('chitietsanpham',"idsanpham = '$id'");
            } catch (\Throwable $th) {
                return false;
            }
            $this ->deleteImgProduct($id);
            $this ->delete('hinhanh', "idsanpham = '$id'");
            $this ->delete('chitietbosuutap',"idsanpham = '$id'");
            $this ->delete('sanpham',"id = '$id'");
            return true; 
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