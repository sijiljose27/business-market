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
            <h1 class="mt-4">Business</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Business</li>
                <li class="breadcrumb-item active">View & Add Business</li>
            </ol>
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
            <div class="container row"> 
                <?php
                if(isset($_GET['action']) && $_GET['action'] = 'edit') {
                    $id  = $_GET['id'];
                    $execute = mysqli_query($b_connect, "SELECT * from business WHERE b_id='$id'"); 
                    $busi = mysqli_fetch_object($execute)
                ?>
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <b><i>Edit Business</i></b>
                                <a class="btn btn-primary float-right" href="categories.php">Add</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="p_name">Business Name</label>
                                        <input type="text" name="b_name" class="form-control" value="<?=$busi->b_name?>" required>
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label for="" class="control-label">Category</label>
                                        <select class="custom-select select2" name="sc_id" value="<?=$busi->sc_id?>">
                                            <!-- <option value=""></option> -->
                                            <?php
                                            $qry = $b_connect->query("SELECT * FROM sub_categories order by sc_id asc");
                                            while($row=$qry->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $row['sc_id'] ?>" <?php echo isset($busi->sc_id) && $busi->sc_id == $row['sc_id'] ? 'selected' : '' ?>><?php echo $row['sc_name'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <?php
                                        if($_SESSION['bu_type'] =='1' ) {
                                        ?>
                                        <div class="col-md-6">
                                            <label for="" class="control-label">Enterpreneuer</label>
                                            <select class="custom-select select2" name="ent_id" required>
                                                <option value=""></option>
                                                <?php
                                                $qry = $b_connect->query("SELECT * FROM b_users WHERE bu_type ='2'");
                                                while($row=$qry->fetch_assoc()):
                                                ?>
                                                    <option value="<?php echo $row['bu_id'] ?>" <?php echo isset($busi->u_id) && $busi->u_id == $row['bu_id'] ? 'selected' : '' ?>><?php echo $row['bu_name'];?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <label for="" class="control-label">Business Image</label>
                                        <input type="file" class="form-control" name="b_image" value="<?=$busi->b_image?>">
                                    </div>
                                    
                                </div>
                               
                                <div class="form-group">
                                    <label for="b_desc"> Description</label>
                                    <textarea name="b_desc" id="b_desc" class="form-control" cols="30" rows="5" required><?=$busi->b_desc?></textarea>
                                </div> 
                                <div class="form-group">
                                    <label for="p_desc"> Future Plan</label>
                                    <textarea name="b_future_plan" id="b_future_plan" class="form-control" cols="30" rows="5" required><?=$busi->b_future_plan?></textarea>
                                </div>                                
                                <input type="submit" class="btn btn-primary float-left" name="UpdateBusi" value="Update">
                            
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                } else {
                ?>

                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <b><i>Add Business</i></b>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="p_name">Business Name</label>
                                        <input type="text" name="b_name" class="form-control" Placeholder="Name" required>
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label for="" class="control-label">Sub Category</label>
                                        <select class="custom-select select2" name="sc_id" required>
                                            <!-- <option value="">Choose</option> -->
                                            <?php
                                            $qry = $b_connect->query("SELECT * FROM sub_categories order by sc_id asc");
                                            while($row=$qry->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $row['sc_id'] ?>" <?php echo isset($sc_id) && $sc_id == $row['sc_id'] ? 'selected' : '' ?>><?php echo $row['sc_name'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <?php
                                    if($_SESSION['bu_type'] =='1' ) {
                                    ?>
                                        <div class="col-md-6">
                                            <label for="" class="control-label">Enterpreneuer</label>
                                            <select class="custom-select select2" name="ent_id" required>
                                                <option value=""></option>
                                                <?php
                                                $qry = $b_connect->query("SELECT * FROM b_users WHERE bu_type ='2'");
                                                while($row=$qry->fetch_assoc()):
                                                ?>
                                                    <option value="<?php echo $row['bu_id'] ?>" <?php echo isset($bu_id) && $bu_id == $row['bu_id'] ? 'selected' : '' ?>><?php echo $row['bu_name'];?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <label for="" class="control-label">Business Image</label>
                                        <input type="file" class="form-control" name="b_image" required>
                                    </div>                                    
                                </div>
                                <div class="form-group">
                                    <label for="b_desc"> Description</label>
                                    <textarea name="b_desc" id="b_desc" class="form-control" cols="30" rows="5" Placeholder="Description" required> </textarea>
                                </div> 
                                <div class="form-group">
                                    <label for="b_future_plan"> Future Plan</label>
                                    <textarea name="b_future_plan" id="b_future_plan" class="form-control" cols="30" rows="5" Placeholder="Future Plan" required> </textarea>
                                </div> 
                                <input type="submit" class="btn btn-primary float-left" name="addBus" value="Submit">
                            
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
  
            </div>
        </div>
    </main>
</div>

<?php include("../common/footer.php"); ?>

<?php
if(isset($_POST['addBus'])){

    $sc_id            = $_POST['sc_id'];
    $b_name          = $_POST['b_name'];
    // $b_fund_amt      = $_POST['b_fund_amt'];
    $b_desc          = $_POST['b_desc'];
    $b_future_plan   = $_POST['b_future_plan'];
    

    $target_dir = "../images/business/";
    $filename = basename($_FILES["b_image"]["name"]);
    $target_file = $target_dir . $filename;

    // Check if file already exists
    if (file_exists($target_file)) {
        // $_SESSION['msg2'] = 'Sorry, file already exists.';
        echo "Sorry, file already exists.";
    }
    // Check file size
    if ($_FILES["b_image"]["size"] > 500000) {
        $_SESSION['msg2'] = 'Sorry, your file is too large.';
        echo "Sorry, your file is too large.";
    }

    $validate = mysqli_query($b_connect, "SELECT * FROM business WHERE b_name='$b_name'");

    if(mysqli_num_rows($validate) > 0) {
        $_SESSION['msg2'] = 'Sorry! The business already exist!';
        ?>
        <meta http-equiv="refresh" content="0; url=add_business.php " />
        <?php
    } else {

        move_uploaded_file($_FILES["b_image"]["tmp_name"], $target_file);
        // if($_SESSION['bu_type']=='1'){
            
        //     $query = "INSERT INTO business (c_id, b_name, b_fund_amt, b_desc, b_future_plan, b_image) VALUES ('$c_id', '$b_name','$b_fund_amt', '$b_desc', '$b_future_plan', '$filename') ";
        // } else {
            
        // }
        if($_SESSION['bu_type'] =='1' ) {
            $ent_id = $_POST['ent_id'];
        } else {
            $ent_id = $_SESSION['bu_id'];
        }
        
        $query = "INSERT INTO business (sc_id, b_name, b_desc, b_future_plan, b_image, u_id) VALUES ('$sc_id', '$b_name','$b_desc', '$b_future_plan', '$filename', '$ent_id')";

        $run = mysqli_query($b_connect, $query);

        if($run) {
            $_SESSION['msg1'] = 'Business Added!';
            ?>
            <meta http-equiv="refresh" content="0; url=business.php" />
            <?php
        } else {
            $_SESSION['msg2'] = 'Sorry! business failed to added';
            ?>
            <meta http-equiv="refresh" content="0; url=add_business.php" />
            <?php
        }
    }
}

if(isset($_POST['UpdateBusi'])){
    $id              = $_GET['id'];
    $sc_id            = $_POST['sc_id'];
    $b_name          = $_POST['b_name'];
    // $b_fund_amt      = $_POST['b_fund_amt'];
    $b_desc          = $_POST['b_desc'];
    $b_future_plan   = $_POST['b_future_plan'];
    

    $target_dir = "../images/business/";
    $filename = basename($_FILES["b_image"]["name"]);
    $target_file = $target_dir . $filename;

    // echo "<pre>";
    // print_r($_POST);
    // echo $target_file;
    if($_SESSION['bu_type'] =='1' ) {
        $ent_id = $_POST['ent_id'];
        $query = "UPDATE `business` SET sc_id='$sc_id', b_name ='$b_name' , b_desc='$b_desc' , b_future_plan = '$b_future_plan' , u_id = '$ent_id' WHERE b_id='$id' ";
    
    } else {
        $query = "UPDATE `business` SET sc_id='$sc_id', b_name ='$b_name' , b_desc='$b_desc' , b_future_plan = '$b_future_plan' WHERE b_id='$id' ";
    }

    $data = mysqli_query($b_connect,$query);
    // print_r($query);
    if($data) {
        $_SESSION['msg1'] = 'Business updated successfully!';
        // Check if file already exists
        if (file_exists($target_file)) {
            // $_SESSION['msg2'] = 'Sorry, file already exists.';
            echo "Sorry, file already exists.";
        }
        // Check file size
        if ($_FILES["b_image"]["size"] > 500000) {
            // $_SESSION['msg2'] = 'Sorry, your file is too large.';
            echo "Sorry, your file is too large.";
        }
        if (move_uploaded_file($_FILES["b_image"]["tmp_name"], $target_file)) {
            $query_img  = "UPDATE business SET b_image = '$filename' WHERE b_id='$id' ";
            $run    = mysqli_query($b_connect, $query_img);
        } 
        ?>
        <meta http-equiv = "refresh" content = "0; url=business.php" />
        <?php
    } else {
        $_SESSION['msg2'] = 'Sorry! Business failed to Updated';
        ?>
        <meta http-equiv = "refresh" content = "0; url=business.php" />
        <?php
    }

}
?>
