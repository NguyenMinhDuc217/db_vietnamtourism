<?php
$id=$_GET["id"];
require('../db.php');
$ds = $conn->prepare("SELECT dia_danh.*, loai_dia_danh.ten as ten_loai_dia_danh FROM dia_danh,loai_dia_danh WHERE loai_dia_danh_id=$id AND loai_dia_danh_id=loai_dia_danh.id");
$ds->execute();
$ds->setFetchMode(PDO::FETCH_ASSOC);
$result = $ds->fetchAll();
$conn=null;
echo json_encode($result);
?>