<?php
include_once '../common/header.php';

/* ?>
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand text-white " href="#">Railway System Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active ">
                <a class="nav-link text-white" href="../index.php">Back to Index Page</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-6">

        </div>

        <div class="col-6">
            <div class="card index my-5  shadow-lg p-3 mb-5 bg-white rounded body">
                <button type="button" class="btn btn-primary">Passenger Registration</button>
                <form class="mt-3" method="POST" action="passengerAction.php" onsubmit="return validate();">
                    <input type="hidden" id="command" name="command" value="savepassenger"/>
                    <div class="form-group">
                        <label for="passengername">Name</label>
                        <input type="text" class="form-control" id="passengername" name="passengername"
                               aria-describedby="emailHelp" placeholder="Enter Name">

                    </div>
                    <div class="form-group">
                        <label for="passengercontact">Contact Number</label>
                        <input type="text" class="form-control" id="passengercontact" name="passengercontact"
                               aria-describedby="emailHelp" placeholder="Enter Contact Number">

                    </div>
                    <div class="form-group">
                        <label for="passengeremail">Email ID</label>
                        <input type="mail" class="form-control" id="passengeremail" name="passengeremail"
                               aria-describedby="emailHelp" min="1000000000" max="9999999999" placeholder="Enter Email ID">

                    </div>
                    <div class="form-group">
                        <label for="passengegender">Gender</label>
                        <select id="passengegender" name="passengegender" class="form-control">
                            <option value="-1">--SELECT GENDER--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>

                        </select>



                    </div>
                    <div class="form-group">
                        <label for="passengerpassword">Password</label>
                        <input type="password" class="form-control" id="passengerpassword" placeholder="Password" name="passengerpassword">
                    </div>

                    <button type="submit" class="btn btn-primary form-control">SAVE</button>
<!--                    <small class="ml-5"> Not have an Account..? Click <span>
                            <a href="registration.php">HERE</a>
                        </span></small>-->
                </form>
            </div>
        </div>

    </div>

</div>

<script src="../js/myscript.js" type="text/javascript">
    <?php
    include_once '../common/footer.php';
    ?>