<?php
session_start();
$DATABASE_HOST='localhost';
$DATABASE_USER='root';
$DATABASE_PASS='';
$DATABASE_NAME='formular';

$con=mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit('Eroare de conectare la baza de date' . mysqli_connect_error());
}

//log-in
if(isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['new'])){
    $email = mysqli_real_escape_string($con, $_POST["mail"]);  
    $password = mysqli_real_escape_string($con, $_POST["pass"]); 
    $query = "SELECT * FROM utilizatori WHERE mail = '$email'";  
    $result = mysqli_query($con, $query);  
    if(mysqli_num_rows($result) > 0)  
        {  
            while($row = mysqli_fetch_array($result))  
            {  
                if(password_verify($password, $row["pass"]))  
                {  
                    //return true;                    
                    if($stmt=$con->prepare("UPDATE utilizatori set pass=? where mail='$email'")){
                        $pass=password_hash($_POST['new'],PASSWORD_DEFAULT);
                        $stmt->bind_param('s',$pass);
                        $stmt->execute();
                        echo 'Schimbare cu succes!';
                        header("location:Log-in.html");
                    }
                    else
                    {
                        echo 'Eroare!';
                    }
                    $stmt->close(); 
                }  
                else  
                {  
                    //return false;  
                    echo '<script>alert("Parola incorecta")</script>';//parola incorecta  
                }  
            }  
        }  
        else  
        {  
            echo '<script>alert("Detalii incorecte")</script>';  
        } 
}


?>