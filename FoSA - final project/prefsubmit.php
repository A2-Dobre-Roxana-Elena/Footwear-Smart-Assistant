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



if(isset($_POST['submit'])){
    $brand = $_POST['brand'];
    $stil=$_POST['stil'];
    $sezon=$_POST['sezon'];
    $culoare=$_POST['culoare'];
    $gen=$_POST['gen'];
    $idd=$_SESSION['id'];

    $query_bd="select * from preferinte where id_user='$idd'";
    $result_bd=$con->query($query_bd);
    
    if(!empty($brand) && !empty($stil) && !empty($sezon) && !empty($culoare) && !empty($gen)){
      if($result_bd->num_rows<1){
        $query = "INSERT INTO preferinte (id_user,brand,stil,sezon,gen,culoare) VALUES('$idd','$brand','$stil','$sezon','$gen','$culoare')";
        $result = $con->query($query);
        if($result){
          header("location:Acasa.php");
          echo '<scrip>alert("Preferences are inserted successfully")</script>';
        }else{
          header("location:preferences.php");
          echo '<script>alert("Detalii incorecte")</script>';
        } 
      }else{
        $query = "UPDATE preferinte set brand='$brand',stil='$stil',sezon='$sezon',gen='$gen',culoare='$culoare' where id_user='$idd'";
        $result = $con->query($query);
        if($result){
          header("location:ContUtilizator.php");
          echo '<scrip>alert("Preferences are inserted successfully")</script>';
        }else{
          header("location:preferences.php");
          echo '<script>alert("Detalii incorecte")</script>';
        } 
      }
         
      }
      else{
        header("location:preferences.php");
          echo '<script>alert("Adauga toate preferintele")</script>';
      }
    }
    else{
      header("location:preferences.php");
        echo '<script>alert("Alegeti preferinte!")</script>';
    }
?>