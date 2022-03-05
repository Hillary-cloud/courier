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


if (isset($_POST['add_consignment'])) {
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

    $query = "insert into courier (tracking_number,shipper_name,shipper_phone,shipper_address,reciever_name,reciever_phone,reciever_address,
    consignment_id,consignment_weight,from_city,to_city,vehicle_number,driver_name,name,number,status,date_arrived,date_claimed) values (FLOOR(10000000 + RAND() * 90000000),'$shipper_name',
    '$shipper_phone','$shipper_address','$reciever_name','$reciever_phone','$reciever_address','$consignment_id','$consignment_weight','$from_city',
    '$to_city','$vehicle_number','$driver_name','$name','$number','Loaded','--','--')";

    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    if ($result) {?>
        <script>window.location.href = 'view_added_consignment.php';</script>
    <?php }else {?>
        <p class="text-danger">Sorry, there was an error, courier could not be added.</p>
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
    <h3 class="text-center">Add Consignment Here</h3><br>
    <div class="card bg-light">
        <div class="card-body">
        <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <label for="">Manager's Name</label>
                <input type="text" name="name" value="<?php echo ucfirst($name); ?>" class="form-control" readonly required>
                <label for="">Shipper's Name</label>
                <input type="text" name="shipper_name" placeholder="Enter shipper's name" class="form-control" required>
                <label for="">Shipper's Phone</label>
                <input type="text" name="shipper_phone" placeholder="E.g. +2348044455566" class="form-control" required>
                <label for="">Shipper's Address</label>
                <input type="text" name="shipper_address" placeholder="Enter shipper's address" class="form-control" required>
                <label for="">Reciever's Name</label>
                <input type="text" name="reciever_name" placeholder="Enter reciever's name" class="form-control" required>
                <label for="">Reciever's Phone</label>
                <input type="text" name="reciever_phone" placeholder="E.g. +2348044455566" class="form-control" required>
                <label for="">Reciever's Address</label>
                <input type="text" name="reciever_address" placeholder="Enter reciever's address" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="">Manager's Phone</label>
                <input type="text" name="number" value="<?php echo $number ; ?>" class="form-control" readonly required>
                <label for="">Consignment Id</label>
                <input type="text" name="consignment_id" placeholder="Enter consignment id" class="form-control" required>
                <label for="">Consignment Weight</label>
                <input type="text" name="consignment_weight" placeholder="Enter consignment weight in Kilogram" class="form-control" required>
                <label for="">From:</label>
                <input type="text" name="from_city" value="<?php echo $branch; ?>" class="form-control" readonly required>
                <label for="">To:</label>
                    <select name="to_city" class="form-control" id="" required>
                        <option value="">Select Destination City</option>
                        <option value="Enugu">Enugu</option>
                        <option value="Lagos">Lagos</option>
                        <option value="Owerre">Owerre</option>
                        <option value="Aba">Aba</option>
                        <option value="Onitsha">Onitsha</option>
                    </select>
                <label for="">Vehicle Number</label>
                <input type="text" name="vehicle_number" placeholder="Enter vehicle number" class="form-control" required>
                <label for="">Driver's Name</label>
                <input type="text" name="driver_name" placeholder="Enter driver's name" class="form-control" required><br>
                <button class="btn btn-outline-warning btn-lg" name="add_consignment" type="submit">Add Consignment</button>
            </div>
        </div>
    </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>


    <?php include('footer.php'); ?>