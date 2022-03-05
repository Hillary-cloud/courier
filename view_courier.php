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
    <h3 class="text-center">List of Couriers</h3><br>
    <div class="table-responsive">
            <table id="courier_data" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>S/N</th>
                        <th class="d-none">id</th>
                        <th>Shipper Name</th>
                        <th>Reciever Name</th>
                        <th>Loading Branch</th>
                        <th>Destination Branch</th>
                        <th>Consignment Status</th>
                        <th>View</th>
                    </tr>
                </thead>
                <?php 
                        $con=mysqli_connect("localhost","root","","csms");
                        global $con;
                        $query = "select * from courier order by id desc";
                        $result = mysqli_query($con,$query) or die(mysqli_error($con));
                        $i = 1;
                        while ($row = mysqli_fetch_array($result)){
                        ?>
                    <tr class="text-center">
                        <td><?php echo $i++; ?></td>
                        <td class="d-none"><?php echo $row['id']; ?></td>
                        <td><?php echo ucfirst($row['shipper_name']); ?></td>
                        <td><?php echo ucfirst($row['reciever_name']); ?></td>
                        <td><?php echo ucfirst($row['from_city']); ?></td>
                        <td class=""><?php echo ucfirst($row['to_city']); ?></td>
                        <td class="text-primary"><em><?php echo $row['status']; ?></em></td>
                      
                        <td>
                        <form action="view_consignment_details_admin.php" method="post">
                        <?php
                            if (isset($_POST['submit'])) {
                                $id = $_POST['id'];
                                $id = $_SESSION['id'];
                                $query = "select * from courier where id = '".$_POST['id']."'";
                                $result = mysqli_query($con,$query) or die(mysqli_error($con));
                            }
                               
                        ?>
                            <input type="text" class="d-none" value="<?php echo $row['id']?>" name="id">
                            <button class="btn-sm btn btn-success" name="submit">View</button>
                        </form>
                        </td>
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