<?php
$dir='';
include('header.php');
$id=0;
if (isset($_GET['id'])){
    $id=$_GET['id'];
}
?>

    <div class="row">
            <?php
            $sql = "SELECT * FROM news_data WHERE type= ".$id;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-lg-4 col-md-4 col-sm-4" style="margin-bottom: 10px">
          <div class="single_iteam"> <a href=single_page.php?id='.$row['id'].'> <img src=http://localhost/news/admin/' . $row["attachment"] . ' alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href=single_page.php?id='.$row['id'].'>' . $row["title"] . '</a></h2>
              <p>' . $row["text"] . '</p>
            </div>
          </div>
          </div>
          ';
                }
            }

            ?>

    </div>
<?php
include ('footer.php');
?>