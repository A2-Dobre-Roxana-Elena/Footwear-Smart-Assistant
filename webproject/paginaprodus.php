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

    $prod_id="";
    if(isset($_GET['id'])){
        $prod_id=mysqli_real_escape_string($con,$_GET['id']);
    }
    $particular_prod="select * from produse where id='$prod_id'";
    $prod_result=mysqli_query($con,$particular_prod);
    $row=mysqli_fetch_assoc($prod_result);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="PagProdus.css">
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


<div class="row">
    <div class="col-1 menu">
        <div class="imagine">
            <img src="<?= $row['imagine'];?>" alt="<?= $row['titlu'];?>" >
        </div>
    </div>
  
    <div class="col-2">
        <div class="descriere">
            <h1><?php echo $row['titlu']; ?></h1>
            <p2><p1><strong>Brand: </strong></p1><?php echo $row['brand']; ?></p2><br>
            <p2><p1><strong>Stil Vestimentar: </strong></p1><?php echo $row['stil']; ?></p2><br>
            <p2><p1><strong>Sezon: </strong></p1><?php echo $row['sezon']; ?> </p2><br>
            <p2><p1><strong>Culoare: </strong></p1> <?php echo $row['culoare']; ?> </p2><br>
            <p2><p1><strong>Gen: </strong></p1> <?php echo $row['gen']; ?> </p2><br>
            <div class="link">
                <p3>Cumpara produsul de pe site</p3>
                <a href="<?=$row['link'];?>">
                    <i class="fa-solid fa-square-up-right"></i>
                </a>
            </div>
            <p2><p1><strong>Descriere: </strong></p1><?php echo $row['descriere']; ?></p2><br>
        </div>
    </div>
</div>


</body>
</html>
<?php
}else{
    header("location:Start.html");
    exit();
}
?>