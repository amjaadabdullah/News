<?php
$dir='';
include('header.php');

if (!isset($_SESSION['user'])) {
   header("Location: http://localhost/news/login.php"); /* Redirect browser */
    exit();
}
?>
    <section id="contentSection">
        <div class="row offset-md-3">
          
            <div class="col-lg-8 col-md-8 col-sm-8 ">
                <div class="left_content">
                    <div class="contact_area">
                        <h2>Profile</h2>
                    </div>

						<h3 class=" col-md-4" style="color: red">User Name :</h3>
                            <h3 class=" col-md-8" type="text" name="name" placeholder="First Name*"> <?php echo $_SESSION['user']['user_name'] ; ?></h3>
                            <hr>
                            <h3 class=" col-md-4" style="color: red">User Email :</h3>
                            <h3 class=" col-md-8" type="text" name="name" placeholder="First Name*"> <?php echo $_SESSION['user']['email_address'] ; ?></h3>
                            <hr>
                            <h3 class=" col-md-4" style="color: red">Phone Number :</h3>
                            <h3 class=" col-md-8" type="text" name="name" placeholder="First Name*"> <?php echo $_SESSION['user']['phone_number'] ; ?></h3>
                            <hr>
                            <h3 class=" col-md-4" style="color: red">User Address :</h3>
                            <h3 class=" col-md-8" type="text" name="name" placeholder="First Name*"> <?php echo $_SESSION['user']['address'] ; ?></h3>
                           
                </div>
            </div>

        </div>
    </section>
<?php
include('footer.php');
?>