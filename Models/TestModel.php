<?php
    class TestModel extends BaseModel{
        public function getNumberProduct(){
            $sql = "SELECT COUNT(*) AS total_count FROM sanpham;";
            $query = $this->select_by_sql($sql);
            return $query[0]['total_count'];
        }
        public function total_customers(){
            $sql = "SELECT DISTINCT COUNT(DISTINCT sodienthoai) AS total_customers
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
            // print_r($size);
        }
        public function getDataProduct($id=''){
            $sql1 = "SELECT sp.id , sp.ten , sp.mota , sp.gia 
            FROM  sanpham AS sp WHERE sp.id = '$id'";
            $sql2 = "SELECT kt.kichthuoc,ms.mausac,ct.soluong
            FROM chitietsanpham ct,mausac ms,kichthuoc kt,sanpham sp 
            WHERE ms.id = ct.idsanpham AND kt.id = ct.idsanpham AND ct.idsanpham = sp.id AND sp.id ='$id'";
            $sql3 = "SELECT ha.hinhanh
            FROM chitietsanpham ct,sanpham sp ,hinhanh ha
            WHERE sp.id=ha.id and ct.idsanpham=sp.id AND sp.id ='$id'";
            $query1 = $this->select_by_sql($sql1);
            $query2=$this->select_by_sql($sql2);
            $query3=$this->select_by_sql($sql3);
            if (!$query1){
                return false;
            }
            foreach ($query1 as $value) {
                $query1[0]['chitietsanpham'] = $query2;
                $query1[0]['hinhanh']=$query3;  
            }
            // inmang($query1);
        }
        public function getDataOrder($id='') {
            $sql1 = "SELECT kh.hoten, kh.sodienthoai ,kh.diachi , kh.email , dh.ghichu,dh.tongtien,dh.trangthai,dh.thoigian 
            FROM donhang dh ,khachhang kh 
            WHERE kh.id=dh.id and dh.id='$id'"; 
            $sql2 = "SELECT DISTINCT sp.ten , kt.kichthuoc , ms.mausac , ctdh.gia, ctdh.soluong 
            FROM sanpham sp , donhang dh , chitietdonhang ctdh,kichthuoc kt,mausac ms,chitietsanpham ct
            WHERE ct.idsanpham = ms.id AND ct.idsanpham = kt.id AND sp.id = ct.idsanpham AND dh.id = ctdh.iddonhang  AND sp.id=dh.id AND dh.id='$id'";
            $query1 = $this->select_by_sql($sql1);
            $query2 = $this->select_by_sql($sql2);
            if (!$query1){
                return false;
            }
            foreach ($query1 as  $value) {
                $query1[0]['chitietdonhang'] = $query2;
                inmang($query1);
            }
        }
        public function getPageDataProduct($collection='',$category='', $sort='ten', $page='1', $limit='15'){
            $sql1= "SELECT sp.id,sp.ten ,sp.gia 
            FROM sanpham as sp
            limit $limit offset ".(($page-1)*$limit).";";
            $query1 = $this->select_by_sql($sql1);
            foreach ($query1 as $key => $value) {
                $sql2 = "SELECT hinhanh 
                FROM hinhanh , sanpham as sp
                WHERE hinhanh.idsanpham = sp.id AND sp.id=".$value['id']." limit 2";
                $query2= $this->select_by_sql($sql2);
                $query1[$key]['hinhanh']=$this->arr2to1 ($query2, true);  
            }     
            // inmang($query1,true);    
        }
        public function getDataCart($id=''){
            $sql1 = "SELECT ctdh.iddonhang ,sp.ten , dh.thoigian , dh.tongtien , dh.trangthai 
            FROM donhang as dh , chitietdonhang as ctdh, sanpham as sp WHERE ctdh.iddonhang = dh.id AND sp.id = dh.id and sp.id ='$id'"; 
            $query1 = $this->select_by_sql($sql1);
            foreach ($query1 as $key => $value){
                $sql2= "SELECT ha.hinhanh  
                FROM hinhanh as ha , sanpham as sp 
                WHERE ha.idsanpham = sp.id and  sp.id='$id' LIMIT 1"; 
                $query2 = $this->select_by_sql($sql2);
                $query1[$key]['hinhanh']=$this->arr2to1($query2);
            }
        }
    }
?>