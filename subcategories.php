<?php include('header.php'); ?>
<?php
// if(!isset($_SESSION['login'])) {
//     echo '<script>window.location="login.php"</script>';
// }
?>
<!-- Page Description-->
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>

<section class="page-section" id="business">
    <div class="container">
        <h2 class="mt-5">Search Accross all <a class="text-primary" href="business.php">Business's </a></h2>
        <div class="row">
            <?php
            $scat_id = $_GET['sc_id'];
            $sub_q = mysqli_query($b_connect, "SELECT * FROM sub_categories, business WHERE sub_categories.sc_id = business.sc_id AND sub_categories.sc_id = '$scat_id'");
            while( $sub_cat = mysqli_fetch_object($sub_q)) {
                ?>
                <div class="col-md-4 col-sm-6">
                    <!-- <div class="border border-secondary mb-2 mt-2 "> -->
                    <h4 class="text-info mt-3"><?=$sub_cat->b_name?></h4>
                    <a href="business_desc.php?id=<?=$sub_cat->b_id?>"><img class="img-fluid" src="images/business/<?=$sub_cat->b_image?>" alt="posts"></a>
                    <h6 class="mt-3">Category : <?=$sub_cat->sc_name?></h6>  
                    <a class="btn btn-info mb-3" href="business_desc.php?id=<?=$sub_cat->b_id?>">Know More</a>        
                    <!-- </div> -->
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