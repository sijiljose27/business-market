<?php  
include('../includes/connection.php');

$id         = $_GET['id'];
$au_name     = $_POST['au_name'];
$au_email    = $_POST['au_email'];
$au_pwd      = $_POST['au_pwd'];
$au_phno      = $_POST['au_phno'];
$au_type    = $_POST['au_type'];

$query = "UPDATE `a_users` SET au_name ='$au_name', au_email='$au_email', au_pwd='$au_pwd',au_phno='$au_phno',au_type='$au_type' WHERE au_id='$id' ";
$data = mysqli_query($connect,$query);

// print_r($query);
if($data) {
    $_SESSION['msg1'] = 'Users updated successfully!';
    
    ?>
    <meta http-equiv = "refresh" content = "0; url=users.php" />
    <?php
} else {
    $_SESSION['msg2'] = 'Sorry! Users failed to Updated';
    ?>
    <meta http-equiv = "refresh" content = "0; url=users.php" />
    <?php
}


?>
   