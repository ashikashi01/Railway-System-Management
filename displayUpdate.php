<?php

require_once '../db/db.class.php';

$db = new DB();

if (isset($_GET['command'])) { 
$data=[];
    $command = $_GET['command'];
    $ID=$_GET['id'];
    if($command =="displaytrain"){
        $sql = "select * from train where id='$ID'";
        $Trains = $db->executeSelect($sql);
        foreach($Trains as $train){
            $item = array(
                "IDS" => $train["id"],
                "number" => $train["t_number"],
                "name" => $train["t_name"],
                "source" => $train["source"],
                "destination" => $train["destination"],
                "start" => $train["start_time"],
                "end" => $train["end_time"]
    


               
            );
            array_push($data, $item);
        }
        echo json_encode($data);

    }elseif($command =="displayclass"){
        $sql = "select * from classinfo where class_id='$ID'";
        $Trains = $db->executeSelect($sql);
        foreach($Trains as $train){
            $item = array(
                "IDS" => $train["class_id"],
                "number" => $train["train_number"],
                "classtype" => $train["type"],
                "fare" => $train["fare"],
                


               
            );
            array_push($data, $item);
        }
        echo json_encode($data);

    }elseif($command =="displaypassenger"){
        $sql = "select * from passenger where id='$ID'";
        $Passenger = $db->executeSelect($sql);
        foreach($Passenger as $pass){
            $item = array(
                "IDS" => $pass["id"],
                "name" => $pass["name"],
                "phone" => $pass["contactno"],
                "gender" => $pass["gender"],
                "email" => $pass["emailid"],

                


               
            );
            array_push($data, $item);
        }
        echo json_encode($data);

    }







}