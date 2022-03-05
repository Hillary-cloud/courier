<?php 
session_start();
include('headerTwo.php');?>
<?php 
$con=mysqli_connect("localhost","root","","csms");
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$number = $_SESSION['number'];
$password = $_SESSION['password'];
$branch = $_SESSION['branch'];


if (isset($_POST['save_consignment'])) {
    $tracking_number = $_POST['tracking_number'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $shipper_name = $_POST['shipper_name'];
    $shipper_phone = $_POST['shipper_phone'];
    $shipper_address = $_POST['shipper_address'];
    $reciever_name = $_POST['reciever_name'];
    $reciever_phone = $_POST['reciever_phone'];
    $reciever_address = $_POST['reciever_address'];
    $consignment_id = $_POST['consignment_id'];
    $consignment_weight = $_POST['consignment_weight'];
    $from_city = $_POST['from_city'];
    $to_city = $_POST['to_city'];
    $vehicle_number = $_POST['vehicle_number'];
    $driver_name = $_POST['driver_name'];

    $query = "update courier set tracking_number='$tracking_number', shipper_name='$shipper_name', shipper_phone='$shipper_phone',
    shipper_address='$shipper_address', reciever_name='$reciever_name', reciever_phone='$reciever_phone', reciever_address='$reciever_address',
    consignment_id='$consignment_id', consignment_weight='$consignment_weight', from_city='$from_city', to_city='$to_city', vehicle_number='$vehicle_number',
    driver_name='$driver_name', name='$name', number='$number' where id = '".$_GET['id']."'";

    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    if ($result) {?>
        <p class="text-success">Courier updated successfully.</p>
    <?php }else {?>
        <p class="text-danger">Sorry, there was an error, courier could not be updated.</p>
    <?php }

}

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
    <h3 class="text-center">Edit Consignment Here</h3><br>
    <a href="view_added_consignment.php"> Go Back</a>
    <div class="card bg-light">
        <div class="card-body">
        <form action="" method="post">
        <div class="row">
        <?php
                global $con;
                if(isset($_GET['edit']))
                {
                $query=mysqli_query($con,"select * from courier where id = '".$_GET['id']."'");
                while ($row = mysqli_fetch_array($query)) {

          ?>  

            <div class="col-md-6">
                <label for="">Manager's Name</label>
                <input type="text" name="name" value="<?php echo $row['id']; ?>" class="form-control d-none" readonly required>
                <input type="text" name="name" value="<?php echo ucfirst($row['name']); ?>" class="form-control" readonly required>
                <label for="">Shipper's Name</label>
                <input type="text" name="shipper_name" value="<?php echo ucfirst($row['shipper_name']) ; ?>" class="form-control" required>
                <label for="">Shipper's Phone</label>
                <input type="text" name="shipper_phone" value="<?php echo $row['shipper_phone']; ?>" class="form-control" required>
                <label for="">Shipper's Address</label>
                <input type="text" name="shipper_address" value="<?php echo $row['shipper_address'] ; ?>" class="form-control" required>
                <label for="">Reciever's Name</label>
                <input type="text" name="reciever_name" value="<?php echo ucfirst($row['reciever_name']) ; ?>" class="form-control" required>
                <label for="">Reciever's Phone</label>
                <input type="text" name="reciever_phone" value="<?php echo $row['reciever_phone'] ; ?>" class="form-control" required>
                <label for="">Reciever's Address</label>
                <input type="text" name="reciever_address" value="<?php echo $row['reciever_address']; ?>" class="form-control" required>
                <label for="">Tracking Number</label>
                <input type="text" name="tracking_number" value="<?php echo $row['tracking_number']; ?>" class="form-control" readonly required>
            </div>
            <div class="col-md-6">
                <label for="">Manager's Phone</label>
                <input type="text" name="number" value="<?php echo $row['number']; ?>" class="form-control" readonly required>
                <label for="">Consignment Id</label>
                <input type="text" name="consignment_id" value="<?php echo $row['consignment_id']; ?>" class="form-control" required>
                <label for="">Consignment Weight</label>
                <input type="text" name="consignment_weight" value="<?php echo $row['consignment_weight']; ?>" class="form-control" required>
                <label for="">From:</label>
                <input type="text" name="from_city" value="<?php echo $row['from_city']; ?>" class="form-control" readonly required>
                <label for="">To:</label>
                    <select name="to_city" class="form-control" value="<?php echo $row['to_city'] ; ?>" id="" required>
                        <option value=""><?php echo $row['to_city'] ; ?></option>
                        <option value="Enugu">Enugu</option>
                        <option value="Lagos">Lagos</option>
                        <option value="Owerre">Owerre</option>
                        <option value="Aba">Aba</option>
                        <option value="Onitsha">Onitsha</option>
                    </select>
                <label for="">Vehicle Number</label>
                <input type="text" name="vehicle_number" value="<?php echo $row['vehicle_number'] ; ?>" class="form-control" required>
                <label for="">Driver's Name</label>
                <input type="text" name="driver_name" value="<?php echo $row['driver_name']; ?>" class="form-control" required><br>
                <button class="btn btn-outline-warning btn-lg" name="save_consignment" type="submit">Save</button>
            </div>
        </div>
    </form>
    <?php } };?>
        </div><br>
    </div><br>
    </div>
    </div>
    </div>
    </div>
    


    <?php include('footer.php'); ?>