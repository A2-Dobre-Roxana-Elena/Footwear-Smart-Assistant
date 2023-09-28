<?php
$DATABASE_HOST='localhost';
$DATABASE_USER='root';
$DATABASE_PASS='';
$DATABASE_NAME='formular';

$con=mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit('Eroare de conectare la baza de date' . mysqli_connect_error());
}


//sign-in
if(!isset($_POST['mail'],$_POST['name'],$_POST['pass'],$_POST['pname'])){
    exit('Campuri goale');
}
if(empty($_POST['mail']||empty($_POST['name'])||empty($_POST['pass']))||empty($_POST['pass'])){
    exit('Valori goale');
}



if($stmt=$con->prepare('SELECT id, pass FROM utilizatori WHERE mail=?')){
    $stmt->bind_param('s',$_POST['mail']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows>0)
    {
        echo 'Email deja existent';
    }
    else
    {
        //send data to database
        //criptam parola si adaugam datele in bd daca nu exista deja un utilizator cu acest email
        if($stmt=$con->prepare('INSERT INTO utilizatori(mail, nume, prenume, pass)VALUES(?,?,?,?)')){
            $pass=password_hash($_POST['pass'],PASSWORD_DEFAULT);
            $stmt->bind_param('ssss',$_POST['mail'],$_POST['name'],$_POST['pname'],$pass);
            $stmt->execute();
            echo 'Inregistrat cu succes!';
            header("location:Log-in.html");
        }
        else
        {
            echo 'Eroare!';
        }
        $stmt->close();
    }
}
else
{
    echo 'Eroare2!';
}
$con->close();
?>