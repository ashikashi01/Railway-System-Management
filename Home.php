
<?php


require_once './passengerNav.php';

require_once '../db/db.class.php';
$db = new DB();


$sql = "select * from train";
$train = $db->executeSelect($sql);
?>

<form class="form-inline my-5 mx-5 justify-content-center">
  <div class="form-group mb-2">

<lable for="inputname" id="name"><b>Source:</b> </lable>
<select class="Names" name="trainsource" id="trainsource"selected="selected">
    <option value="" selected="selected"  >---Select Source---</option>
 <?php   foreach ($train as $Trains){?>
        <option value="<?php echo $Trains['source']; ?> "><?php echo $Trains["source"]; ?></option>
    <?php }?>
</select>

</div>
<div class="form-group mx-sm-3 mb-2">

<lable for="inputname" id="name"><b>Destination:</b> </lable>
<select class="Names" name="traindestination" id="traindestination"selected="selected">
    <option value="" selected="selected"  >---Select Destination---</option>
 <?php   foreach ($train as $Trains){?>
        <option value="<?php echo $Trains['destination']; ?> "><?php echo $Trains["destination"]; ?></option>
    <?php }?>
</select>

</div>
<button  class="btn btn-primary mb-2" name="search" id="search" >Search</button>
 </form>
 <div id="displaydata">

 </div>

 
 <script src="../js/myscript.js" type="text/javascript"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script>
            $(document).ready(function () {
                $("#search").click(function (e) {
                    if ( $("#trainsource").val() === "" || $("#traindestination").val() === "") {

                        alert('Please select option from all given fields ');
                    } else {
                        $.ajax({
                            type: "GET",
                            url: "traindetails.php",
                            data: {
                                source: $("#trainsource").val(),
                                destination: $("#traindestination").val()

                            }, //sending the data to the displayStudent.php

                            success: function (result) {

                                $("#displaydata").html(result);
                                
                                // print the result

                            }

                        });
                    }

                    e.preventDefault();

                });

            });





        </script>
</body>
</html>
