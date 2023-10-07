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
        
}

?>