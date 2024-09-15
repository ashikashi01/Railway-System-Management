<?php

require_once './passengerNav.php';

session_start();
require_once '../db/db.class.php';
$db = new DB();
$passengerid= $_SESSION['id'];
$sql = "SELECT *
FROM checks
JOIN passenger ON
passenger.id=checks.passengerid
JOIN train
ON train.t_number=checks.trainno
WHERE passengerid='$passengerid'";

$trains = $db->executeSelect($sql);
?>

 <div class="row ">
        <div class="col-12">
            <table class="table table-stripped mt-5">
                <tr>
                    <th>S.No</th>
                    <th>Passenger Name</th>
                    <th>Train Name</th>
                   
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
                            <td><?php echo $train["name"]; ?></td>
                            <td><?php echo $train["t_name"]; ?></td>
                            

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







