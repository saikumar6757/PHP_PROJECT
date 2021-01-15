<?php
session_start();
$id = $_SESSION["sessionId"];
$username = $_SESSION["sessionUser"];

if(isset($_POST['submit'])){
   
   //Add database connection
    require 'includes/database.php';
    $text = $_POST['text'];
    $name = $_FILES['file']['name'];
    
    
    if(empty($text) && empty($name)) {
     header("Location:files.php?error=emptyfields");
      exit();
    }elseif (empty($name)){
            $sql='INSERT INTO form_data (user_id, user_post, image_name) VALUES( ?, ?, ?)';
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
               header('Location:files.php?error=sqlerror');
               exit();
             }else{
                    mysqli_stmt_bind_param($stmt, "sss", $id, $text, $name);
                    $result=mysqli_stmt_execute($stmt);
                        header("Location:files.php?succes=uploaded!");
                        exit();
            }
    }elseif(empty($text)){
        $file = $_FILES['file'];
        $name = $_FILES['file']['name']; //Find file name
        $tmp_name = $_FILES['file']['tmp_name']; //Temp loc
        $size = $_FILES['file']['size']; //Find file size
        $error = $_FILES['file']['error']; //Find errors

        //Explode from punctuation mark
        $tempExtension = explode('.', $name);

        $fileExtension = strtolower(end($tempExtension));

        //Allowed extensions
        $isAllowed = array('jpg', 'jpeg', 'png', 'pdf');

        // 0 = no error - 1 = error
        if (in_array($fileExtension, $isAllowed)) {
            if ($error === 0) {
                if ($size < 100000) {
                    $fileDestination = "uploads/" . $name;
                    move_uploaded_file($tmp_name, $fileDestination);
                    header("Location: files.php?uploadedsuccess");

                    $sql='INSERT INTO form_data (user_id, user_post, image_name) VALUES( ?, ?, ?)';
                    $stmt=mysqli_stmt_init($conn);
                    if(mysqli_stmt_prepare($stmt, $sql)){
                        mysqli_stmt_bind_param($stmt, "sss", $id, $text, $name);
                        $result=mysqli_stmt_execute($stmt);
                        header("Location:files.php?succes=uploaded!");
                        exit();    
                     }

                } else {
                    echo "Sorry, your file size is too big!";
                }
            } else {
                echo "Sorry, there was an erro! Try it again";
            }
        } else {
            echo "Sorry, your file type is not accepted";
        }

    } else{
            
            
        $file = $_FILES['file'];
        $name = $_FILES['file']['name']; //Find file name
        $tmp_name = $_FILES['file']['tmp_name']; //Temp loc
        $size = $_FILES['file']['size']; //Find file size
        $error = $_FILES['file']['error']; //Find errors

        //Explode from punctuation mark
        $tempExtension = explode('.', $name);

        $fileExtension = strtolower(end($tempExtension));

        //Allowed extensions
        $isAllowed = array('jpg', 'jpeg', 'png', 'pdf');

        // 0 = no error - 1 = error
        if (in_array($fileExtension, $isAllowed)) {
            if ($error === 0) {
                if ($size < 100000) {
                    $fileDestination = "uploads/" . $name;
                    move_uploaded_file($tmp_name, $fileDestination);
                    header("Location: files.php?uploadedsuccess");

                    $sql='INSERT INTO form_data (user_id, user_post, image_name) VALUES( ?, ?, ?)';
                    $stmt=mysqli_stmt_init($conn);
                    if(mysqli_stmt_prepare($stmt, $sql)){
                        mysqli_stmt_bind_param($stmt, "sss", $id, $text, $name);
                        $result=mysqli_stmt_execute($stmt);
                        header("Location:files.php?succes=uploaded!");
                        exit();    
                     }

                } else {
                    echo "Sorry, your file size is too big!";
                }
            } else {
                echo "Sorry, there was an erro! Try it again";
            }
        } else {
            echo "Sorry, your file type is not accepted";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}
                   
?>