<?php

include_once '../common/header.php';

require_once '../db/db.class.php';
$db = new DB();
$Source=$_GET["source"];
$Destination=$_GET["destination"];

$sql = "select * from train where source='$Source' and destination='$Destination'";
$trains = $db->executeSelect($sql);
?>

 <div class="row">
        <div class="col-12">
            <table class="table table-stripped mt-5">
                <tr>
                    <th>S.No</th>
                    <th>Train No</th>
                    <th>Name</th>
                    <th>Starting Station</th>
                    <th>Destination</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                </tr>
                <?php if (count($trains) === 0) { ?>
                    <tr>
                        <td colspan="8" class="text-center text-danger">
                            No Record Found
                        </td>
                    </tr>

                    <?php
                } else {
                    $count = 1;
                    foreach ($trains as $train) {
                        ?>
                        <tr>
                            <td><?php echo $count++ ?></td>
                            <td><?php echo $train["t_number"]; ?></td>
                            <td><?php echo $train["t_name"]; ?></td>
                            <td><?php echo $train["source"]; ?></td>
                            <td><?php echo $train["destination"]; ?></td>
                            <td><?php echo $train["start_time"]; ?></td>
                            <td><?php echo $train["end_time"]; ?></td>
                            <!-- <td><a class="btn btn-primary" href="bookticket.php" >Book Ticket</a></td> -->
                          <?php  echo "<td><a class='btn btn-primary'   href='bookticket.php?trainno=".$train["t_number"]."'>Book Ticket</a></td>";?>

                        </tr>


                        <?php
                    }
                }
                ?>



            </table>

        </div>

    </div>
    <?php
require_once '../common/footer.php';
?>







