<?php
$dir='';
include('header.php');

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    if ($email && $password) {
        $sql = "SELECT * FROM users WHERE  email_address =";
        $sql .= '"' . $email . '" LIMIT 1';

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            $error = 'error' . mysqli_error($conn);
        } else {
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] == $password) {
                $success = 'logged in successfully  ';

                $_SESSION['user']=$row;
                header("Location: http://localhost/news/index.php"); /* Redirect browser */
    exit();
            } else {
                $error = 'Password not Correct';
            }

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
                        <h2>Login</h2>

                        <form action="login.php" method="post" class="contact_form">
                            <input class="form-control" type="email" name="email" placeholder="email*" old="">
                            <input class="form-control" type="password" name="password" placeholder="password"
                                   style="margin-bottom: 20px;">
                            <input type="submit" name="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <a href="forget_password.php" style="color: blue;">Forget password?</a>
    </section>
<?php
include('footer.php');
?>