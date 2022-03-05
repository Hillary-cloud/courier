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
    <h3 class="text-center">Consignment Details</h3><hr>
    <?php 

        $con=mysqli_connect("localhost","root","","csms");
        global $con;
        if(isset($_GET['view']))
        {
        $query=mysqli_query($con,"select * from courier where id = '".$_GET['id']."'");
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