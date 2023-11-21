<?php
    class OrderModel extends BaseModel{
        const TABLE = 'donhang';
        // public function getAllOrder($column = "*", $condition = "", $order = "", $limit = ""){
        //     $dataOrder = $this->select(self::TABLE, $column, $condition, $order, $limit);
        //     foreach ($dataOrder as $value){
        //         $idOrder = $value['id'];
        //         $value['chitietdathang'] = $this->select('chitietdathang', '*', "iddonhang = $idOrder", $order, $limit);
        //     }
        //     return $dataOrder;
        // }
        // public function getOneOrder($column = '*', $id){
        //     return $this->getAllOrder($column, "id = $id", '', 1);
        // }
        public function addOrder($data = []){
            /*
                [
                    'ghichu': 'giao nhanh len',
                    'tongtien': 120000,
                    'thongtingiaohang': [
                        'hoten': 'Nguyen van a',
                        'sodienthoai': '0123456789',
                        'diachi': 'cna tho',
                    ],
                    'chitietdonhang': [
                        [
                            'idchitietsanpham': '1',
                            'gia': 122000
                            'soluong': '12'
                        ],
                    ]
                ]
            */
            $dataOrderDetail = $data['chitietdonhang'];
            $dataTran = $data['thongtingiaohang'];
            $dataOrder = [
                'ghichu'=>$data['ghichu'],
                'tongtien'=>$data['tongtien'],
                'trangthai'=>'Chờ xử lý',
                'idtaikhoan'=> isset($_SESSION['id']) ? $_SESSION['id'] : '-1'
            ];
            $this->conn->begin_transaction();
            try{
                $idTran = $this->create('thongtingiaohang', $dataTran);
                $dataOrder['idgiaohang'] = $idTran;
                $idOrder = $this->create('donhang', $dataOrder);
                foreach ($dataOrderDetail as $value) {
                   $value['iddonhang'] = $idOrder;
                   $this->create('chitietdonhang', $value);
                   $isQua = $this->_checkQuaPro($value['idchitietsanpham'], $value['soluong']);
                   $isPrice = $this->_checkPrice($value['idchitietsanpham'], $value['gia']);
                   if (!($isQua && $isPrice)){
                        throw new Exception("Sai thông tin về giá, số lượng");
                    }
                }
                $this->conn->commit();
                return true;
            }catch (Exception $e){
                $this->conn->rollback();
                return false;
            }
        }
        // lấy danh sách đơn hàng cho trang lịch sử
        public function getListOrder(){
            $email = isset($_SESSION['email']) ? $_SESSION['email'] : false;
            $table = 'taikhoan tk, thongtingiaohang ttgh, donhang dh';
            $collumn = "ttgh.*, dh.*";
            $condition = "tk.id = dh.idtaikhoan and ttgh.id = dh.idgiaohang and tk.taikhoan = '$email'";
            if (!$email){
                return [];
            }
            $query = $this->select($table, $collumn, $condition);
            if (!$query){
                return [];
            }
            foreach ($query as $key => $value) {
                $iddonhang = $value['id'];
                $sql = "SELECT ctdh.gia, ctdh.soluong, ctsp.idsanpham, ms.mausac, kt.kichthuoc, sp.ten, ha.hinhanh FROM chitietdonhang ctdh, chitietsanpham ctsp, kichthuoc kt, mausac ms, sanpham sp, hinhanh ha WHERE ctdh.idchitietsanpham = ctsp.id and ctsp.idmausac = ms.id and ctsp.idkichthuoc = kt.id and ctsp.idsanpham = sp.id and sp.id = ha.idsanpham and ctdh.iddonhang = '$iddonhang' GROUP BY ctsp.id";
                $query[$key]['chitietdonhang'] = $this->select_by_sql($sql);
            }
            return $query;
        }
        public function totalRevenue($status='',$timet='',$timee='')
        {
            $total = 0;
            $sql = "SELECT tongtien FROM donhang";
            if ($timet && $timee){
                $sql .=  " WHERE thoigian BETWEEN '$timet' AND '$timee'";
                if ($status){
                $sql .= " AND trangthai='$status'";
                }
            }
            else {
                if ($status){
                $sql .= " WHERE trangthai='$status'";
                }
            }
            $query = $this->select_by_sql($sql);     
                foreach ($query as $row) {
                    $value = $row['tongtien'];
                    $total += $value;
                }      
            return $total;
        }
        public function changeStatusOrder($id, $status){
            $this->update('donhang', [
                "trangthai"=>$status
            ], $id);
            if ($status == "đã hủy"){
                $detailOrder = $this->select('chitietdonhang', 'idchitietsanpham, soluong', "iddonhang = '$id'");
                foreach ($detailOrder as $value){
                    $idDetailPro = $value['idchitietsanpham'];
                    $soluong = $this->select('chitietsanpham', 'soluong', "id = '$idDetailPro'")[0]['soluong'];
                    $data = [
                        'soluong' => $value['soluong'] + $soluong
                    ];
                    $this->update('chitietsanpham', $data, $idDetailPro);
                }
            }
            if ($status == 'hoàn thành'){
                $detailOrder = $this->select('chitietdonhang ctdh, chitietsanpham ctsp', 'ctsp.idsanpham, ctdh.soluong', "ctdh.idchitietsanpham = ctsp.id and iddonhang = '$id'");
                foreach ($detailOrder as $value){
                    $idPro = $value['idsanpham'];
                    $daban = $this->select('sanpham', 'daban', "id = '$idPro'")[0]['daban'];
                    $data = [
                        'daban' => $daban + $value['soluong']
                    ];
                    $this->update('sanpham', $data, $idPro);
                }
            }
            return true;
        }
        private function _getPriceOrder($dataOrderDetail){
            $prices = [];
            $totalPrice = 0;
            foreach($dataOrderDetail as $value){
                $idDetal = $value['idchitietsanpham'];
                $idProduct = $this->select('chitietsanpham', 'idsanpham',"id = $idDetal", '', 1)[0]['idsanpham'];
                $price = $this->select('sanpham', 'gia', "id = $idProduct", '', 1)[0]['gia'];
                $prices[] = $price;
                $totalPrice += $price * $value['soluong'];
            }
            return array_merge($prices, [$totalPrice]);
        }
        private function _checkQuaPro($idDetalPro, $orderQua){
            $query = $this->select('chitietsanpham', 'soluong', "id = '$idDetalPro'");
            if ($query){
                $quaDetail = $query[0]['soluong'];
                if ($orderQua > $quaDetail){
                    return false;
                }else{
                    $data = [
                        'soluong' => $quaDetail - $orderQua
                    ];
                    $this->update('chitietsanpham', $data, $idDetalPro);
                    return true;
                }
            }
            return false;
        }
        public function getDataOrderAdmin($status='', $sort='thoigian desc', $find = '', $limit = '', $page = ''){
            if (!$sort){
                $sort = 'thoigian';
            }
            $sql = "SELECT dh.id, tt.hoten, dh.thoigian, dh.tongtien, dh.trangthai
            FROM thongtingiaohang tt
            JOIN donhang dh ON dh.idgiaohang = tt.id
            WHERE tt.hoten 
            LIKE '%$find%'";
            if($status){
                $sql .= " AND dh.trangthai = '$status'";
            }
            $sql .= " ORDER BY $sort"; 
            if ($limit && !$page){
                $sql .= " LIMIT $limit";
            }
            if ($limit && $page){
                $sql .= " LIMIT $limit offset ". ($page-1)*$limit;
            }
            $query = $this->select_by_sql($sql);
                return $query; 
        }
        // lấy chi tiết đơn hàng
        public function getDetailOrder($id){
            $sql = "SELECT ttgh.hoten,ttgh.diachi,ttgh.sodienthoai,trangthai,ghichu 
            FROM donhang dh,thongtingiaohang ttgh
            WHERE dh.idgiaohang = ttgh.id AND
                  dh.id = '$id'";
            $order = $this->select_by_sql($sql);
            if(!$order){
                return false;
            } else {
                $order = $order[0];
            }
            $sql = "SELECT ten,kichthuoc,mausac,hinhanh
            FROM sanpham sp,hinhanh ha,kichthuoc kt,mausac ms,chitietdonhang ctdh,chitietsanpham ctsp
            WHERE ctdh.idchitietsanpham = ctsp.id AND
                  sp.id = ctsp.idsanpham AND
                  ctsp.idkichthuoc = kt.id AND
                  ctsp.idmausac = ms.id AND
                  ha.idsanpham = sp.id AND
                  ctdh.iddonhang = '$id'";
            $order['chitietdonhang'] = $this->select_by_sql($sql);
            return $order;
            
        }
        
        // lay đơn hàng bằng trạng thài & thời gian
        public function getNumberOrder($status = '',$timeb='',$timee=''){
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
        private function _checkPrice($idDetalPro, $price){
            $query = $this->select('chitietsanpham c, sanpham s', 's.gia', "c.id = '$idDetalPro' and c.idsanpham = s.id");
            if ($query){
                $pricePro = $query[0]['gia'];
                if ($pricePro == $price){
                    return true;
                } else {
                    return false;
                }
            } else{
                return false;
            }
        }
    }


?>