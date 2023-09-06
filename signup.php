<?php include('header.php'); ?>

<div class="col-md-6 mx-auto">
    <h1 class="text-center">Welcome</h1>
    <h3 class="text-center"><span class="text-danger">Sign Up</span> For Seamless Experience</h3>
    <h6 class="text-center">Please enter the email you use to sign in.</h6>
    <div class="text-center" >
        <?php
            if(isset($_SESSION['msg1']))
            {
            ?>
            <div class="col-12 mb-3">
                <small class="text-success" style="font-size:20px"><?=$_SESSION['msg1']?></small>
            </div>
            <?php
                unset($_SESSION['msg1']);
            }
            else if(isset($_SESSION['msg2']))
            {
            ?>
            <div class="col-12 mb-3">
                <small class="text-danger" style="font-size:20px"><?=$_SESSION['msg2']?></small>
            </div>
            <?php
                unset($_SESSION['msg2']);
            }
        ?>
    </div>
    <form action="" method="POST">

        <div class="row">
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="password">Name</label>
                <input type="text" id="name" name="bu_name" class="form-control" />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="bu_email" class="form-control" />
            </div>
        </div>

        <div class="row">
            <!-- Password input -->
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" id="form2Example2" name="bu_pwd" class="form-control" />
            </div>
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="form2Example2">Phone Number</label>
                <input type="text" id="form2Example2" name="bu_mobno" class="form-control"/>
            </div>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">

            <!-- <div class="col d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="bu_type" value="2" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Entrepreneur</label>
                </div>
            </div> -->

            <div class="col d-flex">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="bu_type" value="3" id="form2Example31" />
                    <label class="form-check-label" for="form2Example31"> Investor</label>
                </div>
            </div>

        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4" name="Register">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Already member? <a href="login.php">Login</a></p>
            <p>or sign up with:</p>
            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fa fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fa fa-google"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fa fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fa fa-github"></i>
            </button>
        </div>

    </form>
</div>

<?php include('footer.php'); ?>

<?php
if(isset($_POST['Register'])) {
        
    $bu_name      = $_POST['bu_name'];
    $bu_email     = $_POST['bu_email'];
    $bu_pwd       = $_POST['bu_pwd'];
    $bu_mobno     = $_POST['bu_mobno']; 
    // $u_faddr       = $_POST['u_faddr'];  

    if(isset($_POST['bu_type'])) {
        $bu_type   = $_POST['bu_type']; 
    } else {
        // for entreprenuer
        $bu_type      = "2";
    }

    $uvalid = mysqli_query($b_connect, "SELECT * FROM b_users WHERE bu_mobno = '$bu_mobno' OR bu_email = '$bu_email' ");

    if(mysqli_num_rows($uvalid) > 0) {
        $_SESSION['msg2'] = 'Email or Mobile Number already present!';
        ?>
        <meta http-equiv="refresh" content="0; url=signup.php"/>
        <?php
    } else {
        $query = mysqli_query($b_connect, "INSERT INTO b_users (bu_name, bu_email, bu_mobno, bu_pwd, bu_type) VALUES ('$bu_name','$bu_email', '$bu_mobno', '$bu_pwd', '$bu_type') ");   
        if($query)
        {
            $_SESSION['msg1'] = 'User Created. Login Now!';

            ?>
            <meta http-equiv="refresh" content="0; url=signup.php" />
            <?php
        } else {
            $_SESSION['msg2'] = 'Registeration Failed. Try Again.';
            ?>
            <meta http-equiv="refresh" content="0; url=signup.php" />
            <?php
        }
    }
}

?>