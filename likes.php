<?php  
include('includes/connection.php');
$u_id       = $_SESSION['bu_id'];
$b_id       = $_GET['b_id'];
$like_status  = $_GET['status'];

$query = "INSERT INTO likes (e_u_id , b_id, like_status) VALUES ('$u_id', '$b_id', '$like_status') ";
$run = mysqli_query($b_connect, $query);
if($run) {
    if($like_status=='1'){
        $_SESSION['msg1'] = 'Liked By User!';
    }else {
        $_SESSION['msg1'] = 'Disliked By User!';
    }   
    ?>
    <meta http-equiv="refresh" content="0; url=business_desc.php?id=<?=$b_id?>"/>
    <?php

} else {
    $_SESSION['msg2'] = 'Sorry! Action Failed';
    ?>
    <meta http-equiv="refresh" content="0; url=business_desc.php?id=<?=$b_id?>"/>
    <?php
}
?>
   