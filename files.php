<?php
    session_start();
    //require_once "database.php";
    //require_once "register-inc.php";
?>
<div>     
<h1>Post Something!!!</h1>



<form action="upload.php" method="post" enctype = "multipart/form-data">
    <input type="text" name="text" placeholder="share your thoughts!"> <br>
    <input type="file" name="file">
    <button type="submit" name="submit">UPLOAD</button>
    
</form>
</div> 



<?php
/*  echo $name = $_FILES['file']['name'] ." <br> "; 
  echo $name = $_FILES['file']['type'] ." <br> "; 
  echo $name = $_FILES['file']['tmp_name'] ." <br> "; 
  echo $name = $_FILES['file']['error']; 
?>
*/