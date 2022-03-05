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
        </tr><hr class="bg-light">
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
    <h3 class="text-center">Change your password </h3><br>
    <div class="row">
    <div style="margin-top: 3%; margin-left: 20%;" class="col-8">
        <div class="card bg-light">

        <?php
        
        if(isset($_POST['change_password'])){
            $password = $_POST['password'];
            $password1 = $_POST['pass1'];
            $password2 = $_POST['pass2'];
        
            $query = "SELECT * FROM `manager` WHERE `email`='".$_SESSION['email']."'";
            $mysqli_query = mysqli_query($con,$query) or die(mysqli_error($con));
            $mysqli_num_rows = mysqli_num_rows($mysqli_query);
        
            while ($row = mysqli_fetch_assoc($mysqli_query)){
                $get_pass = $row['password'];
            }
            if($password==$get_pass){
                if($password2==$password1){
                    //update;
                    $query_update = "UPDATE `manager` SET `password`='".$password1."' WHERE `email`='".$_SESSION['email']."'";
                    $mysqli_query_update = mysqli_query($con,$query_update);
                    if($mysqli_query_update==1){?>
                       <p class="text-success">Password changed successfully.</p>
                   <?php }
                }else{?>
                       <p class="text-danger">New passwords don't match.</p>
                   <?php }
        
            }else{?>
                <p class="text-danger">Incorrect current password.</p>
            <?php }
        }
        
        ?>
            <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                <div class="form-group">
                <label> <strong>Current password: </strong></label>
                <input name="password" type="text" class="form-control" required/><br/><br></div>
                <div class="form-group">
                <label> <strong>New password: </strong></label>
                <input name="pass1" type="password1" class="form-control" required /> <br/><br></div>
                <div class="form-group">
                <label> <strong>Confirm new password: </strong></label>
                <input name="pass2" type="password2" class="form-control" required/><br/><br></div>
                
                </div>
                <button class="btn btn-primary" name="change_password">Change password</button>
            </form>
    
            </div>
            </div>
        </div>
    </div>
    
    </div>
    </div>
    </div>
    </div>


    <?php include('footer.php'); ?>