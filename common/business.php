<?php include ("header.php"); ?>
<?php include ("sidebar.php"); ?>

<?php
if(!isset($_SESSION['login'])) {
    echo '<script>window.location="../index.php"</script>';
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Business</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Business</li>
                <li class="breadcrumb-item active">View Business</li>
            </ol>
            <div class="text-center">
                <?php
                    if(isset($_SESSION['msg1'])){
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
                    <!-- <h3><b>View Projects</b></h3> -->
                    <div class="table-responsive ">
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>S.No.</th>
                                    <th>User Details</th>
                                    <th>Image</th>                                    
                                    <th>Business</th>                                    
                                    <th>Future Plan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                    if($_SESSION['bu_type']=='1'){
                                        $execute = mysqli_query($b_connect, "SELECT * from business, sub_categories WHERE business.sc_id = sub_categories.sc_id "); 
                                    } else {
                                        $ent_id = $_SESSION['bu_id'];
                                        $execute = mysqli_query($b_connect, "SELECT * from business, sub_categories WHERE business.sc_id = sub_categories.sc_id AND business.u_id = '$ent_id'"); 
                                    }
                                    $count = '1';
                                    while($busin = mysqli_fetch_object($execute)) {
                                        $ent_id = $busin -> u_id;
                                        $user = mysqli_query($b_connect, "SELECT * from b_users WHERE bu_id='$ent_id'"); 
                                        $user_d = mysqli_fetch_object($user);
                                        ?>
                                        <tr>
                                            <td class="text-center"><?=$count?></td>
                                            <td>
                                                <?php
                                                echo "<b>Name:</b> ". $user_d->bu_name;
                                                echo "</br>";
                                                echo "<b>Email:</b> ". $user_d->bu_email;
                                                ?>
                                            </td>
                                            <td class="text-center"><img src="../images/business/<?=$busin->b_image?>" height="100px"></img></td>
                                            <td >
                                                NAME :<b><?=$busin->b_name?></b></br>
                                                CATEGORY : <b><?=$busin->sc_name?></b>
                                                DESCRIPTION :<small><?=$busin->b_desc;?></small>
                                            </td>
                                            <!-- <td><?=$busin->b_fund_amt?></td> -->
                                            <td><small><?=$busin->b_future_plan?></small></td>
                                            <td class="text-center">
                                                <a href="add_business.php?id=<?=$busin->b_id?>&action=edit" class='btn btn-info btn-sm'><b><i class="fa fa-edit">Edit</i></b></a>  
                                                <a href="?id=<?=$busin->b_id?>&action=delete" class='btn btn-danger btn-sm'><b><i class="fa fa-trash">Delete</i></b></a>
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

<?php include("footer.php"); ?>

<script>
$(document).ready(function () {
    $('#table').DataTable();
});
</script>

<?php
if(isset($_GET['id']) && $_GET['action']=='delete') {
    $id  = $_GET['id'];

    $query = "DELETE FROM `business` WHERE b_id='$id' ";
    $data = mysqli_query($b_connect,$query);
    if($data) {
        $_SESSION['msg1'] = 'Business deleted successfully!';
        // echo "<script>alert('Topic Deleted!')</script>"; 
        ?>
        <meta http-equiv = "refresh" content = "0; url=business.php" />
        <?php
    } else {
        $_SESSION['msg2'] = 'Sorry! Business not deleted';
        ?>
        <meta http-equiv = "refresh" content = "0; url=business.php" />
        <?php
    }
}
?>