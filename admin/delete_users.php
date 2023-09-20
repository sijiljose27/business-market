<?php   
include('../includes/connection.php');

$id  = $_GET['id'];
$query = "DELETE FROM `a_users` WHERE au_id='$id' ";
$data = mysqli_query($connect,$query);
if($data) {
    $_SESSION['msg1'] = 'Users deleted successfully!';
    // echo "<script>alert('Topic Deleted!')</script>"; 
    ?>
    <meta http-equiv = "refresh" content = "0; url=users.php" />
    <?php
} else {
    $_SESSION['msg2'] = 'Sorry! Users not deleted';
    ?>
    <meta http-equiv = "refresh" content = "0; url=users.php" />
    <?php
}

?>
   