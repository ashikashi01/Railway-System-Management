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
                <button type="button" class="btn btn-primary">Passenger Login</button>
                <form class="mt-3" method="POST" action="passengerAction.php" onsubmit= "return validatepassengerLogin();" >
                <input type="hidden" id="command" name="command" value="loginpassenger"/>

                    <div class="form-group">
                        <label for="passengerphone">Contact Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"aria-describedby="emailHelp" minlength="10" maxlength="10" placeholder="Contact Number">

                    </div>
                    <div class="form-group">
                        <label for="passengerpassword">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                    <small class="ml-5 mt-3 row "> Not have an Account..? Click <span>
                            <a href="registration.php" class="ml-1 text-center"> HERE</a>
                        </span></small>
                </form>
            </div>
        </div>

    </div>

</div>
<script src="../js/myscript.js" type="text/javascript">
<?php
require_once '../common/footer.php';
?>