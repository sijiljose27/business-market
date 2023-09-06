
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
            <h1 class="mt-4">Contact Queries</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Contact Queries</li>
                <li class="breadcrumb-item active">View </li>
            </ol>
            <div class="row mb-4">
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
                <div class="col-md-12">
                    <!-- <h3><b>View Projects</b></h3> -->
                    <div class="table-responsive ">
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Person Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $execute = mysqli_query($b_connect, "SELECT * from c_queries"); 
                                    $count = '1';
                                    while($contact = mysqli_fetch_object($execute)) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?=$count?></td>
                                            <td>
                                                <strong>Name : </strong><?=$contact->q_name?></br>
                                                <strong>Email : </strong><?=$contact->q_email?>
                                            </td>
                                            <td>
                                                <strong> <?=$contact->q_subj;?></strong></br>
                                                <small><?=$contact->q_msg;?></small>
                                            </td>
                                            <td class="text-center">
                                                <a href="?id=<?=$contact->q_id?>&action=delete" class='btn btn-danger btn-sm'><b><i class="fa fa-trash">Delete</i></b></a>
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
if(isset($_GET['action']) && $_GET['action'] = 'delete') {
    $id  = $_GET['id'];
    $query = "DELETE FROM `c_queries` WHERE q_id='$id' ";
    $data = mysqli_query($b_connect,$query);
    if($data) {
        $_SESSION['msg1'] = 'Query deleted successfully!';
        ?>
        <meta http-equiv = "refresh" content = "0; url=queries.php" />
        <?php
    } else {
        $_SESSION['msg2'] = 'Sorry! not deleted';  
    }
}

?>


