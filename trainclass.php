<?php
require_once './departmentNav.php';
require_once '../db/db.class.php';
$db = new DB();

$sql = "SELECT * FROM classinfo AS c
JOIN train AS t ON c.train_number=t.t_number";
$trainclasses = $db->executeSelect($sql);

$sql = "select * from train";
$trainnumbers = $db->executeSelect($sql);
?>

<div class="container-fluid">
    <div class="row mt-5 mr-5">
        <div class="col-12 text-right">
            <button type="button" class="btn btn-primary button" data-toggle="modal" data-target="#newTrainClass">
                Add New Train Class
            </button>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-stripped mt-5">
                <tr>
                    <th>S.No</th>
                    <th>Class Type</th>
                    <th>Fare</th>
                    <th>Train Name</th>
                    <th>Train Number</th>
                    <th>Action</th>

                </tr>
                <?php if (count($trainclasses) === 0) { ?>
                    <tr>
                        <td colspan="5" class="text-center text-danger">
                            No Record Found
                        </td>
                    </tr>

                    <?php
                } else {
                    $count = 1;
                    foreach ($trainclasses as $trainclass) {
                        ?>
                        <tr>
                            <td><?php echo $count++ ?></td>
                            <td><?php echo $trainclass["type"]; ?></td>
                            <td><?php echo $trainclass["fare"]; ?></td>
                            <td><?php echo $trainclass["t_name"]; ?></td>
                            <td><?php echo $trainclass["train_number"]; ?></td>
                            <td><button type="button"  onclick="Delete(<?php echo $trainclass['class_id']; ?>,'deleteclass');" class="btn btn-danger" >Delete</button>
                            <button type="button"  onclick="Update(<?php echo $trainclass['class_id']; ?>,'displayclass');" class="btn btn-warning"  data-toggle="modal" data-target="#updateTrainClass" >Update</button>

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

<div class="modal fade" id="newTrainClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">New Train Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="" method="POST" action="departmentAction.php" onsubmit="return validateTrainClass();">
                    <input type="hidden" id="command" name="command" value="savetrainclass"/>
                    <div class="form-group">
                        <label for="trainnumber">Train Number</label>
                        <select id="trainnumber" name="trainnumber" class="form-control">
                            <option value="-1">--SELECT TRAIN NUMBER</option>
                            <?php foreach ($trainnumbers as $trainnumber) { ?>
                                <option value="<?php echo $trainnumber["t_number"]; ?>"><?php echo $trainnumber["t_number"]; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="trainnumber">Class Type</label>
                        <select class="form-control" id="classtype" name="classtype">
                            <option value="-1">--SELECT CLASS TYPE--</option>
                            <option value="Air-Conditioned First Class(1AC)">Air-Conditioned First Class(1AC)</option>
                            <option value="Air-Conditioned Two-Tier Class(2AC)">Air-Conditioned Two-Tier Class(2AC)</option>
                            <option value="Air-Conditioned Three-Tier Class(3AC)">Air-Conditioned Three-Tier Class(3AC)</option>
                            <option value="First Class">First Class</option>
                            <option value="AC Chair Class">AC Chair Class</option>
                            <option value="Sleeper Class(SL)">Sleeper Class(SL)</option>
                            <option value="Second Class(2S)">Second Class(2S)</option>

                        </select>

                    </div>
                    <div class="form-group">
                        <label for="trainname">Fare</label>
                        <input type="text" class="form-control" id="trainfare" name="trainfare"
                               aria-describedby="emailHelp" placeholder="Fare">

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


<!--update Model-->

<div class="modal fade" id="updateTrainClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Train Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="" method="POST" action="updateAction.php">
                    <input type="hidden" id="command" name="command" value="updatetrainclass"/>
                    <input type="hidden" id="ID" name="ID" />

                    <div class="form-group">
                        <label for="trainnumber">Train Number</label>
                        <select id="up_trainnumber" name="up_trainnumber" class="form-control" required>
                            <option value="">--SELECT TRAIN NUMBER</option>
                            <?php foreach ($trainnumbers as $trainnumber) { ?>
                                <option  value="<?php echo $trainnumber["t_number"]; ?>"><?php echo $trainnumber["t_number"]; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="classtype">Class Type</label>
                        <select class="form-control" id="up_classtype" name="up_classtype" required>
                            <option value="">--SELECT CLASS TYPE--</option>
                            <option value="Air-Conditioned First Class(1AC)">Air-Conditioned First Class(1AC)</option>
                            <option value="Air-Conditioned Two-Tier Class(2AC)">Air-Conditioned Two-Tier Class(2AC)</option>
                            <option value="Air-Conditioned Three-Tier Class(3AC)">Air-Conditioned Three-Tier Class(3AC)</option>
                            <option value="First Class">First Class</option>
                            <option value="AC Chair Class">AC Chair Class</option>
                            <option value="Sleeper Class(SL)">Sleeper Class(SL)</option>
                            <option value="Second Class(2S)">Second Class(2S)</option>

                        </select>

                    </div>
                    <div class="form-group">
                        <label for="trainname">Fare</label>
                        <input type="text" class="form-control" id="up_trainfare" name="up_trainfare"
                               aria-describedby="emailHelp" placeholder="Fare" required>

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
                alert(id);
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

            $('#up_classtype').val(jsonData[i].classtype);
            $('#up_trainfare').val(jsonData[i].fare);
          

            }
        }
    });
}
</script>

        </body>
        </html>
