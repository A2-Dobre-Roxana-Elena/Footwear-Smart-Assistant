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

$sql1="SELECT * from recenzii where recenzie='1'";
$result1=$con->query($sql1);

$sql2="SELECT * from recenzii where recenzie='2'";
$result2=$con->query($sql2);

$sql3="SELECT * from recenzii where recenzie='3'";
$result3=$con->query($sql3);

$sql4="SELECT * from recenzii where recenzie='4'";
$result4=$con->query($sql4);

$sql5="SELECT * from recenzii where recenzie='5'";
$result5=$con->query($sql5);
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Statistici.css">
<script src="https://kit.fontawesome.com/95b3d70b58.js" crossorigin="anonymous"></script>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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


<canvas id="myChart" style="width: 100%;max-width:1400px;height: 500px; max-height: 1000px;" ></canvas>


<script>
    var xValues = ["★", "★★", "★★★", "★★★★", "★★★★★"];

    var yValues = [<?= $result1->num_rows?>, <?= $result2->num_rows?>,<?= $result3->num_rows?>, <?= $result4->num_rows?>, <?= $result5->num_rows?>];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];
    
    new Chart("myChart", {
      type: "doughnut",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "Sugestiile tale si notele lor"
        }
      }
    });
</script>




<details><summary class="stele1">★</summary>
	<ul>
        <?php
        while($rows1=mysqli_fetch_assoc($result1)):
            $product_id=$rows1['id_produs'];
            $sql_prod="SELECT * from produse where id='$product_id'";
            $result_prod=$con->query($sql_prod);
            $sugestie=mysqli_fetch_assoc($result_prod);
        ?>
	<li> <?php echo $sugestie['titlu']?></li>
    <?php endwhile;
    ?>
	</ul>
</details>

<details><summary class="stele">★★</summary>
	<ul>
	<?php
        while($rows2=mysqli_fetch_assoc($result2)):
            $product_id=$rows2['id_produs'];
            $sql_prod="SELECT * from produse where id='$product_id'";
            $result_prod2=$con->query($sql_prod);
            $sugestie=mysqli_fetch_assoc($result_prod2);
        ?>
	<li> <?php echo $sugestie['titlu']?></li>
    <?php endwhile;
    ?>
	</ul>
</details>
<details><summary class="stele">★★★</summary>
	<ul>
	<?php
        while($rows3=mysqli_fetch_assoc($result3)):
            $product_id=$rows3['id_produs'];
            $sql_prod="SELECT * from produse where id='$product_id'";
            $result_prod3=$con->query($sql_prod);
            $sugestie=mysqli_fetch_assoc($result_prod3);
        ?>
	<li> <?php echo $sugestie['titlu']?></li>
    <?php endwhile;
    ?>
	</ul>
</details>
<details><summary class="stele">★★★★</summary>
	<ul>
    <?php
        while($rows4=mysqli_fetch_assoc($result4)):
            $product_id=$rows4['id_produs'];
            $sql_prod="SELECT * from produse where id='$product_id'";
            $result_prod4=$con->query($sql_prod);
            $sugestie=mysqli_fetch_assoc($result_prod4);
        ?>
	<li> <?php echo $sugestie['titlu']?></li>
    <?php endwhile;
    ?>
	</ul>
</details>
<details><summary class="stele">★★★★★</summary>
	<ul>
	<?php
        while($rows5=mysqli_fetch_assoc($result5)):
            $product_id=$rows5['id_produs'];
            $sql_prod="SELECT * from produse where id='$product_id'";
            $result_prod5=$con->query($sql_prod);
            $sugestie=mysqli_fetch_assoc($result_prod5);
        ?>
	<li> <?php echo $sugestie['titlu']?></li>
    <?php endwhile;
    ?>
	</ul>
</details>

<a href="exportData.php">Export</a>
</body>
</html>
<?php
}else{
    header("location:Start.html");
    exit();
}
?>