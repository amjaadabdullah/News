<?php
$dir='';
include('header.php');

if (isset($_POST['submit'])) {

    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $code = $_POST['code'];
    $email=$_SESSION['re-email'];

    if ($cpassword && $password) {
                    $sql = "UPDATE users SET ";
            $sql .= "password=" . "'$password'";
            $sql .= ' WHERE email_address="' . $email.'" AND attribute='.$code;

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            $error = 'error' . mysqli_error($conn);
        } else {

                $success = 'Password Updated  ';
             

        }
    } else {
        $error = 'all fields are required';
    }

}
?>
    <section id="contentSection">
        <div class="row offset-md-3">
            <?php
            if (isset($error)) {
                echo '<h4 style="color: red;">' . $error . '</h4 >';
            }
            if (isset($success)) {
                echo '<h4 style="color: green;">' . $success . '</h4 >';
            }
            ?>
            <div class="col-lg-8 col-md-8 col-sm-8 ">
                <div class="left_content">
                    <div class="contact_area">
                        <h2>Reset Password</h2>
                        <h3>We send code to your email please enter it to update password</h3>
                        <form action="reset_password.php" method="post" class="contact_form">
                            <input class="form-control col-md-8" type="text" name="code" placeholder="Reset Code*" old="">
                            <input class="form-control col-md-8" type="text" name="password" placeholder="new Password*" old="" autocomplete="false">
                            <input class="form-control col-md-8" type="text" name="cpassword" placeholder="confirm password" autocomplete="false" 
                                   style="margin-bottom: 20px;">
                            <input type="submit" name="submit" value="reset password">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php
include('footer.php');
?>