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
            <h1 class="mt-4">Sub Categories</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Categories</li>
                <li class="breadcrumb-item active">View & Add Sub Categories</li>
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
                    $execute = mysqli_query($b_connect, "SELECT * from sub_categories WHERE sc_id='$id'"); 
                    $c = mysqli_fetch_object($execute)
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <b><i>Edit Sub Category</i></b>
                                <a class="btn btn-primary float-right" href="sub_category.php">Add</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="pt_name">Category</label>
                                    <select class="custom-select select2" name="c_id" required>
                                        <!-- <option value="">Choose</option> -->
                                        <?php
                                        $qry = $b_connect->query("SELECT * FROM categories order by c_id asc");
                                        while($row=$qry->fetch_assoc()):
                                        ?>
                                            <option value="<?php echo $row['c_id'] ?>" <?php echo isset($c->c_id) && $c->c_id == $row['c_id'] ? 'selected' : '' ?>><?php echo $row['c_name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label for="pt_name">Sub Category Name</label>
                                    <input type="text" name="sc_name" class="form-control" value="<?=$c->sc_name?>" required>
                                </div>  
                                <div class="form-group">
                                    <label for="pt_name">Sub Category image/icon</label>
                                    <input type="file" name="sc_image" class="form-control" value="<?=$c->sc_image?>">
                                </div>                                
                                <input type="submit" class="btn btn-primary float-left" name="UpdateCat" value="Update">
                            
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                } else {
                ?>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <b><i>Add Sub Category</i></b>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="pt_name">Category</label>
                                    <select class="custom-select select2" name="c_id" required>
                                        <!-- <option value="">Choose</option> -->
                                        <?php
                                        $qry = $b_connect->query("SELECT * FROM categories order by c_id asc");
                                        while($row=$qry->fetch_assoc()):
                                        ?>
                                            <option value="<?php echo $row['c_id'] ?>" <?php echo isset($c_id) && $c_id == $row['c_id'] ? 'selected' : '' ?>><?php echo $row['c_name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label for="pt_name">Sub Category Name</label>
                                    <input type="text" name="sc_name" class="form-control" required>
                                </div>  
                                <div class="form-group">
                                    <label for="pt_name">Sub Category image/icon</label>
                                    <input type="file" name="sc_image" class="form-control" required>
                                </div>                               
                                <input type="submit" class="btn btn-primary float-left" name="addCat" value="Submit">
                            
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>

                <div class="col-md-8">
                    <!-- <h3><b>View Projects</b></h3> -->
                    <div class="table-responsive ">
                        <table id="cat" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>S.No.</th>
                                    <th>image</th>
                                    <th>Category Name</th> 
                                    <th>Sub Category Name</th>                                                                       
                                    <!-- <th>Status</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    $execute = mysqli_query($b_connect, "SELECT * from sub_categories,categories WHERE sub_categories.c_id = categories.c_id ORDER BY sc_id DESC"); 
                                    $count = '1';
                                    while($cat = mysqli_fetch_object($execute)) {
                                        ?>
                                        <tr>
                                            <td><?=$count?></td>
                                            <td> <img src="../images/category/sub/<?=$cat->sc_image?>" height="100px"></img> </td>
                                            <td><?=$cat->c_name?></td>
                                            <td><?=$cat->sc_name?></td>
                                           
                                            <!-- <td><?=$cat->sc_status?></td> -->
                                            <td>
                                                <a href="?id=<?=$cat->sc_id?>&action=edit" class='btn btn-info btn-sm'><b><i class="fa fa-edit">Edit</i></b></a>  
                                                <a href="delete_cat.php?id=<?=$cat->sc_id?>&action=delete" class='btn btn-danger btn-sm'><b><i class="fa fa-trash">Delete</i></b></a>
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
    $('#cat').DataTable();
});
</script>

<?php
if(isset($_POST['addCat'])){
    $c_id     = $_POST['c_id'];
    $sc_name  = $_POST['sc_name'];
    
    $target_dir = "../images/category/sub/";
    $filename = basename($_FILES["sc_image"]["name"]);
    $target_file = $target_dir . $filename;

    // Check if file already exists
    if (file_exists($target_file)) {
        // $_SESSION['msg2'] = 'Sorry, file already exists.';
        echo "Sorry, file already exists.";
    }
    // Check file size
    if ($_FILES["sc_image"]["size"] > 500000) {
        $_SESSION['msg2'] = 'Sorry, your file is too large.';
        echo "Sorry, your file is too large.";
    }

    $validate = mysqli_query($b_connect, "SELECT * FROM sub_categories WHERE sc_name='$c_name'");

    if(mysqli_num_rows($validate) > 0) {
        $_SESSION['msg2'] = 'Sorry! The Category already exist!';
        ?>
        <meta http-equiv="refresh" content="0; url=sub_category.php " />
        <?php
    } else {
        move_uploaded_file($_FILES["sc_image"]["tmp_name"], $target_file);
        $query = "INSERT INTO sub_categories (c_id, sc_name , sc_image) VALUES ('$c_id','$sc_name', '$filename') ";
        $run = mysqli_query($b_connect, $query);

        // echo "<pre>";
        // print_r($connect);
        if($run) {
            $_SESSION['msg1'] = 'Sub Category Added!';
            ?>
            <meta http-equiv="refresh" content="0; url=sub_category.php" />
            <?php

        } else {
            $_SESSION['msg2'] = 'Sorry! Sub Category failed to added';
            ?>
            <meta http-equiv="refresh" content="0; url=sub_category.php" />
            <?php
        }
    }
}

if(isset($_POST['UpdateCat'])){
    $id         = $_GET['id'];
    $c_id       = $_POST['c_id'];
    $sc_name    = $_POST['sc_name'];

    $target_dir = "../images/category/sub/";
    $filename = basename($_FILES["sc_image"]["name"]);
    $target_file = $target_dir . $filename;

    $query = "UPDATE `sub_categories` SET sc_name ='$sc_name', c_id ='$c_id' WHERE sc_id='$id' ";
    $data = mysqli_query($b_connect,$query);

    // print_r($query);
    if($data) {
        $_SESSION['msg1'] = 'Sub Categories updated successfully!';
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        }
        // Check file size
        if ($_FILES["sc_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        if (move_uploaded_file($_FILES["sc_image"]["tmp_name"], $target_file)) {
            $query_img  = "UPDATE sub_categories SET sc_image = '$filename' WHERE sc_id='$id' ";
            $run    = mysqli_query($b_connect, $query_img);
        } 
        ?>
        <meta http-equiv = "refresh" content = "0; url=sub_category.php" />
        <?php
    } else {
        $_SESSION['msg2'] = 'Sorry! Sub Categories failed to Updated';
        ?>
        <meta http-equiv = "refresh" content = "0; url=sub_category.php" />
        <?php
    }

}
?>
