<?php
include ('DBConnection.php');
session_start();
 $id=$_GET['id'];
if (isset($_SESSION['user'])){
    if (isset($_POST['submit'])){
        $text=$_POST['text'];
        $user_id=$_SESSION['user']['id'];
        if ($text){
            $sql = "INSERT INTO comments (text,news_id,user_id)" . " VALUES" . "('$text','$id','$user_id')";

            $result = mysqli_query($conn, $sql);
            if (!$result) {
                $error = 'error' . mysqli_error($conn);
            } else {
                $success = 'Comment added successfully ';
                header("Location: http://localhost/news/single_page.php?id=".$id); /* Redirect browser */
                exit();
            }
        }else{
            $error='all fields are required';
        }
    }
}else{
    $_SESSION['error']='Please Login First';
    header("Location: http://localhost/news/single_page.php?id=".$id); /* Redirect browser */
    exit();
}