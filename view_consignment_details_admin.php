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
<h3 class="text-center">Consignment Details</h3><hr>
<?php 

    $con=mysqli_connect("localhost","root","","csms");
    global $con;
    if(isset($_POST['submit']))
    {
    $query=mysqli_query($con,"select * from courier where id = '".$_POST['id']."'");
    while ($row = mysqli_fetch_array($query)) {
?>

<div class="jumbotron">

<div class="row">
<div style="margin-top: 3%; margin-left: 20%;" class="col-8">
<div class="card bg-secondary text-light">
    <div class="card-body">
    <h3 class="text-center text-warning"><strong>Kelvin Courier Service</strong></h1><hr>
    <h4 class="text-center"><strong>Manager's Details</strong></h4>
    <div class="row ">
    <div class="col-8">
        <h6>Manager Name:</h6>
        <h6>Manager Number:</h6>
    </div>
    <div class="col-4">
    <h6 class="d-none"><?php echo $row['id']; ?>
    <h6><?php echo $row['name']; ?></h6>
    <h6><?php echo $row['number']; ?></h6>
    </div>
    </div><hr>
    <h4 class="text-center"><strong>Shipper/Reciever/Consignment's Details</strong></h4>
    <div class="row">
    <div class="col-8">
    <h6>Shipper Name:</h6>
    <h6>Shipper Phone:</h6>
    <h6>Shipper Address:</h6>
    <h6>Tracking Number:</h6>
    <h6>Reciever Name:</h6>
    <h6>Reciever Phone:</h6>
    <h6>Reciever Address:</h6>
    <h6>Consignment id:</h6>
    <h6>Consignment weight:</h6>
    <h6>Loading Branch:</h6>
    <h6>Destination Branch:</h6>
    <h6>Consignment Status:</h6>
    <h6>Added Date and Time:</h6>
    <h6>Arrived Date and Time:</h6>
    <h6>Claimed Date and Time:</h6>
</div>

 <div class="col-4">
<h6><?php echo $row['shipper_name']; ?></h6>
<h6><?php echo $row['shipper_phone']; ?></h6>
<h6><?php echo $row['shipper_address']; ?></h6>
<h6><?php echo $row['tracking_number']; ?></h6>
<h6><?php echo $row['reciever_name']; ?></h6>
<h6><?php echo $row['reciever_phone']; ?></h6>
<h6><?php echo $row['reciever_address']; ?></h6>
<h6><?php echo $row['consignment_id']; ?></h6>
<h6><?php echo $row['consignment_weight']; ?></h6>
<h6><?php echo $row['from_city']; ?></h6>
<h6><?php echo $row['to_city']; ?></h6>
<h6><?php echo $row['status']; ?></h6>
<h6><?php echo $row['time']; ?></h6>
<h6><?php echo $row['date_arrived']; ?></h6>
<h6><?php echo $row['date_claimed']; ?></h6>


 </div><hr>
</div>
<h4 class="text-center"><strong>Driver's Details</strong></h4>
<div class="row ">
<div class="col-8">
    <h6>Driver's Name:</h6>
    <h6>Vehicle Number:</h6>
 </div>

 <div class="col-4">
<h6><?php echo ucfirst($row['driver_name']); ?></h6>
<h6><?php echo $row['vehicle_number']; ?></h6>
 </div>
</div><hr>
</div>

</div><br>


</div>
</div>
</div>
</div>

<?php }
  
}else {
  echo "could not view consignment";
}
    
        ?>
<?php include('footer.php'); ?>