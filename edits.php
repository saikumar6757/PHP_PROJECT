<?php
session_start();
require 'includes/database.php';

if(isset($_POST["submit"])){
   
   $cid = $_POST['cid'];
   $post = $_POST['post']; 
   $user= $_POST['user'];
   $comments = $_POST['comments'];
                          
    ?>
         <form action="edits.php" method="post" >
         <input type="hidden" name ="cid" value="<?php echo $cid?>">
         <input type="hidden" name ="user" value="<?php echo $user?>">
         <input type="hidden" name ="post" value="<?php echo $post?>">
         <textarea name="comments" cols="30" rows="3"><?php echo $comments?></textarea>
         <button type="submit" name="edit">SAVE</button> <br>
         </form>
   <?php
}

if(isset($_POST['edit'])){
    
            $cid = $_POST['cid'];
            $post = $_POST['post']; 
            $user= $_POST['user'];
            $comments = $_POST['comments'];
    
            $sql="UPDATE comments SET comments = '$comments' where id = $cid"; 
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
               header('Location:edits.php?error=sqlerror');
               exit();
             }else{
                $result=mysqli_stmt_execute($stmt);
                header("Location:user_posts.php?succes=comment_updated!");
                exit();
            }
}

?>