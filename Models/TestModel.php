<?php
    class TestModel extends BaseModel{
        // lấy số lượng sản phẩm
        public function getProduct(){
            $sql ="SELECT count(*) soluongsanpham FROM sanpham;";
            $query = $this->select_by_sql($sql);
            return $query[0]['soluongsanpham']; 
        }
        public function getSizes() {
            $size =$this->arr2to1($this-> select('kichthuoc','kichthuoc'),true);
            // print_r($size);
        }
        // lấy dữ liệu trang chi tiết sản phẩm
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
                return $this->arr2to1($query1);
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
        // lấy dữ liệu chi tiết trang đơn hàng
        public function getDataOrder($id='') {
            $sql1 = "SELECT kh.hoten, kh.sodienthoai ,kh.diachi , kh.email , dh.ghichu,dh.tongtien,dh.trangthai,dh.thoigian 
            FROM donhang dh ,khachhang kh 
            WHERE kh.id = dh.idkhachhang AND dh.id='$id'"; 
            $sql2 = "SELECT sp.ten , kt.kichthuoc , ms.mausac , ctdh.gia, ctdh.soluong 
            FROM sanpham sp ,chitietdonhang ctdh, kichthuoc kt,mausac ms ,chitietsanpham ctsp ,donhang dh
            WHERE ms.id = ctsp.idmausac AND kt.id =ctsp.idkichthuoc AND ctdh.idchitietsanpham =ctsp.id AND dh.id = ctdh.iddonhang 
            AND sp.id =ctsp.idsanpham AND ctdh.iddonhang='$id'";
            $query1 = $this->select_by_sql($sql1,);
            $query2 = $this->select_by_sql($sql2);
            if (!$query1){
                return false;
            }
            foreach ($query2 as $key => $value) {
                $sql3="select hinhanh.hinhanh from hinhanh limit 1";
                $query3 = $this->select_by_sql($sql3);
                $query2[$key]['hinhanh']=$this->arr2to1($query3);
            }
            $query1[0]['chitietdonhang'] =$query2; 
                return $this->arr2to1($query1);         
        }
        // t mới xóa cái dì đó ở đây, coi lại giùm
        // public function getAll($color='',$size='',$collection='',$category=''){
        //     $sql1 ="select mausac from mausac ";
        //     $sql2 = "select kichthuoc from kichthuoc";
        //     $sql3="select bosuutap from bosuutap";
        //     $sql4 = "select danhmuc from danhmuc";
        //     if ($color){
        //         $query1 = $this->select_by_sql($sql1);
        //         return $this->arr2to1($query1,true);
        //     }
        //     if ($size) {
        //         $query2 = $this->select_by_sql($sql2);
        //         return $this->arr2to1($query2,true);
        //     }
        //     if ($collection) {
        //         $query3 = $this->select_by_sql($sql3);
        //         return $this->arr2to1($query3,true);
        //     }
        //     if ($category) {
        //         $query4 = $this->select_by_sql($sql4);
        //         return $this->arr2to1($query4,true);
        //     }
        // }
        // lấy màu , kich thuoc , danh muc , bo suu tap
        
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