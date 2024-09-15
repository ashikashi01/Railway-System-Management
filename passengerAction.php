<?php

require_once '../db/db.class.php';
session_start();
$db = new DB();

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['command'])) {

    $command = $_POST['command'];

    if ($command == 'savepassenger') {
        $name = $_POST["passengername"];
        $contact = $_POST["passengercontact"];
        $email = $_POST["passengeremail"];
        $gender = $_POST["passengegender"];
        $password = $_POST["passengerpassword"];
        $insert = "INSERT INTO passenger(name,contactno,emailid,gender,password)";
        $values = " VALUES('$name','$contact','$email','$gender','$password')";

        $sql = $insert . $values;

        $res = $db->executeInsertAndGetId($sql);

        if ($res > 0) {
            echo '<script>alert("Data saved Successfully.."); window.location="login.php";</script>';
//            header("Location: login.php");
        } else {
            throw new Exception("Something went wrong. Try again");
        }
    }elseif($command == "loginpassenger"){
       
        $Phonenumber=$_POST["phone"];
        $Password=$_POST['password'];
        $sql = "select * from passenger where contactno='$Phonenumber' and password='$Password' ";
        $passengers = $db->executeSelect($sql);
        if (count($passengers) > 0) {
            foreach($passengers as $ids){
            $_SESSION['id']=$ids['id'];
            }
            header("Location: home.php");

        }else{
            echo '<script>alert("Invalid Credentials. Please try again.."); window.location="login.php";</script>';

        }
    }elseif ($command == 'bookticket') {
        $passengerid= $_SESSION['id'];
$TrainNo=$_SESSION['train'];

        $com_no =$_SESSION['comid'];
        $source = $_POST["source"];
        $destination = $_POST["destination"];
        $compartment = $_POST["compartment"];
        $seatno = $_POST["seatno"];
        $total=$_POST['totalamt'];
        $insert = "INSERT INTO ticket(Passenger_id,Class_No,Source,Destination,Compartment,Seat_No,Total_Amt)";
        $values = " VALUES('$passengerid','$com_no','$source','$destination','$compartment','$seatno',' $total')";

        $sql = $insert . $values;

        $res = $db->executeInsertAndGetId($sql);

        $InsertData="INSERT INTO checks(passengerid,trainno) values('$passengerid','$TrainNo')";
        $data = $db->executeInsertAndGetId($InsertData);
        if ($res > 0) {
            echo '<script>alert("Data saved Successfully.."); window.location="Home.php";</script>';
//            header("Location: login.php");
        } else {
            throw new Exception("Something went wrong. Try again");
        }
       
}
}

