<?php
require_once './departmentNav.php';
require_once '../db/db.class.php';
$db = new DB();

$sql = "select * from passenger";
$passengers = $db->executeSelect($sql);
?>

<div class="container-fluid">

    <div class="row mt-5">
        <div class="col-12">
            <table class="table table-stripped mt-5">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Email ID</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
                <?php if (count($passengers) === 0) { ?>
                    <tr>
                        <td colspan="6" class="text-center text-danger">
                            No Record Found
                        </td>
                    </tr>

                    <?php
                } else {
                    $count = 1;
                    foreach ($passengers as $passenger) {
                        ?>
                        <tr>
                            <td><?php echo $count++ ?></td>
                            <td><?php echo $passenger["name"]; ?></td>
                            <td><?php echo $passenger["contactno"]; ?></td>
                            <td><?php echo $passenger["emailid"]; ?></td>
                            <td><?php echo $passenger["gender"]; ?></td>
                            <td><button type="button"  onclick="Delete(<?php echo $passenger['id']; ?>,'deletepassenger');" class="btn btn-danger" >Delete</button>
                            <button type="button"  onclick="Update(<?php echo $passenger['id']; ?>,'displaypassenger');" class="btn btn-warning"  data-toggle="modal" data-target="#updatepassenger" >Update</button>
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

<div class="modal fade" id="updatepassenger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Passenger</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="POST" action="updateAction.php">
                    <input type="hidden" id="command" name="command" value="updatepassenger"/>
                    <input type="hidden" id="ID" name="ID" />

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               aria-describedby="emailHelp" placeholder="Passenger Name" required>

                    </div>
                    <div class="form-group">
                        <label for="ContactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                               aria-describedby="emailHelp" placeholder="Contact Number" required>

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               aria-describedby="emailHelp" placeholder="Email Id" required>

                    </div>
                    <div class="form-group">
                        <label for="passengegender">Gender</label>
                        <select id="passengegender" name="passengegender" class="form-control" required>
                            <option value="">--SELECT GENDER--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>

                        </select>



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
            $('#name').val(jsonData[i].name);

            $('#phone').val(jsonData[i].phone);
            $('#email').val(jsonData[i].email);
            $('#passengegender').val(jsonData[i].gender);

          

            }
        }
    });
}
</script>

        </body>
        </html>
