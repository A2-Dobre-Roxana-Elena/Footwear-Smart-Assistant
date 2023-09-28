<?php
$DATABASE_HOST='localhost';
$DATABASE_USER='root';
$DATABASE_PASS='';
$DATABASE_NAME='formular';

$con=mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit('Eroare de conectare la baza de date' . mysqli_connect_error());
}

if(isset($_POST['submit']) && isset($_GET['id'])){
    $recenzie = $_POST['star'];
    $idd=$_SESSION['id'];
    $prod_id=mysqli_real_escape_string($con,$_GET['id']);


    $query_bd="select * from recenzii where id_produs='$prod_id'";
    $result_bd=$con->query($query_bd);
    
    if(!empty($recenzie)){
      if($result_bd->num_rows<1){
        $query = "INSERT INTO recenzii (id_produs,recenzie) VALUES('$prod_id','$recenzie')";
        $result = $con->query($query);
        if($result){
          header("location:Statistici.php");
          echo '<scrip>alert("Recenzie inserata")</script>';
        }else{
          echo '<script>alert("Detalii incorecte")</script>';
        } 
      }else{
        $query = "UPDATE recenzii set recenzie='$recenzie' where id_produs='$prod_id'";
        $result = $con->query($query);
        if($result){
          header("location:Statistici.php");
          echo '<scrip>alert("Update recenzii")</script>';
        }else{
          echo '<script>alert("Detalii incorecte")</script>';
        } 
      }
         
      }
      else{
          echo '<script>alert("Adauga recenzie")</script>';
      }
    }
    else{
        echo '<script>alert("Alegeti preferinte!")</script>';
    }
?>