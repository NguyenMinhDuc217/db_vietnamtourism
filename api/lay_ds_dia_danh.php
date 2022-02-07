<?php
require('../db.php');
$ds = $conn->prepare("SELECT * FROM dia_danh");
$ds->execute();
$ds->setFetchMode(PDO::FETCH_ASSOC);
$result = $ds->fetchAll();
$conn=null;
echo json_encode($result);
?>