<?php 
session_start();
include('headerTwo.php');?>
<?php
$con=mysqli_connect("localhost","root","","csms");
 $username = $_SESSION['username'];
 $password = $_SESSION['password'];
?>
<div class="container-fluid">
    <div class="row">
    <div class="col-3 text-light bg-dark text-center" style="min-height: 600px;"><hr class="bg-primary">
    <h2 class="text-warning">Admin's Dashboard</h2><br><hr>
        
    <!--<img class="img-fluid img-thumbnail mx-auto d-block" alt="Responsive image" src="<?php?>" style="height: 150px; width: 150px;"><br><br><br>-->
        <tr class="text-center">
        <a href="add_manager.php"><button class="fun btn btn-light w-100"><h5>Add Manager</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="add_branch.php"><button class="fun btn btn-light w-100"><h5>Add Branch</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="manager_list.php"><button class="fun btn btn-light w-100"><h5>Managers</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="branch_list.php"><button class="fun btn btn-light w-100"><h5>Branches</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="view_courier.php"><button class="fun btn btn-light w-100"><h5>View all Courier</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="logout_admin.php"><button class="fun btn btn-light w-100"><h5>Sign out </h5></button></a>
        </tr><hr class="bg-light">

    </div>
    <div class="col-9"><br>
    <div class="jumbotron">
    <h3 class="text-center">Add/Manage Branch</h3><hr>
    <div class="row">
        <div style="margin-top: 3%; margin-left: 20%;" class="col-8">
        <div class="card bg-light">
            <div class="card-body">
            <?php
                if (isset($_POST['add'])) {
                    $city_name = $_POST['city_name'];
                    $address = $_POST['address'];
               
                    $query = "insert into branch (city_name,address) values ('$city_name','$address')";
                    $result = mysqli_query($con,$query) or die(mysqli_error($con));
                    if ($result) {?>
                        <p class="text-success">Branch added successfully.</p>
                   <?php }else {?>
                       <p class="text-danger">sorry, there was a problem adding Branch</p>
                  <?php }
                }
            ?>

            <form action="" method="post">
            <input type="text" class="form-control" name="city_name" placeholder="City Name" id="" required><br>
            <input type="text" class="form-control" name="address" placeholder="Branch address" id="" required><br>
            <button class="btn btn-primary" type="submit" name="add">Add Branch</button>
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