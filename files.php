<?php
    session_start();
?>
<div>     
<h1>Post Something!</h1>



<form action="upload.php" method="post" enctype = "multipart/form-data">
    <input type="text" name="text" placeholder="share your thoughts!"> <br>
    <input type="file" name="file">
    <button type="submit" name="submit">UPLOAD</button>
    
</form>
</div> 


<div>     
<h1>User's Posts!</h1>



<form action="user_posts.php" method="post" >
    <button type="submit" name="submit">EXPLORE</button>
    
</form>
</div> 