<?php
$dir='';
include('header.php');
?>

<section id="sliderSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="slick_slider">
                <?php
                $sql = "SELECT * FROM news_data LIMIT 5";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
          <div class="single_iteam"> <a href=single_page.php?id='.$row['id'].'> <img src=http://localhost/news/admin/' . $row["attachment"] . ' alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href=single_page.php?id='.$row['id'].'>' . $row["title"] . '</a></h2>
              <p>' . $row["text"] . '</p>
            </div>
          </div>
          ';
                    }
                }

                ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="latest_post">
                <h2><span>Latest post</span></h2>
                <div class="latest_post_container">
                    <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                    <ul class="latest_postnav">
                        <?php
                        $sql = "SELECT * FROM news_data LIMIT 5";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                <li><div class="media"> <a href=single_page.php?id='.$row['id'].' class="media-left"> <img alt="" src=http://localhost/news/admin/' . $row["attachment"] . '> </a>
                  <div class="media-body"> <a href=single_page.php?id='.$row['id'].' class="catg_title">' . $row["title"] . '</a> </div>
                </div>
                </li>
                       ';
                            }
                        }

                        ?>


                    </ul>
                    <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_post_content">
                    <h2><span>Technology</span></h2>
                <?php

                $sql = "SELECT * FROM news_data WHERE type=1 LIMIT 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                
                    <div class="single_post_content_left">
                        <ul class="business_catgnav  wow fadeInDown">
                            <li>
                                <figure class="bsbig_fig"><a href=single_page.php?id='.$row['id'].' class="featured_img"> <img alt=""
                                                                                                               src=http://localhost/news/admin/' . $row["attachment"] . '>
                                        <span class="overlay"></span> </a>
                                    <figcaption><a href=single_page.php?id='.$row['id'].'>' . $row['title'] . '</a></figcaption>
                                </figure>
                            </li>
                        </ul>
                    </div>
                   
                       ';
                    }
                }

                echo '
                             <div class="single_post_content_right">
                        <ul class="spost_nav"> ';
                    $index=0;
                $sql = "SELECT * FROM news_data WHERE type=1 LIMIT 4";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($index!=0) {
                                    echo ' <li>
                                <div class="media wow fadeInDown"><a href=single_page.php?id='.$row['id'].' class="media-left"> <img
                                                alt=""  src=http://localhost/news/admin/' . $row["attachment"] . '> </a>
                                    <div class="media-body"><a href=single_page.php?id='.$row['id'].' class="catg_title"> ' . $row['title'] . '</a></div>
                                </div>
                            </li>
                           ';
                                }
                                $index+=1;

                    }
                }



              ?>
                        </ul>
                        </div>
                </div>
            </div>
        </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
            <h2><span>Notifications</span></h2>
            <div class="latest_post_container">
                <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                <ul class="latest_postnav">
                    <?php
                    $sql = "SELECT * FROM notifications LIMIT 5";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                <li><div class="media"> 
                  <div class="media-body"><img src="images/rss.png" width="24" height="24"> <a  class="catg_title">' . $row["text"] . '</a> </div>
                </div>
                </li>
                       ';
                        }
                    }

                    ?>


                </ul>
                <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_post_content">
                    <h2><span>SPORT</span></h2>
                    <?php

                    $sql = "SELECT * FROM news_data WHERE type=4  LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                
                    <div class="single_post_content_left">
                        <ul class="business_catgnav  wow fadeInDown">
                            <li>
                                <figure class="bsbig_fig"><a href=single_page.php?id='.$row['id'].' class="featured_img"> <img alt=""
                                                                                                               src=http://localhost/news/admin/' . $row["attachment"] . '>
                                        <span class="overlay"></span> </a>
                                    <figcaption><a href=single_page.php?id='.$row['id'].'>' . $row['title'] . '</a></figcaption>
                                </figure>
                            </li>
                        </ul>
                    </div>
                   
                       ';
                        }
                    }

                    echo '
                             <div class="single_post_content_right">
                        <ul class="spost_nav"> ';
                    $index=0;
                    $sql = "SELECT * FROM news_data WHERE type=4 LIMIT 4";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($index!=0) {
                                echo ' <li>
                                <div class="media wow fadeInDown"><a href=single_page.php?id='.$row['id'].' class="media-left"> <img
                                                alt=""  src=http://localhost/news/admin/' . $row["attachment"] . '> </a>
                                    <div class="media-body"><a href=single_page.php?id='.$row['id'].' class="catg_title"> ' . $row['title'] . '</a></div>
                                </div>
                            </li>
                           ';
                            }
                            $index+=1;

                        }
                    }



                    ?>
                    </ul>
                </div>
            </div>
        </div>


    </div>

    </div>
</section>
<?php
include('footer.php')
?>