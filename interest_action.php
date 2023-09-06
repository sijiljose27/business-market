<?php  
include('includes/connection.php');
$u_id       = $_SESSION['bu_id'];
$b_id       = $_GET['b_id'];
$iu_status  = $_GET['status'];

$validate = mysqli_query($b_connect, "SELECT * FROM interested_users WHERE inv_u_id='$u_id' AND b_id='$b_id'");
if(mysqli_num_rows($validate) > 0) {
    $u_query = "UPDATE interested_users SET iu_status='$iu_status' WHERE inv_u_id='$u_id' AND b_id='$b_id'";
    $u_run = mysqli_query($b_connect, $u_query);
    if($u_run) {
        $_SESSION['msg1'] = 'Interest updated!';
    }
    ?>
    <meta http-equiv="refresh" content="0; url=business_desc.php?id=<?=$b_id?>"/>
    <?php
} else {
    $query = "INSERT INTO interested_users (inv_u_id , b_id, iu_status) VALUES ('$u_id', '$b_id', '$iu_status') ";
    $run = mysqli_query($b_connect, $query);
    if($run) {
        $_SESSION['msg1'] = 'Interest submitted to Entrepreneur!';
        ?>
        <meta http-equiv="refresh" content="0; url=business_desc.php?id=<?=$b_id?>"/>
        <?php

    } else {
        $_SESSION['msg2'] = 'Sorry! Action Failed';
        ?>
        <meta http-equiv="refresh" content="0; url=business_desc.php?id=<?=$b_id?>"/>
        <?php
    }
}
?>
   