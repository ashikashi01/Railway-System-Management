<?php

require_once '../db/db.class.php';
session_start();
$db = new DB();
if (isset($_POST['command'])) {

    $command = $_POST['command'];
    $id=$_POST['id'];
    if ($command == 'deletepassenger') {
   
    $sql="DELETE FROM passenger WHERE id='$id'";
    $res = $db-> executeUpdate($sql);
    }elseif($command == 'deletetrain'){
        $sql="DELETE FROM train WHERE id='$id'";
        $res = $db-> executeUpdate($sql);
    }elseif($command == 'deleteclass'){
        $sql="DELETE FROM classinfo WHERE class_id='$id'";
        $res = $db-> executeUpdate($sql);
    }




}