<?php

$userId = $_GET["user_id"];
$diaDanhId = $_GET["dia_danh_id"];
$cam_nghi = $_GET["cam_nghi"];
$danh_gia = $_GET["danh_gia"];
$date = date('d/m/Y', time());
require('../db.php');

$ktra = $conn->prepare("SELECT * FROM bai_viet WHERE dia_danh_id=$diaDanhId AND tai_khoan_id=$userId");
$ktra->execute();
if ($ktra->rowCount() < 1) {
    $update = $conn->prepare("INSERT INTO bai_viet(tai_khoan_id, dia_danh_id, so_luong_view, so_luong_like, so_luong_unlike,cam_nghi,danh_gia,thoi_gian) VALUES ($userId,$diaDanhId,'0','0','0','$cam_nghi','$danh_gia','$date')");
    $update->execute();
    $update->setFetchMode(PDO::FETCH_ASSOC);
    $result = $update->fetchAll();
    echo json_encode($result);
    die();
} else {
    $update = $conn->prepare("UPDATE bai_viet SET cam_nghi='$cam_nghi',danh_gia='$danh_gia' WHERE dia_danh_id=$diaDanhId AND tai_khoan_id=$userId ");
    $update->execute();
    $update->setFetchMode(PDO::FETCH_ASSOC);
    $result = $update->fetchAll();
    $conn = null;
    echo json_encode($result);
}
