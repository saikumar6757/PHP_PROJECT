<?php
   require_once "includes/header.php";
?>    

<?php
    //echo $_SESSION["sessionId"]."<br>";
        

    if (isset($_SESSION["sessionId"])) {
      echo "You are logged in!". $_SESSION["sessionId"];
    } else {
        echo "Home";

    }

     
?>



<?php
   require_once "includes/footer.php";
?>  




 