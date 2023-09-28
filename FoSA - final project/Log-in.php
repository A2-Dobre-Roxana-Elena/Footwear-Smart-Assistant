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

/*
folosim password verify pt a vedea daca corespund parolele
parola din db fiin criptata
in caz afirmatic utilizatorul e redirectionat catre pg cont utilizator si se retine id, mail in $_SESSION
*/
if(isset($_POST['mail']) && isset($_POST['pass'])){
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
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["mail"]=$row['mail'];  
                    header("location:ContUtilizator.php");  
                    //location homepage sau mai bine cont utilizator
                }  
                else  
                {  
                    //return false;  
                    echo '<script>alert("Parola incorecta")</script>';  
                }  
            }  
        }  
        else  
        {  
            echo '<script>alert("Detalii incorecte")</script>';  
        } 
}


?>