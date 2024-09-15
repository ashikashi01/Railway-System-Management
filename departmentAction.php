<?php

require_once '../db/db.class.php';

$db = new DB();

if (isset($_POST['command'])) {

    $command = $_POST['command'];

    if ($command == 'savetrain') {
        $trainnumber = $_POST["trainnumber"];
        $trainname = $_POST["trainname"];
        $source = $_POST["source"];
        $destination = $_POST["destination"];
        $starttime = $_POST["starttime"];
        $endtime = $_POST["endtime"];
        $insert = "INSERT INTO train(t_name,source,destination,start_time,end_time,t_number)";
        $values = " VALUES('$trainname','$source','$destination','$starttime','$endtime','$trainnumber')";

        $sql = $insert . $values;


        $res = $db->executeInsertAndGetId($sql);

        if ($res > 0) {
            echo '<script>alert("Data saved Successfully.."); window.location="trains.php";</script>';
//            header("Location: login.php");
        } else {
            throw new Exception("Something went wrong. Try again");
        }
    } else if ($command == "deptLogin") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username == "admin" && $password == "admin") {
            header("Location: home.php");
        } else {
            echo '<script>alert("Invalid Credentials. Please try again.."); window.location="login.php";</script>';
        }
    } else if ($command == 'savetrainclass') {
        $trainnumber = $_POST["trainnumber"];
        $classtype = $_POST["classtype"];
        $trainfare = $_POST["trainfare"];

        $insert = "INSERT INTO classinfo(type,fare,train_number)";
        $values = " VALUES('$classtype',$trainfare,'$trainnumber')";
        $sql = $insert . $values;
        $res = $db->executeInsertAndGetId($sql);

        if ($res > 0) {
            echo '<script>alert("Data saved Successfully.."); window.location="trainclass.php";</script>';
//            header("Location: login.php");
        } else {
            throw new Exception("Something went wrong. Try again");
        }
    }
}


