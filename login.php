<?php
session_start();
include('headerOne.php');

$con=mysqli_connect("localhost","root","","csms");

?>
<div class="card bg-success">
    <div class="card-body text-lg-center">
        <h2 class="text-warning">Welcome to <span class="text-light">Kelvin Courier Service</span></h2>
            <p class="text-light">We are here to make sure that all your consignments are secured and delivered at the right place on time.</p>
        
    </div>
</div>
<div class="row">
    <div class="col-md-6" style="margin-top: 15%; margin-right: 3%; text-align: justify;">
            
            </div>

    <div class="col-md-5" style="margin-top: 5%; margin-right: 5%;">
                <div class="card" style="border-radius: 1.5rem;">
                    <div class="card-body">
 
                    <h4 class="text-center text-warning">Manager Login</h4><br>
                    <?php
                        if (isset($_POST['login'])) {
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                        
                            $query = "select * from manager where email='$email' and password='$password'";
                            $result = mysqli_query($con,$query) or die(mysqli_error($con));
                            if(mysqli_num_rows($result)==1)
                            {
                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                              $_SESSION['id'] = $row['id'];
                              $_SESSION['name'] = $row['name'];
                              $_SESSION['number'] = $row['number'];
                              $_SESSION['email'] = $row['email'];
                              $_SESSION['password'] = $row['password'];
                              $_SESSION['branch'] = $row['branch'];
                            }
                            ?>
                                <script>window.location.href = 'employee_dashboard.php';</script>
                           <?php  }
                          else {?>
                            <p class="text-danger">invalid username and password combination</p>
                          <?php }
                        }
                    ?>
                        <form action="" method="post">
                            <label class="text-light" for="">Email</label>
                            <input class="form-control" type="email" placeholder="Enter Email" name="email" required><br>
                            <label class="text-light" for="">Password</label>
                            <input class="form-control" type="password" placeholder="Enter Password" name="password" required><br><br>
                            <center><button class="btn btn-outline-warning btn-lg" name="login" type="submit">Login</button></center>
                        </form>
                    </div>
                </div>
            </div>
    </div><br><br>
<?php include('footer.php'); ?>