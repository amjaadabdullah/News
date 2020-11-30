<?php
$dir='';
include('header.php');
if (isset($_GET['id'])){
    $sql = "SELECT * FROM news_data where id=".$_GET['id'].' LIMIT 1';
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
            $post = mysqli_fetch_assoc($result);
        $sql = "SELECT * FROM news_type where id=".$post['type'].' LIMIT 1';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $type = mysqli_fetch_assoc($result);
        }
        $sql = "SELECT * FROM news_resource where id=".$post['res_id'].' LIMIT 1';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $res = mysqli_fetch_assoc($result);
        }
        }else{
        header("Location: http://localhost/news/pages/404.php"); /* Redirect browser */
        exit();
    }
}else{
    header("Location: http://localhost/news/pages/404.php"); /* Redirect browser */
    exit();
}


?>

    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="single_page">
<?php

                        if (isset($_SESSION['error'])) {
                            echo "<h4 class=col-md-12  style=color:red;>".$_SESSION['error']."</h1>";
                            $_SESSION['error']='';
                        }
                        ?>
                        <h1><?php echo $post['title']?></h1>
                    

                        <div class="post_commentbox">
                            <span><i class="fa fa-calendar"></i>6:49 AM</span> <a href="#"><i class="fa fa-tags"></i><?php echo $type['name']?></a>
                        </div>
                        <div class="single_page_content" style="margin-bottom: 30px;">
                            <img class="img-center" src=http://localhost/news/admin/<?php echo $post["attachment"] ?> alt="">
                            <p><?php echo $post['text']?></p>
                            <h4>Source :</h4>
                            <a  href=http://<?php echo $res['link']?>><?php echo $res['name']?></a>
                        </div>
                        <h3 style="margin-top: 20px;">Comments</h3>
                        <div class="comments">
                            <ul>
                                <?php
                                $sql = "SELECT * FROM comments,users where news_id=".$post['id']." AND users.id=comments.user_id";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo '
                                        <li class="row">

                                    <div class="col-md-12">
                                        <b>'.$row['user_name'].'</b>
                                    </div>
                                    <div class="col-md-12">
                                        <p>'.$row['text'].'</p>
                                    </div>
                                </li>
                                        ';
                                    }
                                }


                              ?>

                                <li class="row" style="margin-bottom:20px;">
                                    <div class="col-md-12">
                                        <b>Your comment:</b>
                                    </div>
                                    <div class="col-md-12">
                                        <form action=addComment.php?id=<?php echo $post['id']?> method="post" class="contact_form">
                                            <input class="form-control" name="text" type="text" old="">
                                            <input type="submit" name="submit" value="Add Comment">
                                        </form>
                                    </div>
                                </li>
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