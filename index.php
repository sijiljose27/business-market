<?php include('header.php'); ?>
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/bb1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/banner_1.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/bb.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 gayab">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <h5 class="text-center">Home Services</h5>
                    <a href="subcategories.php?sc_id=2">
                    <img class="d-block w-100" src="images/home.jpg" alt="">
                    </a>
                    
                </div>
                <div class="col-md-4 col-sm-4">
                    <h5 class="text-center">Supermarkets</h5>
                    <a href="subcategories.php?sc_id=11">
                        <img class="d-block w-100" src="images/category/sub/groc.png" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h5 class="text-center">Real Estate </h5>
                    <a href="subcategories.php?sc_id=1">
                        <img class="d-block w-100" src="images/category/sub/rent.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 p-2">
        <!-- style="border-bottom : 2px solid black" -->
        <h3 class="w-100 p-2 text-center" style="background : aliceblue; "><strong> Business Categories</strong></h3>
        <!-- <div class="categories p-2"> -->
        <?php
            $execute = mysqli_query($b_connect, "SELECT * FROM categories WHERE c_status='Active'");
            while( $cat = mysqli_fetch_object($execute)) {
                ?>
                <div class="col-md-2 col-sm-3 mb-5 mt-5 text-center">

                    <div style="width: auto;display : inline">
                        <div class="text-center">
                            <a href="categories.php?cid=<?=$cat->c_id?>">
                                <img class="img-fluid" src="images/category/<?=$cat->c_image?>" alt="cat" style="height: 150px">
                            </a>
                        </div>
                        <h4 class="text-info mt-3 "><?=$cat->c_name?></h4>
                    </div>
                </div>
                <?php
            }
        ?>
        
        <!-- </div> -->
    </div>
    <!-- <div class="text-center">
        <a class="btn btn-lg btn-info" href="business.php">View All</a>
    </div> -->
    <h3 class="w-100 p-2 mb-5" style="background : aliceblue; "><strong></strong></h3>

    <div class="more-info" >
        <!-- style="background-color : aliceblue;" -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="more-info-content">
                        <div class="row">
                            <div class="col-md-6 has-bg-img">
                                <div class="bg-img bg-cover" style="background-image: url('images/about.jpg'); height:100%; width:100%;">
                                
                                <!-- <img class="image-fluid" src="images/about.jpg" alt="" width="100%"> -->
                                </div>
                            </div>
                            <div class="col-md-6 align-self-center">
                                <div class="right-content">
                                <h1 class="mb-4">#1 Place To Find The Perfect
                                    Business Ideas</h1>
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum lorem et ipsum convallis semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur at eleifend tellus. Nunc sed condimentum quam, ac tempor elit. Maecenas vitae varius lorem, tristique hendrerit metus.</p>
                                <p><i class="fa fa-check text-primary me-3"></i> Many Ideas under One platform</p>
                                <p><i class="fa fa-check text-primary me-3"></i> Show Interested Investors</p>
                                <p><i class="fa fa-check text-primary me-3"></i> Nice Platform To Interact with Investors and other Enterpreneuer.</p>
                                <!-- <a class="btn btn-info py-3 px-5 mt-3" href="aboutus.php">Read More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h1 class="mb-3">Our Volunteers</h1>
            </div>
            <div class="row g-4">
                
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            
                            <!-- <img class="img-fluid" src="imgs/vol1.png?>" alt="member"> -->
                            <p id="rcorners1" class="text-center">
                            <img class="img-fluid" src="images/male_prof.png" alt="member">
                            </p>
                            <!-- <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Member 1</h5>
                            <small>member1@gmail.com</small>
                        </div>
                    </div>
                </div>

                
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            
                            <!-- <img class="img-fluid" src="imgs/vol2.png?>" alt="member"> -->
                            <p id="rcorners1" class="text-center">
                            <img class="img-fluid" src="images/fem_prof.png" alt="member">
                            </p>
                            <!-- <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Member 2</h5>
                            <small>member2@gmail.com</small>
                        </div>
                    </div>
                </div>

                
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            
                            <!-- <img class="img-fluid" src="imgs/vol3.png?>" alt="member"> -->
                            <p id="rcorners1" class="text-center">
                            <img class="img-fluid" src="images/male_prof.png" alt="member">
                            </p>
                            <!-- <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Member 3</h5>
                            <small>member3@gmail.com</small>
                        </div>
                    </div>
                </div>

                
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            
                            <!-- <img class="img-fluid" src="imgs/vol4.png?>" alt="member"> -->
                            <p id="rcorners1" class="text-center">
                                <img class="img-fluid" src="images/fem_prof.png" alt="member">
                            </p>
                            <!-- <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Member 4</h5>
                            <small>member4@gmail.com</small>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
    <h3 class="w-100 p-2" style="background : aliceblue; "><strong></strong></h3>
    <!-- Clients-->
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="images/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="images/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="images/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="images/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
