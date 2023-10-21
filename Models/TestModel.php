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
        // lấy dữ liệu trang sản phẩm
        public function getDataProduct($id=''){
            $sql1 = "SELECT sp.id , sp.ten , sp.mota , sp.gia 
            FROM  sanpham AS sp WHERE sp.id = '$id'";
            $sql2 = "SELECT kt.kichthuoc,ms.mausac,ct.soluong
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
                return $query1;
        }
        // lấy thông tin trang chi tiết sản phẩm
        // public function getDetailProduct($id){
        //     $res = [];
        //     if (!$id){
        //         return false;
        //     }
        //     // lấy thông tin sản phẩm
        //     $query = $this->select('sanpham', 'id, ten, mota, gia', "id = '$id'");
        //     if (!$query){
        //         return false;
        //     } else{
        //         $res = $this->arr2to1($query);
        //     }
        //     // lấy thông tin chi tiết
        //     $query = $this->select('chitietsanpham c, mausac m, kichthuoc k', 'm.mausac, k.kichthuoc, c.soluong', "c.idsanpham = '$id' and c.idmausac = m.id and c.idkichthuoc = k.id");
        //     $res['chitietsanpham']=$query;
        //     // lấy hình ảnh
        //     $query = $this->select('hinhanh', 'hinhanh', "idsanpham = '$id'");
        //     $res['hinhanh'] = $this->arr2to1($query, true);
        //     return $res; 
        // }
        // lấy dữ liệu trang đơn hàng
        // chưa hoàn thành, tham số giống như trang lấy dữ liệu cho trang sản phẩm
        public function getDataOrder($id='') {
            $sql1 = "SELECT kh.hoten, kh.sodienthoai ,kh.diachi , kh.email , dh.ghichu,dh.tongtien,dh.trangthai,dh.thoigian 
            FROM donhang dh ,khachhang kh 
            WHERE kh.id=dh.id and dh.id='$id'"; 
            $sql2 = "SELECT DISTINCT sp.ten , kt.kichthuoc , ms.mausac , ctdh.gia, ctdh.soluong 
            FROM sanpham sp , donhang dh , chitietdonhang ctdh,kichthuoc kt,mausac ms,chitietsanpham ct
            WHERE ct.idsanpham = ms.id AND ct.idsanpham = kt.id AND sp.id = ct.idsanpham 
            AND dh.id = ctdh.iddonhang AND sp.id=dh.id AND dh.id='$id'";
            $query1 = $this->select_by_sql($sql1);
            $query2 = $this->select_by_sql($sql2);
            if (!$query1){
                return "đơn hàng không tồn tại";
            }
            foreach ($query1 as  $value) {
                $query1[0]['chitietdonhang'] =$this->arr2to1($query2);
            }  
            inmang($query1);   
            return $query1;
        }
        // lấy dữ liêu trang chủ
        // chưa hoàn thành còn 3 tham số chưa được sử dụng
        // public function getPageDataProduct($collection='',$category='', $sort='ten', $page='1', $limit='15'){
        //     $sql1= "SELECT sp.id,sp.ten ,sp.gia 
        //     FROM sanpham as sp
        //     limit $limit offset ".(($page-1)*$limit).";";
        //     $query1 = $this->select_by_sql($sql1);
        //     foreach ($query1 as $key => $value) {
        //         $sql2 = "SELECT hinhanh 
        //         FROM hinhanh , sanpham as sp
        //         WHERE hinhanh.idsanpham = sp.id AND sp.id=".$value['id']." limit 2";
        //         $query2= $this->select_by_sql($sql2);
        //         $query1[$key]['hinhanh']=$this->arr2to1 ($query2, true);  
        //     } 
        //     // return $query1;
        // }
        
    }
?>