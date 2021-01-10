 $sql="select * from users";
    $result=mysqli_query($conn, $sql);
    $rowcount=mysqli_num_rows($result);
    
    if($rowcount>0){
        while($row=mysqli_fetch_assoc($result)){
            echo $row["username"]. "\n". $row["password"] . '<br>';
        }
    }else{
        echo "no results found";
    }