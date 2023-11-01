<?php
    class OrderModel extends BaseModel{
        const TABLE = 'donhang';
        public function getAllOrder($column = "*", $condition = "", $order = "", $limit = ""){
            $dataOrder = $this->select(self::TABLE, $column, $condition, $order, $limit);
            foreach ($dataOrder as $value){
                $idOrder = $value['id'];
                $value['chitietdathang'] = $this->select('chitietdathang', '*', "iddonhang = $idOrder", $order, $limit);
            }
            return $dataOrder;
        }
        public function getOrderForEmail($email){
            $output = [];
            $dataUsers = $this->select('khachhang k, donhang d', '*', "k.id = d.idkhachhang and k.email = '$email'", 'd.id desc');
            if (!$dataUsers){
                return false;
            }
            foreach ($dataUsers as $key => $dataUser){
                $idOrder = $dataUser['id'];
                $output[$key] = $dataUser;
                $output[$key]['chitietdonhang'] = $this->select('chitietdonhang cd, chitietsanpham cs, sanpham s, mausac m, kichthuoc k', 's.id, s.ten, cd.gia, cd.soluong, m.mausac, k.kichthuoc', "cd.idchitietsanpham = cs.id and cs.idsanpham = s.id and cs.idmausac = m.id and cs.idkichthuoc = k.id and cd.iddonhang = '$idOrder'");
            }
            return $output;
        }
        public function getOneOrder($column = '*', $id){
            return $this->getAllOrder($column, "id = $id", '', 1);
        }
        public function addOrder($data = []){
            /*
                [
                    'ghichu': 'giao nhanh len',
                    'tongtien': 120000,
                    'khachhang': [
                        'hoten': 'Nguyen van a',
                        'sodienthoai': '0123456789',
                        'diachi': 'cna tho',
                        'email': '@gmail.com'
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
            $dataUser = $data['khachhang'];
            $dataOrder = [
                'ghichu'=>$data['ghichu'],
                'tongtien'=>$data['tongtien'],
                'trangthai'=>'Chờ xử lý',
            ];
            $this->conn->begin_transaction();
            try{
                $idUser = $this->create('khachhang', $dataUser);
                $dataOrder['idkhachhang'] = $idUser;
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