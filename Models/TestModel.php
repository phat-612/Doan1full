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
            WHERE  ct.idsanpham = sp.id";
            $sql2 = "SELECT kt.kichthuoc , ms.mausac FROM chitietsanpham as ct , kichthuoc as kt , mausac as ms 
            WHERE  ct.idkichthuoc = kt.id AND ct.idmausac = ms.id;";
            $query1 = $this->select_by_sql($sql1);
            $query2 = $this->select_by_sql($sql2);
            foreach ($query1 as $index => $value) {
                $query1[$index]['chitietsanpham'] = $query2;
            }
            foreach ($query1 as $value) {
                if ($id === $value['idsanpham']) {              
                    $result[] = $value;
                    inmang($result);     
                }               
        }
            if (!empty($result)) {
                return $result;
            } else {
                return "không có id sản phẩm";
            }  
        }
        public function getDataOrder($id='') {
            $sql1 = "SELECT dh.id, kh.hoten , kh.sodienthoai ,kh.diachi,kh.email,dh.tongtien, dh.ghichu,dh.trangthai,dh.thoigian 
            FROM donhang as dh , khachhang as kh ,chitietdonhang as ct  WHERE ct.id = dh.id ;"; 
            $sql2 = "SELECT dh.id, sp.ten , kt.kichthuoc , ms.mausac , sp.gia , ct.soluong 
            FROM chitietdonhang as ct, mausac as ms , kichthuoc as kt , sanpham as sp,donhang as dh WHERE ct.id = kt.id AND ct.id = sp.id AND ct.id = ms.id and   dh.id = ct.id;";
            $query1 = $this->select_by_sql($sql1);
            $query2 = $this->select_by_sql($sql2);
            foreach ($query1 as $index => $value) {
                $query1[$index]['chitietdonhang'] = $query2;
            }
            // inmang($query1);
            foreach ($query1 as $value) {
                if ($id == $value['id']) {
                    $result[] = $value;
                }       
                if (!empty($result)) {
                    inmang($result);     
                    return $result;
                } else {
                    return "không có id sản phẩm";
                }       
            }
        }
    }
?>