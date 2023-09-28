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

if(isset($_SESSION['id'])){
    $idd=$_SESSION['id'];
    $query="select * from utilizatori where id=$idd";
    $result=mysqli_query($con,$query);

    $querypref="select * from preferinte where id_user='$idd'";
    $resultpref=mysqli_query($con,$querypref);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="ContUtilizator.css">
<script src="https://kit.fontawesome.com/95b3d70b58.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="grid-container">
    <div class="grid-item item1"></div>
    <a href="Acasa.php">
        <div class="grid-item item2">FoSa</div>
    </a> 
    <div class="grid-item item3"></div> 
    <a href="About.html">
        <div class="grid-item item4"><i class="fa-solid fa-circle-info"></i> Despre</div>
    </a>
    <div class="grid-item item5"></div>
    <a href="Statistici.php">
        <div class="grid-item item6"><i class="fa-solid fa-chart-column"></i> Statistici</div>
    </a>
    <a href="Help.html">
        <div class="grid-item item7"><i class="fa-solid fa-circle-question"></i> Ajutor</div>
    </a>
    <div class="grid-item item8"></div>
    <a href="ContUtilizator.php">
        <div class="grid-item item9"><i class="fa-solid fa-user"></i> Cont Utilizator</div>
    </a>
</div>

<p><strong>Detalii aferente contului dumneavoastra:</strong></p>
<table>
    <?php
    while($rows=mysqli_fetch_assoc($result)){
    ?>
    <tr>
    <td><b>Nume
    </b></td>
    <td>
        <form action="editareprofil.php" method="post">
           <input type="text" id="fname" name="fname" value="<?php echo $rows['nume']; ?>">
        </form></td>
    
    <td>
        <div class="tooltip"><i class="fa-solid fa-pen-to-square"></i>
            <span class="tooltiptext">Modificati cuvantul dorit</span>
        </div>
    </td>
    
    </tr>
    <tr>
    <td><b>Prenume</b></td>
    <td>
        <form action="editareprofil.php" method="post">
           <input type="text" id="sname" name="sname" value="<?php echo $rows['prenume']; ?>">
        </form></td>
    <td>
        <div class="tooltip"><i class="fa-solid fa-pen-to-square"></i>
            <span class="tooltiptext">Modificati cuvantul dorit</span>
        </div>
    </td>
    </tr>
    <tr>
    <td><b>Adresa de email</b></td>
    <td>
        <form action="editareprofil.php" method="post">
           <input type="text" id="mail" name="mail" value="<?php echo $rows['mail']; ?>">
        </form>
    </td>
    <td>
        <div class="tooltip"><i class="fa-solid fa-pen-to-square"></i>
            <span class="tooltiptext">Modificati cuvantul dorit</span>
        </div>
    </td>
    </tr>
    <tr>
    <td><b>Parola</b></td>
    <td>*****</td>
    <td>
        <div class="tooltip"><a href="SchimParola.html"><i class="fa-solid fa-pen-to-square"></i></a>
            <span class="tooltiptext">Veti fi redirectionat pe pagina "Schimbati Parola"</span>
        </div>
    </td>
    </tr>
       <?php }
       ?>
</table>

<div class="incercare" >
    <p><strong>Preferintele dumneavoastra sunt:</strong></p><a href="preferences.php" class="dreapta"><i2 class="fa-solid fa-pen-to-square"></i2></a> 
     <div class="tooltip">
        <i3 class="fa-solid fa-pen-to-square"></i3>
        <span class="tooltiptext">Dati click pentru a edita Preferintele</span>
    </div> 
</div>

<table>
    <?php
    while($rowspref=mysqli_fetch_assoc($resultpref)){
    ?>
    <tr>
    <td><b>Brand
    </b></td>
    <td>
        <?php echo $rowspref['brand']; ?>
        </td>
    </tr>
    <tr>
    <td><b>Stil vestimentar</b></td>
    <td>
        <?php echo $rowspref['stil']; ?>
        </td>
    </tr>
    <tr>
    <td><b>Sezon </b></td>
    <td>
        <?php echo $rowspref['sezon']; ?>
    </td>
    </tr>
    <tr>
    <td><b>Culoare </b></td><td>
        <?php echo $rowspref['culoare']; ?>
    </td></tr>
       <?php }
       ?>
</table>

<button><a href="logout.php">Log-out</a></button>
</body>
</html>
<?php
}else{
    header("location:Start.html");
    exit();
}
?>