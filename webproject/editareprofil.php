<?php
session_start();
$DATABASE_HOST='localhost';
$DATABASE_USER='root';
$DATABASE_PASS='';
$DATABASE_NAME='formular';

$idd=$_SESSION['id'];

$con=mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit('Eroare de conectare la baza de date' . mysqli_connect_error());
}


if(isset($_POST['fname'])){
    if($stmt=$con->prepare("UPDATE utilizatori set nume=? where id='$idd'")){
        $stmt->bind_param('s',$_POST['fname']);
        $stmt->execute();
        '<script>alert("Modificat cu succes!")</script>';
        header("location:ContUtilizator.php");
    }
    else
    {
        echo 'Eroare!';
    }
    $stmt->close();
}

if(isset($_POST['sname'])){
    if($stmt=$con->prepare("UPDATE utilizatori set prenume=? where id='$idd'")){
        $stmt->bind_param('s',$_POST['sname']);
        $stmt->execute();
        header("location:ContUtilizator.php");
        '<script>alert("Modificat cu succes!")</script>';
    }
    else
    {
        echo 'Eroare!';
    }
    $stmt->close();
}

if(isset($_POST['mail'])){
    if($stmt=$con->prepare("UPDATE utilizatori set mail=? where id='$idd'")){
        $stmt->bind_param('s',$_POST['mail']);
        $stmt->execute();
        header("location:ContUtilizator.php");
        '<script>alert("Modificat cu succes!")</script>';
    }
    else
    {
        echo 'Eroare!';
    }
    $stmt->close();
}

?>