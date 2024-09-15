<?php

require_once '../db/db.class.php';

$db = new DB();

if (isset($_POST['command'])) { 
    $command = $_POST['command'];

    if($command =="Updatetrain"){
        $id=$_POST["ID"];
        $trainnumber = $_POST["up_trainnumber"];
        $trainname = $_POST["up_trainname"];
        $source = $_POST["up_source"];
        $destination = $_POST["up_destination"];
        $starttime = $_POST["up_starttime"];
        $endtime = $_POST["up_endtime"];
        $sql="UPDATE train set t_name='$trainname',t_number='$trainnumber',source='$source',destination='$destination',start_time='$starttime',end_time='$endtime' where id='$id' ";
        $res = $db-> executeUpdate($sql);
    
            echo '<script>alert(" Successfully Updated.."); window.location="trains.php";</script>';
//         
       


    }elseif($command =="updatetrainclass"){
        $id=$_POST["ID"];
        $trainnumber = $_POST["up_trainnumber"];
        $class = $_POST["up_classtype"];
        $fare = $_POST["up_trainfare"];
      
       
        $sql="UPDATE classinfo set type='$class',fare='$fare',train_number='$trainnumber' where class_id='$id' ";
        $res = $db-> executeUpdate($sql);
    
            echo '<script>alert(" Successfully Updated.."); window.location="trainclass.php";</script>';
//         
      


}elseif($command =="updatepassenger"){
    $id=$_POST["ID"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $gender = $_POST["passengegender"];

   
    $sql="UPDATE passenger set name='$name',contactno='$phone',gender='$gender', emailid='$email' where id='$id' ";
    $res = $db-> executeUpdate($sql);

        echo '<script>alert(" Successfully Updated.."); window.location="passenger.php";</script>';
//         
  


}
}
