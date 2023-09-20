<?php  
include('../includes/connection.php');
$id  = $_GET['id'];

$query = "DELETE FROM `categories` WHERE c_id='$id' ";
$data = mysqli_query($b_connect,$query);
if($data) {
    $_SESSION['msg1'] = 'Category deleted successfully!';
    // echo "<script>alert('Topic Deleted!')</script>"; 
    ?>
    <meta http-equiv = "refresh" content = "0; url=categories.php" />
    <?php
} else {
    $_SESSION['msg2'] = 'Sorry! Categories not deleted';
    ?>
    <meta http-equiv = "refresh" content = "0; url=categories.php" />
    <?php
}

?>
   