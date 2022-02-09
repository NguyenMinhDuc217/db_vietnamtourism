<?php
$id=$_GET["id"];
require('../db.php');
$ds = $conn->prepare("SELECT * FROM dia_danh,loai_dia_danh WHERE loai_dia_danh_id=1 AND loai_dia_danh_id=loai_dia_danh.$id");
$ds->execute();
$ds->setFetchMode(PDO::FETCH_ASSOC);
$result = $ds->fetchAll();
$conn=null;
echo json_encode($result);
?>