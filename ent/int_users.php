<?php include ("../common/header.php"); ?>
<?php include ("../common/sidebar.php"); ?>

<?php
if(!isset($_SESSION['login'])) {
    echo '<script>window.location="index.php"</script>';
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Interested Businesses</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Business</li>
                <li class="breadcrumb-item active">View Interested Businesses</li>
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
                                    <th>Investor Details</th>
                                    <!-- <th>Image</th> -->
                                    <th>Business Name</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    $u_id = $_SESSION['bu_id'];
                                    $execute = mysqli_query($b_connect, "SELECT * from business, interested_users,b_users  WHERE b_users.bu_id = interested_users.inv_u_id AND business.b_id = interested_users.b_id AND business.u_id= '$u_id'"); 
                                    
                                    $count = '1';
                                    while($busin = mysqli_fetch_object($execute)) {
                                        // echo "<pre>";
                                        // print_r($busin);
                                        ?>
                                        <tr>
                                            <td class="text-center"><?=$count?></td>
                                            <td>
                                                <small>
                                                Name : <b><?=$busin->bu_name?></b></br>
                                                Email : <b><?=$busin->bu_email?></b></br>
                                                Mob No.: <b><?=$busin->bu_mobno?></b>
                                                </small>
                                            </td>
                                            <!-- <td><img src="../images/business/<?=$busin->b_image?>" height="100px"></img></td> -->
                                            <td class="text-center">
                                                <b><?=$busin->b_name?></b>
                                                <a target="_blank" class="btn btn-sm btn-info" href="../business_desc.php?id=<?=$busin->b_id?>">Details</a>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                    if($busin->	iu_confirmation == '' || $busin->iu_confirmation == '2') {
                                                    ?>
                                                        <a href="?id=<?=$busin->iu_id?>&action=1">
                                                            <button class=" btn btn-info btn-sm"><b>Approve Investor</b></button>
                                                        </a>
                                                    <?php
                                                    } else {
                                                        ?>
                                                        <a href="?id=<?=$busin->iu_id?>&action=2">
                                                            <button class="btn btn-danger btn-sm"><b>Reject  Investor</b></button>
                                                        </a>
                                                        <?php
                                                    } 
                                                ?>    
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
    $('#table').DataTable();
});
</script>

<?php

if(isset($_GET['action']) && ($_GET['action']=='1' || $_GET['action']=='2')) {
    $action = $_GET['action'];
    // interested user table auto incremented id not user id
    $iu_id     = $_GET['id']; 

    if($action == '1') {
        $status = '1';
    } else {
        $status = '2';   
    }
    $change = mysqli_query($b_connect, "UPDATE interested_users SET iu_confirmation = '$status' WHERE iu_id = '$iu_id' ");

    if($action == '1') {
        $_SESSION['msg1'] = 'Status Confirmed';
    } else {
        $_SESSION['msg2'] = 'Status Rejected';
    }
    
    ?>
    <meta http-equiv="refresh" content="1; url=int_users.php" />
<?php
} else {
   echo "Sorry! Some Error Occur";
}

?>