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
    <h3 class="text-center">Update Manager</h3><br>

    <form class="form-group" method="post" action="">
                <div class="row">
                <?php
                    if (isset($_POST['updateManager'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $id = $_POST['id'];
                        $address = $_POST['address'];
                        $branch = $_POST['branch'];
                        $query = "update manager set name='$name', email='$email', address='$address', branch='$branch' where id = '".$_POST['id']."'";
                        $result = mysqli_query($con,$query) or die(mysqli_error($con));
                        if ($result) {?>
                            <h4 class="text-success">Manager's details updated successfully.</h4>
                    <?php }else {?>
                            <h4 class="text-danger">Manager's details could not be updated.</h4>
                    <?php }
                    }

                $con=mysqli_connect("localhost","root","","csms");
              global $con;
              if(isset($_POST['edit']))
    {
      $query=mysqli_query($con,"select * from manager where id = '".$_POST['id']."'");
      while ($row = mysqli_fetch_array($query)) {

          ?>   
              <input type="text" class="d-none" name="id" value="<?php echo $row['id']?>">
                <div class="col-md-4"><label>Manager Name:</label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo ucfirst($row['name']); ?>" class="form-control" name="name" required></div><br><br>

                  <div class="col-md-4"><label>Email: </label></div>
                  <div class="col-md-6"><input type="email" value="<?php echo $row['email']; ?>" class="form-control" name="email" required readonly></div><br><br>


                <div class="col-md-4"><label>Branch:</label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo ucfirst($row['branch']); ?>" class="form-control" name="branch" required></div><br><br>

                  <div class="col-md-4"><label>Address: </label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo ucfirst($row['address']); ?>" class="form-control" name="address" required></div><br><br>

                  <div class="col-md-4"><label></label></div>
                  <div class="col-md-6">
                    <input type="submit" name="updateManager" value="Click to Update" class="btn btn-primary" id="inputbtn">
                    <a href="manager_list.php">Click to go back</a>
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