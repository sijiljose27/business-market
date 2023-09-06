<?php include ("../common/header.php"); ?>
<?php include ("../common/sidebar.php"); ?>

<?php
// if(!isset($_SESSION['login'])) {
//     echo '<script>window.location="index.php"</script>';
// }
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
                                    <th>Image</th>
                                    <th>Business</th>
                                    <!-- <th>Fund Amount</th> -->
                                    <th>Future Plan</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    
                                    $u_id = $_SESSION['bu_id'];
                                    $execute = mysqli_query($b_connect, "SELECT * from business, interested_users  WHERE business.b_id = interested_users.b_id AND interested_users.inv_u_id = '$u_id' AND interested_users.iu_status='1'"); 
                                    
                                    $count = '1';
                                    while($busin = mysqli_fetch_object($execute)) {
                                        ?>
                                        <tr>
                                            <td><?=$count?></td>
                                            <td><img src="../images/business/<?=$busin->b_image?>" height="100px"></img></td>
                                            <td >
                                                <b><?=$busin->b_name?></b></br>
                                                <a target="_blank" class="btn btn-sm btn-info" href="../business_desc.php?id=<?=$busin->b_id?>">Details</a>
                                            </td>
                                            <!-- <td><?=$busin->b_fund_amt?></td> -->
                                            <td>
                                                <?php 
                                                if($busin->iu_confirmation=='1') {
                                                    ?>
                                                    <small><?=$busin->b_future_plan?></small>
                                                    <?php
                                                } else if($busin->iu_confirmation=='2'){
                                                    echo "<span class='text-danger'>Enterpreneuer Not Confirmed your proposal.</span>";
                                                } else {
                                                    echo "<span class='text-info'>Waiting for confirmation from enterpreneuer!!</span>";
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