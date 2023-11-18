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
        public function getListOrder($status = '', $sort = ''){
            $table = "taikhoan tk, thongtingiaohang ttgh, donhang dh, chitietdonhang ctdh, chitietsanpham ctsp, kichthuoc kt, mausac ms";
            $collumn = "ttgh.hoten, ttgh.sodienthoai, ttgh.diachi, dh.ghichu, dh.tongtien, dh.trangthai, dh.thoigian, ctdh.gia, ctdh.soluong, ctdh.gia, kt.kichthuoc, ms.mausac, ctsp.id";
            $condition = "tk.id = dh.idtaikhoan and dh.idgiaohang = ttgh.id and dh.id = ctdh.iddonhang and ctdh.idchitietsanpham = ctsp.id and ctsp.idmausac = ms.id and ctsp.idkichthuoc = kt.id";
            
            // $sql = $this->select($table);
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
            $sql = "SELECT dh.id, tk.hoten, dh.thoigian, dh.tongtien, dh.trangthai
            FROM taikhoan tk
            JOIN donhang dh ON tk.id = dh.idtaikhoan
            WHERE tk.hoten
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
            $sql = "Select * from donhang";
            $query = $this->select_by_sql($sql);
            return $query;
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