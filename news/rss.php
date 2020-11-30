<?php
include "DBConnection.php";
header( "Content-type: text/xml");

echo "<?xml version='1.0' encoding='UTF-8'?>
 <rss version='2.0'>
 <channel>
 <title>Today news | RSS</title>
 <link>/</link>
 <description>Cloud RSS</description>
 <language>en-us</language>";

$sql = "SELECT * FROM news_data LIMIT 5";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<item>
   <title>'.$row['title'].'</title>
   <link>http://localhost/news/single_page.php?id='.$row['id'].'</link>
   <description>'.$row['text'].'</description>
   </item>';
    }
}
echo "</channel></rss>";

?>