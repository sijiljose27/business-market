<?php include('header.php'); ?>
<?php
if(!isset($_SESSION['login'])) {
    echo '<script>window.location="login.php"</script>';
}
?>

<?php
    $b_id = $_GET['id'];
    $u_id = $_SESSION['bu_id'];
    $execute = mysqli_query($b_connect, "SELECT * FROM business, sub_categories WHERE business.sc_id = sub_categories.sc_id AND business.b_id = '$b_id'");
    $b_desc = mysqli_fetch_object($execute);
    if(isset($_SESSION['login']) && $_SESSION['bu_type']=='3') {
        $visitors = mysqli_query($b_connect, "SELECT * FROM visitors WHERE v_u_id = '$u_id' AND v_b_id = '$b_id'");
        if(mysqli_num_rows($visitors) > 0) { 
            $visits_c = mysqli_fetch_object($visitors);
            // $count = $visits_c -> v_count;
            $count =  $visits_c -> v_count + 1;
            $u_query = "UPDATE visitors SET v_count='$count' WHERE v_u_id='$u_id' AND v_b_id='$b_id'";
            $u_run = mysqli_query($b_connect, $u_query);
        } else {
            $query = "INSERT INTO visitors ( v_b_id, v_u_id , v_count) VALUES ('$b_id', '$u_id', '1') ";
            $run = mysqli_query($b_connect, $query);
        }
    }
    $likes = mysqli_query($b_connect, "SELECT count(l_id) as l_count from likes WHERE like_status = '1' AND b_id = $b_id"); 
    $l_count = mysqli_fetch_object($likes);

    $dlikes = mysqli_query($b_connect, "SELECT count(l_id) as l_count from likes WHERE like_status = '2' AND b_id = $b_id"); 
    $dl_count = mysqli_fetch_object($dlikes);

                                    
?>
<!-- Page Description-->

<section class="page-section" id="business">
<!-- <h2 class="text-primary text-center"><?=$b_desc->b_name?></h2> -->
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-4 col-md-4" data-wow-delay="0.1s">                        
                <img src="images/business/<?=$b_desc->b_image?>" height = "300px" width="100%">
            </div>
            <div class="col-lg-8 col-md-8" data-wow-delay="0.1s">
                
                <div class="p-4 pb-0">
                    <h2 class="text-danger mb-3"><?=strtoupper($b_desc->b_name)?></h2>
                    <h5 class="text-warning">&#x2605; &#x2605; &#x2605; &#x2605; &#x2605;</h5>
                    <!-- liked by users -->
                    <?php
                    $e_u_id = $_SESSION['bu_id'];
                    $like_user = mysqli_query($b_connect, "SELECT * from likes WHERE e_u_id='$e_u_id' AND b_id ='$b_id'"); 
                    if(mysqli_num_rows($like_user) > 0) {
                        ?>
                            <a class="btn" title ="Once You can like or dislike" ><i class="fa fa-thumbs-up"></i> Like (<?=$l_count-> l_count?>)</a>
                            <a class="btn" title ="Once You can like or dislike "><i class="fa fa-thumbs-down"></i> Dislike (<?=$dl_count-> l_count?>)</a>
                        <?php
                    } else {
                    ?>
                        <a href="likes.php?b_id=<?=$b_id?>&status=1" class="btn" ><i class="fa fa-thumbs-up" style="font-size:30px;color:green;"></i> Like  (<?=$l_count-> l_count?>)</a>
                        <a href="likes.php?b_id=<?=$b_id?>&status=2" class="btn" ><i class="fa fa-thumbs-down" style="font-size:30px;color:red;"></i> Dislike (<?=$dl_count-> l_count?>)</a>
                    <?php
                    }
                    ?>
                    <div class="user-info">
                        <?php
                        $ent_id = $b_desc -> u_id;
                        $user = mysqli_query($b_connect, "SELECT * from b_users WHERE bu_id='$ent_id'"); 
                        $user_d = mysqli_fetch_object($user);

                        ?>
                        <h6 class="text-success mt-2"><strong>Idea By - </strong><?=$user_d->bu_name;?></h6>
                    </div>
                    <!-- <h4 class="text-success mb-4">Fund Amount : <?=$b_desc->b_fund_amt?></h4> -->
                    
                    <p class="h5"><?=$b_desc->b_desc?></p>

                    <?php
                    if($b_desc->u_id !=$_SESSION['bu_id'] && $_SESSION['bu_type']=='3'){
                    ?>
                        <a href="interest_action.php?b_id=<?=$b_id?>&status=1" class="btn btn-info" ><i class="fa fa-thumbs-up"></i> Interested</a>
                        <a href="interest_action.php?b_id=<?=$b_id?>&status=2" class="btn btn-danger" ><i class="fa fa-thumbs-down"></i> Not Interested</a>
                        <?php
                    }
                    ?>
                    <div class="mt-2">
                        <?php
                            if(isset($_SESSION['msg1']))
                            {
                            ?>
                            <div class="col-12 mb-3 alert alert-success" role="alert">
                                <small class="text-success" style="font-size:20px"><?=$_SESSION['msg1']?></small>
                            </div>
                            <?php
                                unset($_SESSION['msg1']);
                            } else if(isset($_SESSION['msg2'])) {
                            ?>
                            <div class="col-12 mb-3 alert alert-danger" role="alert">
                                <small class="text-danger" style="font-size:20px"><?=$_SESSION['msg2']?></small>
                            </div>
                            <?php
                                unset($_SESSION['msg2']);
                            }
                        ?>
                    </div>
                    <?php
                    
                    $iu_query = mysqli_query($b_connect, "SELECT * FROM interested_users WHERE b_id = '$b_id' AND inv_u_id = '$u_id' AND iu_status ='1'");
                    $interested_u = mysqli_fetch_object($iu_query);
                    
                    if(isset($interested_u) && $interested_u -> iu_confirmation =='1') {
                        ?>
                        <div class="row">
                            <h2 class="mt-3 text-danger col-md-12">Future Plan</h2>
                            <div class="col-md-12">
                                <h5 class="mb-3"> Future Plan for inhance business</h5>
                            </div>
                            <p class="text-dark mb-3 mt-3 h5 col-md-12"><?=$b_desc->b_future_plan?></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>
<?php include('footer.php'); ?>
<?php
// if(isset($_GET['b_id'])){
    
// }
?>
                                                                                                  