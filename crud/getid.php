<?php
/* Cố gắng kết nối máy chủ MySQL. Giả sử bạn đang chạy MySQL
Máy chủ có cài đặt mặc định (người dùng 'root' không có mật khẩu) */
require_once "config.php";
 
// Cố gắng thực hiện câu lệnh INSERT
$sql = "INSERT INTO employees (name, address, salary) VALUES ('Ron', 'Weasley', 'ronweasley@mail.com')";
if($mysqli->query($sql) === true){
    // Lấy ID đã chèn cuối cùng
    $last_id = $mysqli->insert_id;
    echo "Chèn bản ghi thành công. ID đã chèn cuối cùng là: " . $last_id;
} else{
    echo "ERROR: Không thể thực thi câu lệnh $sql. " . $mysqli->error;
}
 
// Đóng kết nối
$mysqli->close();
?>