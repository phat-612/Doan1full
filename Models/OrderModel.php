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
                    'trangthai': 'Chờ xử lý',
                    'nguoidung': [
                        'hoten': 'Nguyen van a',
                        'sodienthoai': '0123456789',
                        'diachi': 'cna tho',
                        'mail': '@gmail.com'
                    ],
                    'chitietdathang': [
                        [
                            'idchitietsanpham': '1',
                            'soluong': '12'
                        ],
                    ]
                ]
            */
            $dataOrderDetail = array_pop($data);
            $dataUser = array_pop($data);
            $dataOrder = $data;
            $prices = $this->_getPriceOrder($dataOrderDetail);
            $idUser = $this->create('nguoidung', $dataUser);
            $dataOrder['idnguoidung'] = $idUser;
            $dataOrder['tongtien'] = array_pop($prices);
            $idOrder = $this->create(self::TABLE, $dataOrder);
            foreach($dataOrderDetail as $value){
                $value['iddonhang'] = $idOrder;
                $value['gia']= array_shift($prices);
                $this->create('chitietdonhang', $value);
            }
        }
        public function totalRevenue()
        {
            $totalRevenues = 0;
            $monney = $this->select('donhang', 'tongtien', "trangthai='Đã xác nhận'");
            $monney= $this -> arr2to1($monney);
            foreach($monney as $value){
                $totalRevenues += $value;
            }
            inmang($totalRevenues);
            return $totalRevenues;
        }
        public function changeStatusOrder($id, $status){
            $this->update('donhang', [
                "trangthai"=>$status
            ], $id);
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
    }


?>