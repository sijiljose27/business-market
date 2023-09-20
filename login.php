<?php include('header.php'); ?>
<div class="col-md-6 mx-auto">
    <h1 class="text-center">Welcome</h1>
    <h3 class="text-center"><span class="text-danger">Log In</span> For Seamless Experience</h3>
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
        
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email</label>
            <input type="email" id="form2Example1" name="email" class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
            <input type="password" id="form2Example2" name="password" class="form-control" />
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
            </div>
            <!-- <div class="col">
                <a href="#!">Forgot password?</a>
            </div> -->
        </div>

        <!-- Submit button -->
        <button class="btn btn-primary btn-block mb-4" name="BLogin" >Sign In </button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="signup.php">Register</a> </p>
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
if(isset($_POST['BLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $execute = mysqli_query($b_connect, "SELECT * FROM b_users WHERE bu_email = '$email' AND bu_pwd = '$password' AND bu_status = 'Active'" );
    
    if(mysqli_num_rows($execute) > 0) {
        // session_start();
        $data = mysqli_fetch_object($execute);
        $_SESSION['bu_id'] = $data->bu_id;        
        $_SESSION['bu_type'] = $data->bu_type;        
        $_SESSION['bu_name'] = $data->bu_name;
        $_SESSION['bu_email'] = $data->bu_email;
        $_SESSION['bu_mobno'] = $data->bu_mobno;

        $_SESSION['login'] = true;
        $_SESSION['msg1'] = 'Login Successfull!';
        // echo "<script>window.location='venues.php';</script>";
        echo "<script>window.location='common/dashboard.php';</script>";
    } else {
        $_SESSION['msg2'] = 'Login Failed! Incorrect Email or Password';
        ?>
            <meta http-equiv="refresh" content="0; url=login.php" />
        <?php
    } 
}

?>