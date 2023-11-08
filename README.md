
# Điều kiện

## If
```php
if (*điều kiện*){

} else if (*điều kiện*){

} else{

}
```

## Toán tử 3 ngôi
```php
$tenbien = *điều kiện* ? *giá trị khi đúng* : *giá trị khi sai*
```

# Lặp

## For
```php
for ($i = 0; $i < 10; $i++) {}
```
## Foreach
```php
foreach($arr as $key => $value){}
```
## While
```php
while (điều kiện){}
```


# Mảng

## Mảng index
```php
[
    '0' => 'Con chó',
    '1' => 'Con mèo',
    '2' => 'Con heo',
]
```

## Mảng key
```php
[
    'ten' => 'Phát',
    'tuoi' => '12'
]
```

## Mảng 2 chiều 
```php
[
    ['id' => '1', 'loai' => 'Điện thoại'],
    ['id' => '2', 'loai' => 'Laptop']
]
```
# Biến toàn cục
1. $_GET
2. $_POST
3. $_FILES
4. $_SESSION

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