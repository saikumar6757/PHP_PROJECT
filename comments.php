<?php
session_start();
$id = $_SESSION["sessionId"];

if(isset($_POST["submit"])){
   
   //Add database connection
        require 'includes/database.php';
        $postid = $_POST['post_id'];
        $text = $_POST['text'];
        
     if(empty($text)) {
     header("Location:user_posts.php?error=emptyfields");
     exit();
    } else {
            $sql='INSERT INTO comments(post_id, user_id, comments) VALUES(?, ?, ?)';
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
               header('Location:user_posts.php?error=sqlerror');
               exit();
             }else{
                    mysqli_stmt_bind_param($stmt, "sss", $postid, $id, $text);
                    $result=mysqli_stmt_execute($stmt);
                        header("Location:user_posts.php?succes=commented!");
                        exit();
            }
     }
}
?>