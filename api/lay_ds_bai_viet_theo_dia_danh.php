<?php
$id=$_GET["id"];
require('../db.php');
$ds = $conn->prepare("SELECT bai_viet.*, ten_nguoi_dung, ten_dia_danh FROM bai_viet,tai_khoan,dia_danh WHERE dia_danh_id=$id AND tai_khoan.id=tai_khoan_id AND dia_danh.id=dia_danh_id");
$ds->execute();
$ds->setFetchMode(PDO::FETCH_ASSOC);
$result = $ds->fetchAll();
$conn=null;
echo json_encode($result);
?>