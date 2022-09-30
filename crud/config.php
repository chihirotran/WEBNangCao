<?php
/* Thông tin CSDL. Giả sử bạn đang chạy MySQL Server với thiết lập mặc định (user 'root' và không có mật khẩu) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'employee');
 
/* Cố gắng kết nối với cơ sở dữ liệu MySQL */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Kiểm tra kết nối
if($mysqli === false){
    die("ERROR: Không thể kết nối. " . $mysqli->connect_error);
}
?>