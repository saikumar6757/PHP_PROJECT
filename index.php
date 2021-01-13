<?php
   require_once "includes/header.php";
?>    

<?php
    

    if (isset($_SESSION["sessionId"])) {
      //echo "You are logged in!";
        
      header("Location:files.php");  
      //session_destroy();
    } else {
        echo "Login First!!";

    }

    

?>    
     







<?php
   require_once "includes/footer.php";
?>  




 