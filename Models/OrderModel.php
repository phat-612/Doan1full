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
                        'mail': '@gmail.com'
                    ],
                    'chitietdathang': [
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
                   if (!$isQua){
                        throw new Exception("Không đủ số lượng");
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
    }


?>