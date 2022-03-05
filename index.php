<?php session_start();
include('headerOne.php'); ?>

<div class="card bg-success">
    <div class="card-body text-lg-center">
        <h2 class="text-warning">Welcome to <span class="text-light">Kelvin Courier Service</span></h2>
            <p class="text-light">We are here to make sure that all your consignment are secured and delivered at the right place on time.</p>
            <form action="login.php" method="post">
                <button class="btn btn-lg btn-outline-light" type="submit">Login as Employee</button>
            </form>  
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="margin-top: 15%; margin-right: 3%; text-align: justify;">
            
            </div>

    <div class="col-md-5" style="margin-top: 5%; margin-right: 5%;">
                <div class="card" style="border-radius: 1.5rem;">
                    <div class="card-body">

                    <?php
                        $con=mysqli_connect("localhost","root","","csms");
                        //$tracking_number = $_SESSION['tracking_number'];
                        if (isset($_POST['track'])) {
                            $tracking_number = $_POST['tracking_number'];
                            $query = "select * from courier where tracking_number='$tracking_number'";
                            $result = mysqli_query($con,$query) or die(mysqli_error($con));
                            if (mysqli_num_rows($result)==1) {
                                
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                                    <div class="card bg-light text-dark">
                                        <div class="card-body">
                                        <h4>Consignment Details</h4><hr>
                                            <p class="text-primary">Shipper's Name: <?php echo ucfirst($row['shipper_name']);?></p>
                                            <p class="text-primary">Reciever's Name: <?php echo ucfirst($row['reciever_name']);?></p>
                                            <p class="text-primary">Tracking Number: <?php echo $row['tracking_number'];?></p>
                                            <p class="text-primary">From <?php echo $row['from_city'];?> To <?php echo $row['to_city'];?> </p>
                                            <p class="text-primary">Consignment Id: <?php echo $row['consignment_id'];?></p>
                                            <p class="text-primary">Consignment status: <em><?php echo $row['status'];?></em></p>
                                        </div>
                                    </div>
                               <?php }
                                 }else {?>
                                <p class="text-danger bg-light">Sorry,Your consignment could not be tracked.</p>
                           <?php }
                        }
                    ?>
                        <h2 class="text-center text-warning">Track Your Consignment</h2><hr class="text-light">
                        <p class="text-light">We have provided tracking number for all consignment. We therefore advice our customers to monitor their consignment.
                        To monitor your consignment, enter the tracking number of the consignment in the form below.</p>
                        <form action="" method="post">
                            <input class="form-control" type="text" placeholder="Enter Your Tracking Number" name="tracking_number" required><br>
                            <center><input class="btn btn-lg btn-outline-warning" name="track" type="submit" value="Track"></center>
                        </form>
                    </div>
                </div>
            </div>
    </div><br><br>
<?php include('footer.php'); ?>