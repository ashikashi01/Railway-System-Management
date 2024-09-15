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
        <div class="col-3">

        </div>
        <div class="col-6">

            <div class="card index my-5  shadow-lg p-3 mb-5 bg-white rounded">
                <button type="button" class="btn btn-primary">Department Login</button>
                <form class="mt-3" action="departmentAction.php" method="POST" >
                    <input type="hidden" id="command" name="command" value="deptLogin"/>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                               aria-describedby="emailHelp"
                               placeholder="Username">

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"  name="password"
                               placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary form-control">Login</button>

                </form>

            </div>
            <div class="col-3">

            </div>
        </div>

    </div>

</div>

<?php
require_once '../common/footer.php';
?>