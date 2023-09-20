<?php include('header.php'); ?>
<?php
// if(!isset($_SESSION['login'])) {
//     echo '<script>window.location="login.php"</script>';
// }
?>

<?php
if(isset($_GET['cid'])){
    $cid = $_GET['cid'];
    $execute = mysqli_query($b_connect, "SELECT * FROM categories WHERE c_status='Active' AND c_id =$cid;");
} else {
    $execute = mysqli_query($b_connect, "SELECT * FROM categories WHERE c_status='Active'");
}
    
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

<!-- <section class="page-section" id="business"> -->
    
    <div class="container">
        <h2 class="mt-5">Search Accross all <span class="text-primary">Business's </span></h2>
        <div class="row">
            <?php
            while( $cat = mysqli_fetch_object($execute)) {
                $cat_id = $cat->c_id;
                ?>
                <!-- <div class="col-md-12"> -->
                    <!-- <div class="border border-secondary mb-2 mt-2 "> -->
                        <div class="col-md-12 m-3 p-2" style="background : aliceblue; ">
                            <h5><?=$cat->c_name;?></h5>
                        </div>
                        <?php
                        $sub_q = mysqli_query($b_connect, "SELECT * FROM sub_categories, categories WHERE sub_categories.c_id = categories.c_id AND sub_categories.c_id = '$cat_id'");
                        if(mysqli_num_rows($sub_q)>0) {
                            while( $sub_cat = mysqli_fetch_object($sub_q)) {
                                ?>
                                <!-- <h5  class="mt-5"><?=$cat-> c_name;?></h5> -->
                                <div class="col-md-3 col-sm-3 mb-5">                        
                                    <div class="center" style="background : aliceblue;">
                                        <a href="subcategories.php?sc_id=<?=$sub_cat->sc_id?>" class="center"><img class="h-100 d-inline-block img-fluid mt-3" src="images/category/sub/<?=$sub_cat->sc_image?>" alt="subcat"></a>
                                    </div>
                                    <h5 class="text-info mt-3 center"><?=$sub_cat->sc_name;?></h5>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="col-md-12 col-sm-12 mb-5 mt-5 ">  
                                <div class="center" style="height: 200px; background : aliceblue"> 
                                    <h2 class="m-2">no records found</h2>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    <!-- </div> -->
                <!-- </div> -->
                <?php
            }
            ?>
        </div>     
    </div>
<!-- </section> -->
<?php include('footer.php'); ?>