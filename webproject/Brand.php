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
$sql="SELECT * from produse";//aici sterg where
$stil=$con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Brand.css">
<script src="https://kit.fontawesome.com/95b3d70b58.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="col-3 menu">
    <form action="brandform.php" method="post">
      <ul>
        <li>Nike
            <label class="switch">
                <input type="radio" name="brand" value="nike">
                <span class="slider round"></span>
              </label>
        </li>
        <li>Musette
            <label class="switch">
                <input type="radio" name="brand" value="musette">
                <span class="slider round"></span>
              </label>
        </li>
        <li>Boss
            <label class="switch">
                <input type="radio" name="brand" value="hugo boss">
                <span class="slider round"></span>
              </label>
        </li>
        <li>Tommy
            <label class="switch">
                <input type="radio" name="brand" value="tommy hilfiger">
                <span class="slider round"></span>
              </label>
        </li>
      </ul>
      <input type="submit" name='submit' value="Salveaza brand">
    </form>
    </div>
  
    <div class="col-9">
      <!-- <h1>Produse sortate functie de sezon</h1>
      <p>Chania is the capital of the Chania region on the island of Crete. The city can be divided in two parts, the old town and the modern city.</p>
      <p>Resize the browser window to see how the content respond to the resizing.</p> -->
      <?php
        
        while($product=mysqli_fetch_assoc($stil)): 
        
      ?>
        <div class="gallery1">
            <a href="paginaprodus.php?id=<?php echo $product['id'] ?>">
                <img src="<?= $product['imagine'];?>" alt="<?= $product['titlu'];?>" width="600" height="400">
            </a>
        <?php echo $product['titlu'];?>
        
        </div>
        <?php endwhile; ?>
        
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