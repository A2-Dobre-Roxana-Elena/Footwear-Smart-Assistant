<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/Users/PC/Downloads/PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'C:/Users/PC/Downloads/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'C:/Users/PC/Downloads/PHPMailer-master/PHPMailer-master/src/SMTP.php';

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

$sql1="SELECT * from preferinte where id_user='$idd'";
$result1=$con->query($sql1);
$row1=mysqli_fetch_assoc($result1);
if($row1){
    $brand=$row1['brand'];
    $stil=$row1['stil'];
    $sezon=$row1['sezon'];
    $gen=$row1['gen'];
    $culoare=$row1['culoare'];
    $sql="SELECT * from produse where (brand='$brand' or stil='$stil' or sezon='$sezon' or gen='$gen' or culoare='$culoare') order by rand()";//aici sterg where
$result=$con->query($sql);
$rows=mysqli_fetch_assoc($result);
}


?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Acasa.css">
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

<div class="categorii"  display="flex">

  <div class="gallery1">
      <a href="Sezon.php">
        <img src="images/sezon.jpg" alt="Sezon" width="600" height="400">
      </a>
      <div class="desc">Sezon</div>
  </div>


  <div class="gallery1">
      <a href="StilVest.php">
       <img src="images/stil.jpg" alt="Stil Vestimentar" width="600" height="400">
     </a>
     <div class="desc">Stil Vestimentar</div>
  </div>
  
  <div class="gallery1">
      <a href="Brand.php">
        <img src="images/brand.jpg" alt="Branduri" width="600" height="400">
     </a>
      <div class="desc">Brand</div>
  </div>
  <!-- <br><br>
    <p1>...</p1> -->
</div> 
<div class="sugestia">
<?php
if($rows){
if($rows['brand']==$row1['brand']){
?>
<h3>Sugestie oferita dupa brand</h3>
<?php
    }
    else if($rows['brand']==$row1['brand']){
?>
<h3>Sugestie oferita dupa stil vestimentar</h3>
<?php
    }
    else if($rows['sezon']==$row1['sezon']){
?>
<h3>Sugestie oferita dupa sezon</h3>
<?php
    }else if($rows['gen']==$row1['gen']){
 ?>
<h3>Sugestie oferita dupa gen</h3>
<?php
    }else if($rows['culoare']==$row1['culoare']){
?>
<h3>Sugestie oferita dupa culoare</h3>
<?php
    }
    //sending mail
$yahoo_mail = new PHPMailer;
$yahoo_mail->IsSMTP();
// Send email using Yahoo SMTP server
$yahoo_mail->Host = 'smtp.mail.yahoo.com';
// port for Send email
$yahoo_mail->Port = 465;
$yahoo_mail->SMTPSecure = 'ssl';
$yahoo_mail->SMTPDebug = 1;
$yahoo_mail->SMTPAuth = true;
$yahoo_mail->Username = 'iulia.otilia11@yahoo.com';
$yahoo_mail->Password = 'iauxadvqsrlrwaib';
$yahoo_mail->SMTPDebug =0;
 
$yahoo_mail->From = 'iulia.otilia11@yahoo.com';
$yahoo_mail->FromName = 'FoSa';// frome name
$yahoo_mail->AddAddress($_SESSION['mail']);  // Add a recipient  to name
 // Set email format to HTML
 
$yahoo_mail->Subject = 'Sugestie de la FoSa';
$yahoo_mail->Body    = $rows['sugestie'];
$yahoo_mail->Body .= $rows['link'] ;
 
if(!$yahoo_mail->Send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $yahoo_mail->ErrorInfo;
exit;
}
else
{
echo 'Sugestie disponibila si pe email!';
}

/*
    //sending mail
    ini_set("SMTP", "smtp.mail.yahoo.com");
    ini_set("sendmail_from", "iulia.otilia11@yahoo.com");

    $to =$_SESSION['mail']; 
    $fromName = 'FoSa';
    $from = 'sender@email.com';
    $subject = "Sugestie de la FoSa";

    $headers = "From: iulia.otilia11@yahoo.com";

    $body=" \n "
    ."Sugestie de incaltaminte : ".$rows['sugestie'] ." \n"
    ."Descriere : ".$rows['descriere'] ." \n"
    ."Link : ".$rows['link'] ." \n";

    if(mail($to, $subject, $body, $headers)){ 
        echo 'Email has sent successfully.'; 
     }else{ 
        echo 'Email sending failed.'; 
     }*/
?>

<div class="row">
    <div class="col-3 menu">
    <div class="gallery2">
      <a href="sugestie1.jpg">
        <img src="<?= $rows['imagine']; ?>" alt="<?= $rows['titlu']; ?>" width="600" height="400">
      </a>
     </div>
   </div>
    
  
    <div class="col-9">
      <div>
        <h1><?php echo $rows['sugestie']; ?></h1>
        <p><?php echo $rows['descriere']; ?></p>
      </div>

      <div>
        <p>Ofera un vot sugestiei noastre: </p>
      </div>
      <form action="recenzie.php?id=<?php echo $rows['id'] ?>" method="post">
        <div class="rating">
        <input type="radio" name="star" id="star1" value="5"><label for="star1">
        </label>
        <input type="radio" name="star" id="star2" value="4"><label for="star2">
        </label>
        <input type="radio" name="star" id="star3" value="3"><label for="star3">
        </label>
        <input type="radio" name="star" id="star4" value="2"><label for="star4">
        </label>
        <input type="radio" name="star" id="star5" value="1"><label for="star5">
        </label>
        </div><input type="submit" name="submit" value="Submit">
      </form>

      <?php
  }
  ?>
  <div class="btn-group">
    <p>Partajeaza sugestia prietenilor tai: </p>

    <a href="https://web.whatsapp.com/">
      <button class="button"><i class="fa-brands fa-whatsapp"></i></button>
    </a>
    <a href="https://www.facebook.com/">
      <button class="button"><i class="fa-brands fa-facebook"></i></button>
    </a>
    <a href="https://www.instagram.com/">
      <button class="button"><i class="fa-brands fa-instagram"></i></button>
    </a>
    <a href="https://twitter.com/">
      <button class="button"><i class="fa-brands fa-twitter"></i></button>
    </a>
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