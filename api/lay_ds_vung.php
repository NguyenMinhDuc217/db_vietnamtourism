<?php
require('../db.php');
$ds = $conn->prepare("SELECT * FROM vung");
$ds->execute();
$ds->setFetchMode(PDO::FETCH_ASSOC);
$result = $ds->fetchAll();
$conn=null;
echo json_encode($result);
?>