<?php include('header.php'); ?>
<?php
// if(!isset($_SESSION['login'])) {
//     echo '<script>window.location="login.php"</script>';
// }
?>

<?php
    
    $execute = mysqli_query($b_connect, "SELECT * FROM business, sub_categories WHERE business.sc_id = sub_categories.sc_id");
    // $busi = mysqli_fetch_object($execute);
?>
<!-- Page Description-->

<section class="page-section" id="business">
    
    <div class="container">
        <h2 class="mt-5">Search Accross all <span class="text-primary">Business's </span></h2>
        <div class="row">
            <?php
            while( $busi = mysqli_fetch_object($execute)) {
                ?>
                <div class="col-lg-4 col-md-4 col-sm-12 mb-5 mt-5">
                    <a href="business_desc.php?id=<?=$busi->b_id?>"><img class="img-fluid" src="images/business/<?=$busi->b_image?>" alt="posts"></a>
                    <h4 class="text-info mt-3"><?=$busi->b_name?></h4>
                    <!-- <p>
                        <?php
                        $small = substr($busi->b_desc, 0, 100);
                        ?>
                        <?=$small."..."?>
                    </p> -->
                    <!-- <a class="btn btn-info" href="business_desc.php?id=<?=$busi->b_id?>">Details</a> -->
                </div>
                <?php
            }
            ?>
        </div>     
    </div>
</section>
<?php include('footer.php'); ?>
<?php

?>