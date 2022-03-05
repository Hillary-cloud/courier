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
    
    <h3 class="text-center">Your profile details</h3><br>
    <div style="margin-top: 3%; margin-left: 20%;" class="col-8">
        <div class="card bg-light">
            <div class="card-body">
            
            <?php 

                if (isset($_POST['update'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $number = $_POST['number'];
                    $email = $_POST['email'];
                    $branch = $_POST['branch'];
                    $address = $_POST['address'];
                    $password = $_POST['password'];

                    $query = "UPDATE `manager` SET `name`='".$name."',`number`='".$number."',`email`='".$email."',`branch`='".$branch."',
                    `address`='".$address."',`password`='".$password."' where email = '$email'";
                    $result = mysqli_query($con,$query) or die(mysqli_error($con));
                    if ($result) {?>
                        <h5 class="text-success"> updated successfully</h5>
                    <?php }else {?>
                        <h5 class="text-danger"> could not be uploaded.</h5>
                    <?php }
                }
                                
                $query = "select * from manager where email='$email'";
                $result = mysqli_query($con,$query) or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($result)) { ?>
                <form action="" method="post">
                <div class="row">
                
                <div class="col-6">
                    <input name="id" class=" form-control d-none" type="text" value="<?php echo $row['id']; ?>" readonly required><br>
                    <label> <strong>Manager's Name:  </strong></label><input name="name" class=" form-control" type="text" value="<?php echo ucfirst($row['name']); ?>" readonly required><br><br>
                    <label> <strong>Phone number: </strong></label><input name="number" type="text" class=" form-control" value="<?php echo $row['number']; ?>" required><br><br>
                    <label> <strong>Email: </strong></label><input name="email" type="email" class=" form-control" value="<?php echo $row['email']; ?>" readonly required><br><br>
                    </div>
                    <div class="col-6"><br>
                    <label> <strong>Address:  </strong></label><input name="address" class=" form-control" type="text" value="<?php echo ucfirst($row['address']); ?>" required><br><br>
                    <label> <strong>Branch: </strong></label><input name="branch" type="text" class=" form-control" value="<?php echo $row['branch']; ?>" readonly required><br><br>
                    <label> <strong>Password: </strong></label><input name="password" type="text" class=" form-control" value="<?php echo $row['password']; ?>" readonly required><br><br>
                    <input type="submit" value="Update/Save" name="update" class="btn btn-success">
                    
                </div> 
                </div>
            </div> 
            </form> 
            <?php } ?>
    </div>
        </div>
    </div>
    </div>
  
    </div>
    </div>


    <?php include('footer.php'); ?>