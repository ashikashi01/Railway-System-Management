<?php

session_start();
require_once '../db/db.class.php';
$db = new DB();
$id=$_GET["id"];


$sql = "select * from classinfo where class_id='$id' ";
$amount = $db->executeSelect($sql);
foreach($amount as $amt){
$_SESSION['comid']=$amt['class_id'];
echo json_encode($amt['fare']);
}
?>