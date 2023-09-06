<?php include('header.php'); ?>
	
<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact Us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5" style="padding:0px 10px">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>
	<div class="text-center mt-5" >
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
    <div class="row col-md-9 mx-auto">
		

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Your name</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Your email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Subject</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Your message</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->
				<div class="text-center text-md-left">
					<input class="btn btn-primary" type="submit" name="contact_us" value="Send" >
				</div>
            </form> 
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fa fa-map-marker-alt fa-2x"></i>
                    <p>Business Market Pvt Ltd. Roehampton, London</p>
                </li>

                <li><i class="fa fa-phone mt-4 fa-2x"></i>
                    <p>+44 20 8392 3000</p>
                </li>

                <li><i class="fa fa-envelope mt-4 fa-2x"></i>
                    <p>abc@gmail.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->

<?php include('footer.php'); ?>

<?php
if(isset($_POST['contact_us'])) {   

	$q_name     = $_POST['name'];
    $q_email     = $_POST['email'];
	$q_subj    = $_POST['subject'];
    $q_msg    = $_POST['message'];
	 print_r($_POST);
    $query = "INSERT INTO c_queries (q_name, q_email, q_subj, q_msg) VALUES ('$q_name','$q_email','$q_subj','$q_msg') ";

    $run = mysqli_query($b_connect, $query);

    if($run) {
		$_SESSION['msg1'] = 'Message Sent!';
    ?>
        <meta http-equiv="refresh" content="0; url=contact.php" />
    <?php

    } else {
        $_SESSION['msg2'] = 'Message Failed! Try Again';
		?>
        <meta http-equiv="refresh" content="0; url=contact.php" />
    	<?php
    }  
}

?>