<?php
$id=$_GET["id"];
require('../db.php');
$ds = $conn->prepare("SELECT * FROM dia_danh WHERE id='$id'");
$ds->execute();
$ds->setFetchMode(PDO::FETCH_ASSOC);
$result = $ds->fetchAll();
$conn=null;
echo json_encode($result);
?>