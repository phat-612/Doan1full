<?php
    class BaseModel
    {
        private $conn;
        public function __construct()
        {
            $host = 'localhost';
            $userName = 'root';
            $password = '';
            $dbName = 'do_an_1';
            $this->conn = mysqli_connect($host, $userName, $password, $dbName);
            mysqli_set_charset($this->conn, 'utf8');
            if ($this->conn->connect_error) {
                die('Kết nối cơ sở dữ liệu thất bại: ' . $this->conn->connect_error);
            }
        }
        protected function select($table, $column = '*', $condition = '', $order = '', $limit ='', $offset =''){
            $sql = "SELECT $column FROM $table";
            if ($condition){
                $sql .= " WHERE $condition";
            }
            if ($order){
                $sql .= " ORDER BY $order";
            }
            if ($limit){
                $sql .= " LIMIT $limit";
            }
            if ($offset){
                $sql .= " OFFSET $offset";
            }
            $query = $this->_query($sql);
            $data = [];
            while ($row = mysqli_fetch_assoc($query))
            {
                array_push($data, $row);
            }
            return $data;
        }
        protected function create($table, $data){
            /*
                $data = [
                    'ten'=>'quan tay,

                ];
            */
            $column = implode(',', array_keys($data));
            $values = array_values($data);
            $values = implode(', ', array_map(function($value){
                return '"' . $value . '"';
            }, $values));
            $sql = "INSERT INTO $table ($column) VALUES ($values);";
            // echo $sql .'<br />';
            $query = $this->_query($sql);
            $id = mysqli_insert_id($this->conn);
            return $id;
        }
        protected function update($table, $data, $id){
            /*
                $data = [
                    'ten'=>'quan tay,

                ];
            */
            $set = array_map(function($key, $value){
                return "$key = '$value'";
            }, array_keys($data), array_values($data));
            $set = implode(',', $set);
            $sql = "UPDATE $table SET $set WHERE id = $id";
            $this->_query($sql);
        }
        protected function delete($table, $cond){
            $sql = "DELETE FROM $table WHERE $cond";
            $this->_query($sql);
        }
        protected function generateUUIDv4() {
            $data = random_bytes(16);
            assert(strlen($data) == 16);
        
            // Set version (4) and variant (random)
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        
            // Format UUID string
            $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        
            return $uuid;
        }
        protected function arr2to1($arr){
            $result = [];
            foreach ($arr as $key => $values){
                foreach($values as $value){
                    $result[]= $value;
                }
            }
            return $result;
        }
        protected function deleteFile($filePath){
            if(file_exists($filePath)){
                if (unlink($filePath)){
                    return true;
                }
            }
            return false;
        }
        private function _query($sql){
            echo $sql . '<br />';
            return mysqli_query($this->conn, $sql);
        }
        
    }
?>