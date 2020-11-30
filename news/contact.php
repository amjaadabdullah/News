<?php
include ('header.php');

if (isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $text=$_POST['text'];
    if ($text && $name && $email){
        $sql = "INSERT INTO messages (text,name,email)" . " VALUES" . "('$text','$name','$email')";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            $error = 'error' . mysqli_error($conn);
        } else {
            $success = 'Message sent successfully ';
        }
    }else{
        $error='all fields are required';
    }
}
?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>Contact Us</h2>
              <?php
              if (isset($error)) {
                  echo '<h4 style="color: red;">' . $error . '</h4 >';
              }
              if (isset($success)) {
                  echo '<h4 style="color: green;">' . $success . '</h4 >';
              }
              ?>
            <form action="contact.php" method="post" class="contact_form">
              <input class="form-control" type="text" name="name" placeholder="Name*">
              <input class="form-control" type="email" name="email" placeholder="Email*">
              <textarea class="form-control" cols="30" rows="10" name="text" placeholder="Message*"></textarea>
              <input type="submit" name="submit" value="Send Message">
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>
  <?php
  include ('footer.php');
  ?>