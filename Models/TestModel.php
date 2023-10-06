<?php
    class TestModel extends BaseModel{
        public function getNumberProduct(){
            $sql = "SELECT COUNT(*) AS total_count FROM sanpham;";
            $query = $this->select_by_sql($sql);
             return $query[0]['total_count'];
        }
        public function total_customers(){
            $sql = "SELECT COUNT(sodienthoai) AS total_customers
            FROM khachhang";
            $query = $this->select_by_sql($sql);
            return $query[0]['total_customers'];
        }
        public function new_oders(){
            $oder=0;
            $oders = $this->select('donhang','trangthai',"trangthai='Đang xử lý'"); 
            $oders = $this-> arr2to1($oders);
            foreach($oders as $value){
                $oder += $value;
            }
            inmang($oder);
            return $oder;
        }
}

?>