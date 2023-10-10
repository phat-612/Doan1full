<?php
    class TestModel extends BaseModel{
        public function getNumberProduct(){
            $sql = "SELECT COUNT(*) AS total_count FROM sanpham;";
            $query = $this->select_by_sql($sql);
            return $query[0]['total_count'];
        }
        public function total_customers(){
            $sql = "SELECT DISTINCT COUNT(  DISTINCT sodienthoai) AS total_customers
            FROM khachhang";
            $query = $this->select_by_sql($sql);
            return $query[0]['total_customers'];
        }
        public function getOrder($status = '',$timeb='',$timee=''){
            $sql = "SELECT COUNT(*) sodonhang FROM donhang";
            if ($timeb && $timee){
                $sql .=  " WHERE thoigian BETWEEN '$timeb' AND ('$timee' + INTERVAL 1 MONTH)";
                if ($status){
                $sql .= " AND trangthai='$status'";
                }
            } else {
                if ($status){
                $sql .= " WHERE trangthai='$status'";
                }
            }
            $query = $this->select_by_sql($sql);
            return $query[0]['sodonhang'];
        }
        public function getProduct(){
            $sql ="SELECT count(*) soluongsanpham FROM sanpham;";
            $query = $this->select_by_sql($sql);
            return $query[0]['soluongsanpham']; 
        }
        public function getSizes() {
            $size =$this->arr2to1($this-> select('kichthuoc','kichthuoc'),true);
            print_r($size);
        }
        public function getDataProduct($id=''){
            $sql1 = "SELECT ct.idsanpham , sp.ten , sp.mota , sp.gia 
            FROM chitietsanpham AS ct, sanpham AS sp
            WHERE  ct.idsanpham = sp.id;";
            $sql2 = "SELECT kt.kichthuoc , ms.mausac FROM chitietsanpham as ct , kichthuoc as kt , mausac as ms 
            WHERE ct.idmausac = ms.id AND ct.idkichthuoc = kt.id;";
            $query1 = $this->select_by_sql($sql1);
            $query2 = $this->select_by_sql($sql2);
            foreach ($query1 as $index => $value) {
                $query1[$index]['chitietsanpham'] = $query2;
            }
            foreach ($query1 as $value) {
                if ($id == $value['idsanpham']) {
                    $result[] = $value;
                }        
            }
            if (!empty($result)) {
                print_r($result);     
                return $result;
            } else {
                return "không có id sản phẩm";
            }   
        }
    }
?>