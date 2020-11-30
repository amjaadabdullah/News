<?php
$dir='';
include('header.php');

// Include PHPMailer library files



if (isset($_POST['submit'])) {
require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $email = $_POST['email'];

    if ($email) {
        $_SESSION['re-email']=$email;
        $mail->isSMTP();
        //$mail->SMTPDebug = 4;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
  $mail->Port = 465; 

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'todaynews680@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'todaynews123456';

       $mail->setFrom('todaynews680@gamil.com', 'TodayNews');
        $mail->addReplyTo('todaynews680@gamil.com', 'TodayNews');

// Add a recipient
$mail->addAddress($email);

// Add cc or bcc 
$mail->addCC('todaynews680@gamil.com');
$mail->addBCC('todaynews680@gamil.com');

// Email subject
$mail->Subject = 'reset password Code';

// Set email format to HTML
$mail->isHTML(true);

// Email body content
$code=rand(0,10000);

           $sql = 'UPDATE users SET ';
            $sql .= 'attribute=' . "'$code'";
            $sql .= ' WHERE email_address="' . $email.'"';

        $result = mysqli_query($conn, $sql);
         if (!$result) {
            $error = 'error' . mysqli_error($conn);
        } else {

                $success = 'Password Updated  ';
             

        }

$mailContent = '
    <h2>Reset Password Code</h2>
    <p>Code ='.$code.'</p>';
$mail->Body = $mailContent;

// Send email
if (!isset($error)) {
  if(!$mail->send()){
    $error= 'Message could not be sent.';
    $error .= 'Mailer Error: ' . $mail->ErrorInfo;
}else{  
    header("Location: http://localhost/news/reset_password.php"); /* Redirect browser */
    exit();      
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
                        <h2>Enter Your Email</h2>

                        <form action="forget_password.php" method="post" class="contact_form">
                            <input class="form-control" type="email" name="email" placeholder="email*" old="">
                            <input type="submit" name="submit" value="Send Reset Code">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    
    </section>
<?php
include('footer.php');
?>