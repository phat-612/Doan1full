<?php
    class TestModel extends BaseModel{
        public function getNumberProduct(){
            $sql = "SELECT COUNT(*) AS total_count FROM sanpham;";
            $query = $this->select_by_sql($sql);
            return $query[0]['total_count'];
        }
        public function total_customers(){
            $sql = "SELECT COUNT(sodienthoai) AS total_customers(
            FROM khachhang";
            $query = $this->select_by_sql($sql);
            return $query[0]['total_customers'];
        }
        public function new_oders($status,$time_b,$time_e){
            $sql = "SELECT COUNT(*) donhang FROM donhang WHERE trangthai='$status' AND thoigian BETWEEN '$time_b' AND '$time_e' AND";
            $query = $this->select_by_sql($sql);
          
       
        }
}

?>