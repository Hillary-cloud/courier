<?php 
session_start();
include('headerTwo.php');
require_once 'vendor/autoload.php';?>
<?php
$con=mysqli_connect("localhost","root","","csms");
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$number = $_SESSION['number'];
$branch = $_SESSION['branch'];
$password = $_SESSION['password'];


if(isset($_GET['delete']))
  {
    $query=mysqli_query($con,"delete from courier where id = '".$_GET['id']."'");
    if($query)
    {
      echo "<script>alert('This courier has been removed');</script>";
    }
  }

  if (isset($_POST['send'])) {
    $id = $_POST['id'];
    $reciever_phone = $_POST['reciever_phone'];
    $shipper_phone = $_POST['shipper_phone'];
    $consignment_id = $_POST['consignment_id'];
    $tracking_number = $_POST['tracking_number'];
    $reciever_name = $_POST['reciever_name'];
    $shipper_name = $_POST['shipper_name'];
    $status = $_POST['status'];
    $msg = $_POST['message'];
    $query = mysqli_query($con,"update courier set status='In-transit' where id = '".$_POST['id']."'");
   
  $messagebird = new MessageBird\Client('bzG5AUTD9vYt1DbGkqZVgHk9Q');
  $message = new MessageBird\Objects\Message;
  $message->originator = '+2347033606960';
  $message->recipients = [ $reciever_phone ];
  $message->body = $msg;
  $response = $messagebird->messages->create($message);
  //var_dump($response); 
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
    <h3 class="text-center">List of Added Consignments</h3><br>
    <form action="add_consignment.php" method="post">
        <button class="btn btn-primary">Add Consignment</button>
    </form><br>

    <div class="table-responsive">
            <table id="courier_data" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>S/N</th>
                        <th class="d-none">id</th>
                        <th class="d-none">manager_name</th>
                        <th>Shipper Name</th>
                        <th class="d-none">Shipper Phone</th>
                        <th>Consignment_id</th>
                        <th>Reciever Name</th>
                        <th class="d-none">Reciever Phone</th>
                        <th class="d-none">Loading Branch</th>
                        <th>Destination Branch</th>
                        <th class="d-none">Vehicle Number</th>
                        <th class="d-none">Driver Name</th>
                        <th>Tracking Number</th>
                        <th>Added Date</th>
                        <th>Arrival Date</th>
                        <th>Claimed Date</th>
                        <th>Consignment Status</th>
                        <th>Consignment Status Update</th>
                        <th>Action</th>
                        <th>View</th>
                    </tr>
                </thead>
                <?php 
                        $con=mysqli_connect("localhost","root","","csms");
                        global $con;
                        $query = "select * from courier where name='$name' and from_city='$branch' order by id desc";
                        $result = mysqli_query($con,$query) or die(mysqli_error($con));
                        $i = 1;
                        while ($row = mysqli_fetch_array($result)){
                        ?>
                    <tr class="text-center">
                        <td><?php echo $i++; ?></td>
                        <td class="d-none"><?php echo $row['id']; ?></td>
                        <td class="d-none"><?php echo ucfirst($row['name']); ?></td>
                        <td><?php echo ucfirst($row['shipper_name']); ?></td>
                        <td class="d-none"><?php echo $row['shipper_phone']; ?></td>
                        <td><?php echo $row['consignment_id']; ?></td>
                        <td><?php echo ucfirst($row['reciever_name']); ?></td>
                        <td class="d-none"><?php echo $row['reciever_phone']; ?></td>
                        <td class="d-none"><?php echo ucfirst($row['from_city']); ?></td>
                        <td><?php echo $row['to_city']; ?></td>
                        <td class="d-none"><?php echo $row['vehicle_number']; ?></td>
                        <td class="d-none"><?php echo ucfirst($row['driver_name']); ?></td>
                        <td><?php echo $row['tracking_number']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['date_arrived']; ?></td>
                        <td><?php echo $row['date_claimed']; ?></td>
                        <td>
                        
                        <?php 
                            if ($row['status']=="Loaded") {?>
                                <p class="text-primary">Loaded</p>
                           <?php }elseif ($row['status']=="In-transit") {?>
                                <p class="text-warning">In-transit</p>
                           <?php }elseif ($row['status']=="Arrived") {?>
                                <p class="text-success">Arrived</p>
                           <?php }else {?>
                                <p class="text-success">Claimed</p>
                            <?php }
                        
                        ?>
                        
                        </td>
                        <td>
                            <?php
                                if ($row['status']=="In-transit") {?>
                                    <p class="text-warning">In-transit</p>
                               <?php }elseif ($row['status']=="Loaded") {?>
                               <form action="" method="POST">
                                <input class="d-none" type="text" name="id" value="<?php echo $row['id']?>">
                                <input class="d-none" type="text" name="status" value="<?php echo $row['status']?>">
                                <input class="d-none" type="text" name="reciever_name" value="<?php echo $row['reciever_name']?>">
                                <input class="d-none" type="text" name="shipper_name" value="<?php echo $row['shipper_name']?>">
                                <input class="d-none" type="text" name="reciever_phone" value="<?php echo $row['reciever_phone']?>">
                                <input class="d-none" type="text" name="shipper_phone" value="<?php echo $row['shipper_phone']?>">
                                <input class="d-none" type="text" name="tracking_number" value="<?php echo $row['tracking_number']?>">
                                <input class="d-none" type="text" name="consignment_id" value="<?php echo $row['consignment_id']?>">
                                <textarea class="d-none" name="message" id="" cols="30" rows="10"><?php echo "Kelvin Courier Service.\n\nThe consignment with identification number ".$row['consignment_id']. ", from ".$row['shipper_name']." to ".$row['reciever_name']." just left the loading branch and is now in transit. Use the tracking number ".$row['tracking_number']." to monitor your consignment on our website."?></textarea>
                                <button type="submit" name="send" class="btn-sm btn btn-warning" 
                                onClick="return confirm('Click In-transit button only when the consignment leaves the loading branch')">In-transit</button>
                               </form>
                                    <!--<a href="view_added_consignment.php?id=<?php// echo $row['id']?>&status=select"
                                    onClick="return confirm('Click In-transit button only when the consignment leaves the loading branch')">
                                    <button class=" btn-sm btn btn-warning">In-transit</button></a>-->
                               <?php }elseif ($row['status']=="Arrived") {?>
                                    <p class="text-success">Arrived</p>
                               <?php }else {?>
                                    <p class="text-success">Claimed</p>
                              <?php  }
                            ?>
                        </td>
                        <td>

                        <?php
                                if ($row['status']=="In-transit" || $row['status']=="Arrived" || $row['status']=="Claimed") {?>
                                    <p>--</p>
                               <?php }else {?>
                                <a href="edit_consignment.php?id=<?php echo $row['id']?>&edit=select"><button class="btn-sm btn btn-primary ">Edit</button></a>
                            <a href="view_added_consignment.php?id=<?php echo $row['id']?>&delete=update" 
                            onClick="return confirm('Are you sure you want to remove this consignment ?')"><button class=" btn-sm btn btn-danger">Delete</button></a>
                              <?php  }
                            ?>
                        </td>
                        <td><a href="view_consignment_details.php?id=<?php echo $row['id']?>&view=select"><button class="btn-sm btn btn-success">View</button></a></td>
                    </tr>
                    <?php }; ?>
            </table>
            <br>
        </div>
    
    </div>
    </div>
    </div>
    </div>


    <?php include('footer.php'); ?>
    <style>
thead input {
        width: 120%;
    }
</style>

<script>
 
    $(document).ready(function () {
        
    // Setup - add a text input to each footer cell
    
    $('#courier_data thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#courier_data thead');

    var table = $('#courier_data').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('keyup change', function (e) {
                            e.stopPropagation();
 
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
 
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
        dom: 'Bfrtip',
              buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
    });
});
</script>