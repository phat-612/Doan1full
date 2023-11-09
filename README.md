- [Lệnh thông dụng](#lệnh-thông-dụng)
- [Điều kiện](#điều-kiện)
  - [Mặc định là false](#mặc-định-là-false)
  - [If](#if)
  - [Toán tử 3 ngôi](#toán-tử-3-ngôi)
- [Lặp](#lặp)
  - [For](#for)
  - [Foreach](#foreach)
  - [While](#while)
- [Mảng](#mảng)
  - [Mảng index](#mảng-index)
  - [Mảng key](#mảng-key)
  - [Mảng 2 chiều](#mảng-2-chiều)
- [Biến toàn cục](#biến-toàn-cục)
- [Function](#function)
  - [Lưu ý](#lưu-ý)
- [Kết nối cơ sở dữ liệu](#kết-nối-cơ-sở-dữ-liệu)
  - [Tạo kết nối](#tạo-kết-nối)
  - [Một số hàm phổ biến](#một-số-hàm-phổ-biến)


# Lệnh thông dụng

1. echo
2. header
3. die


# Điều kiện
## Mặc định là false
1. false
2. null
3. []
4. 0
5. ''
## If
```php
if (điều kiện){

} else if (điều kiện){

} else{

}
```
1. &&: và
2. ||: hoặc
## Toán tử 3 ngôi
```php
$tenbien = điều kiện ? giá trị khi đúng : giá trị khi sai
```
Ví dụ:
```php
$age = 13;
// ngắn
$truongThanh = $age > 18 ? true : false;
// thay vì
if ($age > 18) {
 $truongThanh = true;
} else{
  $truongThanh = false;
}


$page = isset($_GET['page']) ? $_GET['page'] : 1;
```
# Lặp

## For
```php
for ($i = 0; $i < 10; $i++) {}
```

```php
$dem = 5;
$i = 3;
echo $i++; // in ra 3
// sau đó tắng lên 4
echo $i;
$i = i + 1;

for ($i = 0; $i < 10; $i++){
}

```
## Foreach
```php
$arr = [
    'ten' => 'Phát',
    'tuoi' => '12'
]
print_r($arr); //in mảng
foreach($arr as $key => $value){
    echo $value; // Phát 12
}

```
## While
```php
while (điều kiện){

}
while (true){
  echo 1;
  break;
}

while ($row = mysqli_fetch_assoc($query)){
}

```


# Mảng

## Mảng index
```php
$ arr = [
    '0' => 'Con chó',
    '1' => 'Con mèo',
    '2' => 'Con heo',
]
echo $arr[2];
```

## Mảng key
```php
[
    'ten' => 'Phát',
    'tuoi' => '12'
]
echo $arr['ten'];
```

## Mảng 2 chiều 
```php
$arr = [
    '0' => ['id' => '1', 'loai' => 'Điện thoại'],
    '1' => ['id' => '2', 'loai' => 'Laptop']
]
echo $arr[1]['loai']; // Laptop
```
# Biến toàn cục
1. $_GET
```php
$_GET = [
    'id' => '2',
    'page'=> 'trangchu'
]
```
3. $_POST
4. $_FILES
5. $_SESSION
```php
$_SESSION['isLogin'] = true;
```

# Function
## Lưu ý
1. Tham số
2. Dữ liệu trả về
3. Return

```php
function ten($thamso){}
```
# Kết nối cơ sở dữ liệu

## Tạo kết nối
```php
define('HOST_DB', 'localhost');
define('USER_DB', 'root');
define('PW_DB', '');
define('NAME_DB', 'do_an_1');
$conn = mysqli_connect(HOST_DB, USER_DB, PW_DB, NAME_DB);
mysqli_set_charset($conn, 'utf8');
if ($conn->connect_error) {
    die('Kết nối cơ sở dữ liệu thất bại: ' . $conn->connect_error);
}
```
## Một số hàm phổ biến

1. Chạy câu lệnh sql
```php
$query = mysqli_query($conn, $sql);
```
2. Lấy ra dữ liệu từ query
```php
$row = mysqli_fetch_assoc($query);
```

