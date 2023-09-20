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
            <h1 class="mt-4">Categories</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Categories</li>
                <li class="breadcrumb-item active">View & Add Categories</li>
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
                    $execute = mysqli_query($b_connect, "SELECT * from categories WHERE c_id='$id'"); 
                    $c = mysqli_fetch_object($execute)
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <b><i>Edit Category</i></b>
                                <a class="btn btn-primary float-right" href="categories.php">Add</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="pt_name">Category Name</label>
                                    <input type="text" name="c_name" class="form-control" value="<?=$c->c_name?>" required>
                                </div>  
                                <div class="form-group">
                                    <label for="pt_name">Category image/icon</label>
                                    <input type="file" name="c_image" class="form-control" value="<?=$c->c_image?>">
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
                                <b><i>Add Category</i></b>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="pt_name">Category Name</label>
                                    <input type="text" name="c_name" class="form-control" required>
                                </div>  
                                <div class="form-group">
                                    <label for="pt_name">Category image/icon</label>
                                    <input type="file" name="c_image" class="form-control" required>
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
                                    <th>Name</th>                                    
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    $execute = mysqli_query($b_connect, "SELECT * from categories"); 
                                    $count = '1';
                                    while($cat = mysqli_fetch_object($execute)) {
                                        ?>
                                        <tr>
                                            <td><?=$count?></td>
                                            <td> <img src="../images/category/<?=$cat->c_image?>" height="100px"></img> </td>
                                            <td><?=$cat->c_name?></td>
                                            <td><?=$cat->c_status?></td>
                                            <td>
                                                <a href="?id=<?=$cat->c_id?>&action=edit" class='btn btn-info btn-sm'><b><i class="fa fa-edit">Edit</i></b></a>  
                                                <a href="delete_cat.php?id=<?=$cat->c_id?>&action=delete" class='btn btn-danger btn-sm'><b><i class="fa fa-trash">Delete</i></b></a>
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
    $c_name     = $_POST['c_name'];
    
    $target_dir = "../images/category/";
    $filename = basename($_FILES["c_image"]["name"]);
    $target_file = $target_dir . $filename;

    // Check if file already exists
    if (file_exists($target_file)) {
        // $_SESSION['msg2'] = 'Sorry, file already exists.';
        echo "Sorry, file already exists.";
    }
    // Check file size
    if ($_FILES["c_image"]["size"] > 500000) {
        $_SESSION['msg2'] = 'Sorry, your file is too large.';
        echo "Sorry, your file is too large.";
    }

    $validate = mysqli_query($b_connect, "SELECT * FROM categories WHERE c_name='$c_name'");

    if(mysqli_num_rows($validate) > 0) {
        $_SESSION['msg2'] = 'Sorry! The Category already exist!';
        ?>
        <meta http-equiv="refresh" content="0; url=categories.php " />
        <?php
    } else {
        move_uploaded_file($_FILES["c_image"]["tmp_name"], $target_file);
        $query = "INSERT INTO categories (c_name , c_image) VALUES ('$c_name', '$filename') ";
        $run = mysqli_query($b_connect, $query);

        // echo "<pre>";
        // print_r($connect);
        if($run) {
            $_SESSION['msg1'] = 'Category Added!';
            ?>
            <meta http-equiv="refresh" content="0; url=categories.php" />
            <?php

        } else {
            $_SESSION['msg2'] = 'Sorry! Category failed to added';
            ?>
            <meta http-equiv="refresh" content="0; url=categories.php" />
            <?php
        }
    }
}

if(isset($_POST['UpdateCat'])){
    $id         = $_GET['id'];
    $c_name     = $_POST['c_name'];

    $target_dir = "../images/category/";
    $filename = basename($_FILES["c_image"]["name"]);
    $target_file = $target_dir . $filename;

    $query = "UPDATE `categories` SET c_name ='$c_name' WHERE c_id='$id' ";
    $data = mysqli_query($b_connect,$query);

    // print_r($query);
    if($data) {
        $_SESSION['msg1'] = 'Categories updated successfully!';
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        }
        // Check file size
        if ($_FILES["c_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        if (move_uploaded_file($_FILES["c_image"]["tmp_name"], $target_file)) {
            $query_img  = "UPDATE categories SET c_image = '$filename' WHERE c_id='$id' ";
            $run    = mysqli_query($b_connect, $query_img);
        } 
        ?>
        <meta http-equiv = "refresh" content = "0; url=categories.php" />
        <?php
    } else {
        $_SESSION['msg2'] = 'Sorry! Categories failed to Updated';
        ?>
        <meta http-equiv = "refresh" content = "0; url=categories.php" />
        <?php
    }

}
?>
