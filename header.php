<?php 
include('includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Business Market</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="images/favicon.png"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Font Awesome icons (free version)-->
    <!-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> -->

    <style>
        .fakeimg {
            height: 200px;
            border : 1px solid grey;
            padding : 5px;
        }
        a {
            color : black;
        }
        .collapse li{
            font-size:16px;
            font-weight:bold
        }
        .collapse li:hover{
            font-size:18px;
        }
        .collapse li a:hover{
            color:#dc3545
        }
        @media (max-width: 575px) {
  .gayab {
    display: none;
  }
}
        @media (max-width: 400px) {
  .logoText {
    font-size: 25px;
  }
}

    </style>
</head>
<body>

<!-- bg-light -->
<nav class="navbar navbar-expand-md bg-light">
    <a class="navbar-brand" href="index.php"><h1 class="logoText"><span class="text-danger ">Business</span> Market</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon">
    <i class="fa fa-bars"></i>
</span>
    </button>
    <div class="collapse navbar-collapse text-center" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categories.php">Business</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <?php
                if(isset($_SESSION['login'])) {
                    ?>
                    <a class="nav-link text-info" href="common/profile.php"><i class="fa fa-user"></i><strong> <?=$_SESSION['bu_name'];?></strong></a>
                    <?php
                } else {
                ?>
                    <a class="nav-link" href="login.php"><i class="fa fa-sign-out"></i> Login/Sign-Up</a>
                    <!-- <a class="nav-link" href="#"><i class="fa fa-user"></i> Name</a> -->
                    <?php
                }
                ?>
            </li> 
            <?php
                if(isset($_SESSION['login'])) {
                ?>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="common/logout.php"><i class="fa fa-sign-out"></i></a>
                </li>
                <?php
                }
            ?>   
        </ul>
    </div>  
</nav>



<!-- <div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <h2>About Me</h2>
            <h5>Photo of me:</h5>
            <div class="fakeimg">Fake Image</div>
            <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
            <h3>Some Links</h3>
            <p>Lorem ipsum dolor sit ame.</p>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <hr class="d-sm-none">
        </div>
        <div class="col-sm-8">
            <h2>TITLE HEADING</h2>
            <h5>Title description, Dec 7, 2017</h5>
            <div class="fakeimg">Fake Image</div>
            <p>Some text..</p>
            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            <br>
            <h2>TITLE HEADING</h2>
            <h5>Title description, Sep 2, 2017</h5>
            <div class="fakeimg">Fake Image</div>
            <p>Some text..</p>
            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        </div>
    </div>
</div> -->