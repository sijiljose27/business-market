<?php include ("../common/header.php"); ?>
<?php include ("../common/sidebar.php"); ?>
<?php
if(!isset($_SESSION['login'])) {
    echo '<script>window.location="../index.php"</script>';
}
?>


<?php
    $user_id =  $_SESSION['bu_id'];
    $query = mysqli_query($b_connect, "SELECT * FROM b_users WHERE bu_id = '$user_id' ");
    $profile = mysqli_fetch_object($query);
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
        <div class="col-md-8 mx-auto mt-4" >
            <?php
            if(isset($_GET['action'])) {
            ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <b><i>Edit Profile</i></b>
                            <!-- <a class="btn btn-primary float-right" href="add_venue.php">Add</a> -->
                        </h4>
                    </div>

                    <div class="card-body">

                        <form action="" method="post">

                            <fieldset class="border border-success p-3 form-group">
                                <legend class="d-inline w-auto h6"><b><i>Update Details</i></b></legend>

                                <div class="form-group mb-3">
                                    <label for="" style="font-weight:500">User Name</label>
                                    <input type="text" name="bu_name" required class="form-control"
                                        value="<?=$profile->bu_name?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" style="font-weight:500">User Email</label>
                                    <input type="text" name="bu_email" required class="form-control"
                                        value="<?=$profile->bu_email?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" style="font-weight:500">Contact Number</label>
                                    <input type="phone" name="bu_mobno" required class="form-control"
                                        value="<?=$profile->bu_mobno?>">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="" style="font-weight:500">Upadte Password</label>
                                    <input type="password" name="bu_pwd" required class="form-control"
                                        value="<?=$profile->bu_pwd?>">
                                </div>

                                <!-- <div class="form-group mb-2">
                                    <label for="" style="font-weight:500">Address</label>
                                    <input type="text" name="u_faddr" required class="form-control"
                                        value="<?=$profile->bu_addr?>">
                                </div> -->

                            </fieldset>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary update-btn mt-2" name="UpdateNow">
                                    <b>Upadte Your Details</b>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="overview-content-2"> 
                    <!-- Table section -->
                    <div class="card py-4" style="background:aliceblue;">
                        <div class="card-header d-flex bg-muted">
                            <h3 class="card-title">
                                <h3 class="text-dark mx-5"><b><i>My Profile </i></b></h3>
                            </h3>    
                            <a href="?id=<?=$profile->bu_id?>&action=edit" class="btn btn-dark ms-5 mt-2 mb-2">
                                <i class="fa fa-edit"> <b>Edit Profile</b></i>
                            </a>           
                        </div>

                        <div class="row border-bottom py-5 profile-box">
                            <div class="col-lg-4 m-auto text-center">
                                <div class="card-body py-1 ml-5">
                                    <img src="../images/profile.jpg" alt="Profile" style="width:100px;height:80px;border-radius:50px;">
                                    <h2><b><?=ucwords($profile->bu_name)?></b></h2>
                                    <p class="text-dark">
                                        <b class="text-success" style="margin-left:5px;font-size:16px;">Active</b>
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-8 m-auto text-center">
                                <div class="card-body py-3 ml-5">
                                
                                    <p class="text-dark">
                                        <b class="text-muted">Email Address:
                                        </b><b class="text-primary"><b><?=$profile->bu_email?></b>
                                    </p>
                                    <p class="text-dark">
                                        <b class="text-muted">Phone Number:
                                        </b><b class="text-primary"><b><?=$profile->bu_mobno?></b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>
</div>


<?php include("../common/footer.php"); ?>

<?php

if(isset($_POST['UpdateNow'])){

    $id = $_GET['id'];
    $emailid =  $_SESSION['bu_email'];
    $bu_name = $_POST['bu_name'];
    $bu_mobno = $_POST['bu_mobno'];
    $u_pwd = $_POST['au_pwd'];
    // $u_faddr = $_POST['u_faddr'];

    $execute = mysqli_query($b_connect, "UPDATE b_users SET bu_name='$bu_name', bu_pwd= '$bu_pwd' WHERE bu_id = '$id' AND bu_email='$emailid' ");
    
    if($execute) {
        $_SESSION['msg1'] = 'Profile Updated!';
        ?>
        <meta http-equiv="refresh" content="2; url=http:profile.php" />
        <?php
    } else {
        $_SESSION['msg2'] = 'Updation Failed! Try Again';
        ?>
        <meta http-equiv="refresh" content="2; url=http:profile.php" />
        <?php
    }
}

?>