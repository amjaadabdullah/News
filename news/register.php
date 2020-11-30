<?php
$dir='';
include('header.php');

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $name = $_POST['name'] . $_POST['last_name'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $cPassword = $_POST['password_confirmation'];

    if ($password) {
        if ($password == $cPassword) {
            if ($email && $name && $phone && $address) {
                $sql = "INSERT INTO users (user_name,phone_number,email_address,address,password)" . " VALUES" . "('$name','$phone','$email','$address','$password')";

                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    $error = 'error' . mysqli_error($conn);
                } else {
                    $sql = "SELECT * FROM users WHERE  email_address =";
                    $sql .= '"' . $email . '" LIMIT 1';

                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        $error = 'error' . mysqli_error($conn);
                    } else {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['user'] = $row;

                        header("Location: http://localhost/news/index.php"); /* Redirect browser */
                        exit();
                    }
                }
            } else {
                $error = 'password not matching';
            }
        } else {
            $error = 'all fields are required';
        }
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
                        <h2>Register</h2>
                        <form action="register.php" class="contact_form" method="post">

                            <input class="form-control col-md-3" type="text" name="name" placeholder="First Name*">
                            <input class="form-control col-md-3" type="text" name="last_name" placeholder="Last Name*">
                            <input class="form-control" type="email" name="email" placeholder="email*"
                                   autocomplete="false">
                            <input class="form-control" type="text" name="phone" placeholder="Phone Number*">
                            <input class="form-control" type="text" name="address" placeholder="Address*">
                            <input class="form-control" type="password" name="password" placeholder="password"
                                   style="margin-bottom: 20px;" autocomplete="false">
                            <input class="form-control" type="password" name="password_confirmation"
                                   placeholder="password Confirmation"
                                   style="margin-bottom: 20px;">
                            <input type="submit" name="submit" value="Rigster">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php
include('footer.php');
?>