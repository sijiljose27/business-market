
<?php include ("header.php"); ?>
<?php include ("sidebar.php"); ?>

<?php
// if(!isset($_SESSION['login'])) {
//     echo '<script>window.location="../index.php"</script>';
// }

$q1 = mysqli_query($b_connect, "SELECT count(bu_id) as u_count FROM b_users WHERE `bu_type` != '1' ");
$count1 = mysqli_fetch_object($q1);
$q2 = mysqli_query($b_connect, "SELECT count(c_id) as c_count FROM categories");
$count2 = mysqli_fetch_object($q2);
$q3 = mysqli_query($b_connect, "SELECT count(b_id) as p_count FROM business");
$count3 = mysqli_fetch_object($q3);
$q4 = mysqli_query($b_connect, "SELECT count(bu_id) as investor_count FROM b_users WHERE `bu_type` = '3' ");
$count4 = mysqli_fetch_object($q4);
// $Count1 = mysqli_num_rows($Q1);
?>
<div id="layoutSidenav_content">
    
    <main>
        <div class="text-center">
            <?php
                if(isset($_SESSION['msg1']))
                {
                ?>
                <div class="col-12 mb-3 alert alert-success" role="alert">
                    <small class="text-success" style="font-size:20px"><?=$_SESSION['msg1']?></small>
                </div>
                <?php
                    unset($_SESSION['msg1']);
                }
                else if(isset($_SESSION['msg2']))
                {
                ?>
                <div class="col-12 mb-3 alert alert-danger" role="alert">
                    <small class="text-danger" style="font-size:20px"><?=$_SESSION['msg2']?></small>
                </div>
                <?php
                    unset($_SESSION['msg2']);
                }
            ?>
        </div>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">dashboard</li>
            </ol>
            
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Registered Users</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <p><?=$count1->u_count?></p>
                            <!-- <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total Categories</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <p><?=$count2->c_count?></p>
                            <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                            <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Business Ideas</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <p><?=$count3->p_count?></p>
                            <!-- <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total Investor</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <p><?=$count4->investor_count?></p>
                            <!-- <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include("footer.php"); ?>

