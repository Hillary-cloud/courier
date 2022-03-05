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
<h3 class="text-center">List of Doctors</h3><br>
    <div class="jumbotron">
    <div class="card bg-light">
    <div class="card-body">
    <form action="add_manager.php" method="post">
        <button class="btn btn-primary">Add Manager</button>
    </form><br>
    <div class="container">
    <div class="table-responsive">
    <table id="manager_data"  class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>S/N</th>
		<th>Manager Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Address</th>
		<th>Branch</th>
        <th>Action</th>
	</tr>
    </thead>

    <?php 
       if (isset($_POST['delete'])) {
        $id = $_POST['id'];
               $query = "DELETE FROM manager WHERE id = '$id'";
               $result=mysqli_query($con,$query) or die(mysqli_error($con));
               if ($result) {?>
                   <h5 class="text-success">Manager was successfully removed.</h5>
               <?php }else {?>
                   <h5 class="text-danger"> Manager could not be removed.</h5>
               <?php }
           }
 
    $query="select * from manager";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
         $i = 1;
    while ($row=mysqli_fetch_assoc($result)) {?>
        
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['number'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['branch'];?></td>
            <td>
            <form action="edit_manager.php" method="post">
            <input name="id" class="d-none" value="<?php echo $row['id']?>" >
                <button class="btn btn-primary btn-sm" name="edit" type="submit">Edit</button>
            </form>

            <form action="" method="post">
            <input name="id" class="d-none" value="<?php echo $row['id']?>" >
                <button class="btn btn-danger btn-sm" name="delete" onclick= "return confirm('Are you sure you want to delete this manager?')" type="submit">Delete</button>
            </form>
            </td>
        </tr>

    <?php } ?>

    </table>
    </div>

            </div>
    
    
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>

    <?php include("footer.php");?>

    <style>
thead input {
        width: 120%;
    }
</style>
<script>
 
    $(document).ready(function () {
        
    // Setup - add a text input to each footer cell
    
    $('#manager_data thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#manager_data thead');

    var table = $('#manager_data').DataTable({
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