
  <div>
    <h1>User's Posts!</h1>
</div>

 <?php
    session_start();
    $sessionUser = $_SESSION["sessionUser"];
    require 'includes/database.php';

        $sql = "SELECT * FROM form_data";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:user_posts.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rowcount=mysqli_num_rows($result);
                        
            if($rowcount>0){
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
                $posts = $row['user_post'];
                $files = 'uploads/'.$row['image_name'];
                
                $sql = "SELECT username FROM users where id = (select user_id from form_data where id = $id )";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location:user_posts.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_execute($stmt);
                    $results = mysqli_stmt_get_result($stmt);
                    if($users = mysqli_fetch_assoc($results)){
                        if($users == true){
                            $username = $users['username'];
                        }
                }
            }
                echo $username . "  posted :: " .$posts . "<br>";
                ?>
            <img src="<?php echo $files; ?>" alt="" /> <br>
            <div>
            <form action="comments.php" method="post" >
            <input type="text" name="text" placeholder="Comment here!"> <br>
            <input type="hidden" name ="post_id" value ="<?php echo $id ?>" >
            <button type="submit" name="submit">COMMENT</button>            
            <p>Comments!!</p>            
            </form>
            </div>
            
           
            <?php
                
                $sql = "SELECT * FROM comments WHERE post_id = $id";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location:user_posts.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_execute($stmt);
                    $results = mysqli_stmt_get_result($stmt);
                    $rowcount=mysqli_num_rows($results);
                    
                    if($rowcount>0){
                    while($row = mysqli_fetch_assoc($results)) {
                            $user= $row['user_id'];
                            $comments = $row['comments'];
                            $cid = $row['id'];
                            $post = $row['post_id'];
                        
                            $sql1 = "SELECT username FROM users where id = $user";
                            $stmt1 = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                                header("Location:user_posts.php?error=sqlerror");
                                exit();
                            } else {
                                mysqli_stmt_execute($stmt1);
                                $results1 = mysqli_stmt_get_result($stmt1);
                                if($users = mysqli_fetch_assoc($results1)){
                                    if($users == true){
                                        $username = $users['username'];
                                    }
                                }
                            }
                            
                             
                            echo $username . " commented as : " . $comments . "<br>";
                        
                               
                            if($username === $sessionUser){
                        ?>
                                    <div>
                                    <form  class="edit-btn" action="edits.php" method="post" >
                                    <input type="hidden" name ="cid" value="<?php echo $cid ?>">
                                    <input type="hidden" name ="user" value="<?php echo $user ?>">
                                    <input type="hidden" name ="post" value="<?php echo $post ?>">
                                    <input type="hidden" name ="comments" value="<?php echo $comments ?>">
                                    <button type="submit" name="submit">EDIT</button> 
                                    </form>
                                    </div>
                                    <?php
                                     
                              }
                        
                         }
                        
                    }else{
                             echo "No Comments Yet!!";
                         }
                    
                }
                                
                
            ?>   <br><br>   
            
            <?php }
        } else {?>
            <p>No Posts found...</p>
       <?php }
        }
 
?>
     
    
        
    