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
    <div class="card bg-light">
    <div class="card-body">
    <h3 class="text-center">Update Branch</h3><br>

    <form class="form-group" method="post" action="">
                <div class="row">
                <?php
                    if (isset($_POST['updateBranch'])) {
                        $city_name = $_POST['city_name'];
                        $id = $_POST['id'];
                        $address = $_POST['address'];
                        $query = "update branch set city_name='$city_name', address='$address' where id = '".$_POST['id']."'";
                        $result = mysqli_query($con,$query) or die(mysqli_error($con));
                        if ($result) {?>
                            <h4 class="text-success">Branch's details updated successfully.</h4>
                    <?php }else {?>
                            <h4 class="text-danger">Branch's details could not be updated.</h4>
                    <?php }
                    }

                $con=mysqli_connect("localhost","root","","csms");
              global $con;
              if(isset($_POST['edit']))
    {
      $query=mysqli_query($con,"select * from branch where id = '".$_POST['id']."'");
      while ($row = mysqli_fetch_array($query)) {

          ?>   
              <input type="text" class="d-none" name="id" value="<?php echo $row['id']?>">
                <div class="col-md-4"><label>Manager Name:</label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo ucfirst($row['city_name']); ?>" class="form-control" name="city_name" required></div><br><br>

                  <div class="col-md-4"><label>Address: </label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo ucfirst($row['address']); ?>" class="form-control" name="address" required></div><br><br>

                  <div class="col-md-4"><label></label></div>
                  <div class="col-md-6">
                    <input type="submit" name="updateBranch" value="Click to Update" class="btn btn-primary" id="inputbtn">
                    <a href="branch_list.php">Click to go back</a>
                  </div>                  
                </div>
              </form>
              <?php }} ?>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <?php include("footer.php");?>