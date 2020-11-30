<?php
include('DBConnection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>NewsFeed</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
    <header id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_top">
                    <div class="header_top_left">
                        <ul class="top_nav">
                            <li><a href="<?php if (isset($dir)) echo $dir?>index.php">Home</a></li>
                            <li><a href="<?php if (isset($dir)) echo $dir?>contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <div class="header_top_right">
                        <p>
                            <a href="rss.php"><img src="images/rss.png" width="16" height="16"/></a>
                        </p>

                        <p>
                            <?php
                            echo date("Y/m/d");
                            ?>
                        </p>
                        <?php
                        $d=isset($dir) ? $dir : "";
                        if (!isset($_SESSION['user'])) {
                            echo '
                        <p>
                            <a id=login_btn href= '. $d . 'login.php style="color:#fff"> Login</a>
                        </p>
                        <p>
                            <a  id=login_btn href='. $d. 'register.php style="color:#fff"> Register</a>
                        </p>
                        ';
                        }else{
                        echo '
                        <p>
                            <a href="profile.php" style="color:#fff;">'.$_SESSION['user']['user_name'].'</a>
                        </p>
                        <p>
                            <a href="logout.php" style="color:#fff;">logout</a>
                        </p>
                        ';
                        }
                        ?>


                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_bottom">
                    <div class="logo_area"><a href="<?php if (isset($dir)) echo $dir?>index.php" class="logo"><img src="<?php if (isset($dir)) echo $dir?>images/logo.jpg" alt=""></a></div>
                    <div class="add_banner"><a href="#"><img src="<?php if (isset($dir)) echo $dir?>images/add_img.jpg" alt=""></a></div>
                </div>
            </div>
        </div>
    </header>
    <section id="navArea">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav main_nav">
                    <li class="active"><a href="<?php if (isset($dir)) echo $dir?>index.php"><span class="fa fa-home desktop-home"></span><span
                                    class="mobile-show">Home</span></a></li>
                    <?php
                    $sql = "SELECT * FROM news_type";
                    $result = mysqli_query($conn, $sql);
                    if (!isset($dir))
                         $dir="";
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
      <li><a href='.$dir.'category.php?id='.$row['id'].'>' . $row["name"] . '</a></li>
  ';
                        }
                    }
                    ?>

                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </section>
