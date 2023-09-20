<?php include ("../common/header.php"); ?>
<?php include ("../common/sidebar.php"); ?>

<?php
if(!isset($_SESSION['login'])) {
    echo '<script>window.location="../index.php"</script>';
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">View Users</li>
            </ol>
            <div class="text-center">
                <?php
                    if(isset($_SESSION['msg1'])) {
                    ?>
                        <div class="col-12 mb-3 alert alert-success" role="alert">
                            <small class="text-success" style="font-size:20px"><?=$_SESSION['msg1']?></small>
                        </div>
                        <?php
                        unset($_SESSION['msg1']);
                    } else if(isset($_SESSION['msg2'])) {
                        ?>
                        <div class="col-12 mb-3 alert alert-danger" role="alert">
                            <small class="text-danger" style="font-size:20px"><?=$_SESSION['msg2']?></small>
                        </div>
                        <?php
                        unset($_SESSION['msg2']);
                    }
                ?>
            </div>
            <div class="container row"> 
                <div class="col-md-12">
                    <div class="table-responsive ">
                        <table id="users" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Type</th>
                                    <!-- <th>Status</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    $execute = mysqli_query($b_connect, "SELECT * from b_users WHERE bu_type!='1'"); 
                                    $count = '1';
                                    while($user = mysqli_fetch_object($execute)) {
                                        ?>
                                        <tr>
                                            <td><?=$count?></td>
                                            <td><?=$user->bu_name?></td>                                            
                                            <td><?=$user->bu_email?></td>
                                            <td><?=$user->bu_mobno?></td>
                                            <td>
                                                <?php
                                                    echo ($user->bu_type=="2") ? "Enterpreneur" : "Investor";
                                                ?>
                                            </td>
                                            <!-- <td><?=$user->bu_status?></td> -->
                                            <td>
                                                <!-- <a href="?id=<?=$user->bu_id?>&action=edit" class='btn btn-info btn-sm'><b><i class="fa fa-edit">Edit</i></b></a>   -->
                                                <a href="?id=<?=$user->bu_id?>&action=delete" class='btn btn-danger btn-sm' onclick="return confirm('Are you sure you want to delete this item?');"><b><i class="fa fa-trash">Delete</i></b></a>
                                            </td>
                                        </tr>
                                        <?php   
                                        $count++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                            
            </div>
        </div>
    </main>
</div>

<?php include("../common/footer.php"); ?>

<script>
$(document).ready(function () {
    $('#users').DataTable();
});
</script>

<?php
if(isset($_GET['action'])=='delete') {
    $id  = $_GET['id'];
    $query = "DELETE FROM `b_users` WHERE bu_id='$id' ";
    $data = mysqli_query($b_connect,$query);
    if($data) {
        $_SESSION['msg1'] = 'Users deleted successfully!';
        // echo "<script>alert('Topic Deleted!')</script>"; 
        ?>
        <meta http-equiv = "refresh" content = "0; url=users.php" />
        <?php
    } else {
        $_SESSION['msg2'] = 'Sorry! Users not deleted';
        ?>
        <meta http-equiv = "refresh" content = "0; url=users.php" />
        <?php
    }
}
?>
