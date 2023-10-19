<?php
    class CartModel extends BaseModel{
        public function getDataCart($data = []){
            // [
            //     [
            //         'idchitietsanpham'=> 12,
            //         'soluong'=> 1,
            //         'gia'=> 60000
            //     ]
            // ]
            if (!$data) {
                return false;
            }
            $res = [];
            foreach ($data as $value) {
                $query = $this->select('sanpham s, chitietsanpham c, mausac m, kichthuoc k', 's.gia, s.ten, m.mausac, k.kichthuoc, c.id', 's.id = c.idsanpham and c.idmausac = m.id and c.idkichthuoc = k.id and c.id = '. $value['idchitietsanpham']);
                array_push($res, $this->arr2to1($query));
            }
            return $res;
        }
    }
?>