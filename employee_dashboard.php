<?php 
session_start();
include('headerTwo.php');?>
<?php
$con=mysqli_connect("localhost","root","","csms");
 $email = $_SESSION['email'];
 $name = $_SESSION['name'];
 $number = $_SESSION['number'];
 $branch = $_SESSION['branch'];
 $password = $_SESSION['password'];
?>
<div class="container-fluid">
    <div class="row">
    <div class="col-3 text-light bg-dark text-center" style="min-height: 600px;"><hr class="bg-primary">
    <h2 class="text-warning">Manager's Dashboard</h2><br><hr>
        
    <!--<img class="img-fluid img-thumbnail mx-auto d-block" alt="Responsive image" src="<?php?>" style="height: 150px; width: 150px;"><br><br><br>-->
        <tr class="text-center"> 
        <button class="fun btn btn-light w-100" data-toggle="collapse" data-target="#manager"><h5>Profile</h5></button>
        </tr><hr class="bg-dark">
            <div id="manager" class="collapse">
                <div class="container-fluid padding">
                <div class="row">
                <a class="text-light" href="change_pass.php">Change Password</a>              
                </div>
                <div class="row">
                <a class="text-light" href="profile_details.php">Profile Details</a>              
                </div>
                </div>
            </div>
        <tr class="text-center">
        <a href="add_consignment.php"><button class="fun btn btn-light w-100"><h5>Add Consignment</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="view_added_consignment.php"><button class="fun btn btn-light w-100"><h5>View Added Consignment</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="view_arriving_consignment.php"><button class="fun btn btn-light w-100"><h5>View Arriving Consignment</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="logout_employee.php"><button class="fun btn btn-light w-100"><h5>Sign out </h5></button></a>
        </tr><hr class="bg-light">

    </div>
    <div class="col-9"><br>
    <div class="jumbotron">
    <h3 class="text-center">Hello <?php echo ucfirst($name); ?>, Welcome to your dashboard.</h3><br>
    <div class="row">
    
    </div>
    
    </div>
    </div>
    </div>
    </div>


    <?php include('footer.php'); ?>