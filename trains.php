<?php
require_once './departmentNav.php';
require_once '../db/db.class.php';
$db = new DB();

$sql = "select * from train";
$trains = $db->executeSelect($sql);
?>

<div class="container-fluid">
    <div class="row mt-5 mr-5">
        <div class="col-12 text-right">
            <button type="button" class="btn btn-primary button" data-toggle="modal" data-target="#newTrain">
                Add New Train
            </button>
        </div>

    </div>
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
                            <td><button type="button"  onclick="Delete(<?php echo $train['id']; ?>,'deletetrain');" class="btn btn-danger" >Delete</button>
                            <button type="button"  onclick="Update(<?php echo $train['id']; ?>,'displaytrain');" class="btn btn-warning"  data-toggle="modal" data-target="#updateTrain" >Update</button>

                        </td>
                        </tr>


                        <?php
                    }
                }
                ?>



            </table>

        </div>

    </div>

</div>

<!--New train Model-->

<div class="modal fade" id="newTrain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">New Train</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="POST" action="departmentAction.php" onsubmit="return validateTrain();">
                    <input type="hidden" id="command" name="command" value="savetrain"/>
                    <div class="form-group">
                        <label for="trainnumber">Train Number</label>
                        <input type="text" class="form-control" id="trainnumber" name="trainnumber"
                               aria-describedby="emailHelp" placeholder="Number">

                    </div>
                    <div class="form-group">
                        <label for="trainname">Name</label>
                        <input type="text" class="form-control" id="trainname" name="trainname"
                               aria-describedby="emailHelp" placeholder="Name">

                    </div>
                    <div class="form-group">
                        <label for="source">Source Station</label>
                        <input type="mail" class="form-control" id="source" name="source"
                               aria-describedby="emailHelp" placeholder="Source Station">

                    </div>
                    <div class="form-group">
                        <label for="destination">Destination Station</label>
                        <input type="mail" class="form-control" id="destination" name="destination"
                               aria-describedby="emailHelp" placeholder="Destination Station">

                    </div>
                    <div class="form-group">
                        <label for="starttime">Start Time</label>
                        <input type="mail" class="form-control" id="starttime" name="starttime"
                               aria-describedby="emailHelp" placeholder="Strat Time">

                    </div>
                    <div class="form-group">
                        <label for="endtime">End Time</label>
                        <input type="mail" class="form-control" id="endtime" name="endtime"
                               aria-describedby="emailHelp" placeholder="End Time">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--Update Model-->

<div class="modal fade" id="updateTrain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Train</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="POST" action="updateAction.php">
                    <input type="hidden" id="command" name="command" value="Updatetrain"/>
                    <input type="hidden" id="ID" name="ID" />

                    <div class="form-group">
                        <label for="trainnumber">Train Number</label>
                        <input type="text" class="form-control" id="up_trainnumber" name="up_trainnumber"
                               aria-describedby="emailHelp" placeholder="Number" required>

                    </div>
                    <div class="form-group">
                        <label for="trainname">Name</label>
                        <input type="text" class="form-control" id="up_trainname" name="up_trainname"
                               aria-describedby="emailHelp" placeholder="Name" required>

                    </div>
                    <div class="form-group">
                        <label for="source">Source Station</label>
                        <input type="mail" class="form-control" id="up_source" name="up_source"
                               aria-describedby="emailHelp" placeholder="Source Station" required>

                    </div>
                    <div class="form-group">
                        <label for="destination">Destination Station</label>
                        <input type="mail" class="form-control" id="up_destination" name="up_destination"
                               aria-describedby="emailHelp" placeholder="Destination Station" required>

                    </div>
                    <div class="form-group">
                        <label for="starttime">Start Time</label>
                        <input type="mail" class="form-control" id="up_starttime" name="up_starttime"
                               aria-describedby="emailHelp" placeholder="Strat Time" required>

                    </div>
                    <div class="form-group">
                        <label for="endtime">End Time</label>
                        <input type="mail" class="form-control" id="up_endtime" name="up_endtime"
                               aria-describedby="emailHelp" placeholder="End Time" required>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








<script src="../js/myscript.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>

        <script type="text/javascript"  >

            function Delete(id,data) {
            
                if (confirm('Are you sure?')) {
                    $.ajax({
                        type: "POST",
                        url: "deleteAction.php",

                        data: {id: id,
                        command:data},

                        timeout: 10000,
                        success: function () {
                            document.location.reload()
                        }
                    });
                } else {
                    // Do nothing!

                }
            }


        </script>
          <script>

function Update(id,data) {
    $.ajax({
        type: "GET",
        url: "displayUpdate.php",

        data: {id: id,
            command:data},
        datatype: 'json',
        timeout: 10000,
        success: function (data) {
// alert(data);
            // var arr = new Array();
            jsonData = JSON.parse(data);
            for (var i = 0; i <= jsonData.length; i++) {

            $('#ID').val(jsonData[i].IDS);
            $('#up_trainnumber').val(jsonData[i].number);

            $('#up_trainname').val(jsonData[i].name);
            $('#up_source').val(jsonData[i].source);
            $('#up_destination').val(jsonData[i].destination);
            $('#up_starttime').val(jsonData[i].start);
            $('#up_endtime').val(jsonData[i].end); 

            }
        }
    });
}
</script>


        </body>
        </html>
