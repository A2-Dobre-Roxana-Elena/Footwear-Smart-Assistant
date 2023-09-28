<?php
session_start();

if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="preferences.css">
<script src="https://kit.fontawesome.com/95b3d70b58.js" crossorigin="anonymous"></script>
    <title>Document</title>
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
<table>
    <form action="prefsubmit.php" method="post">
        <tr>
        <td><b>Brand </b></td>
        <td><input type="radio" id="nike" name="brand" value="nike">
            <label for="nike">Nike</label></td>
        <td><input type="radio" id="mussete" name="brand" value="mussete">
            <label for="mussete">Mussete</label></td>
        <td><input type="radio" id="hugo" name="brand" value="hugo boss">
            <label for="hugo">Hugo Boss</label></td>
        <td><input type="radio" id="tommy" name="brand" value="tommy hilfiger">
            <label for="tommy">Tommy Hilfiger</label></td>
        </tr>
    

    
        <tr>
        <td><b>Stil vestimentar </b></td>
        <td><input type="radio" id="sport" name="stil" value="sport">
            <label for="sport">Sport</label></td>
        <td><input type="radio" id="office" name="stil" value="office">
            <label for="office">Office</label></td>
        <td><input type="radio" id="elegant" name="stil" value="elegant">
            <label for="elegant">Elegant</label></td>
        <td><input type="radio" id="home" name="stil" value="home">
            <label for="tommy">Home</label></td>
        <td></td>
        </tr>


        <tr>
        <td><b>Sezon</b></td>
        <td><input type="radio" id="primavara" name="sezon" value="primavara">
            <label for="primavara">Primavara</label></td>
        <td><input type="radio" id="vara" name="sezon" value="vara">
            <label for="primavara">Vara</label></td>
        <td><input type="radio" id="toamna" name="sezon" value="toamna">
            <label for="primavara">Toamna</label></td>
        <td><input type="radio" id="iarna" name="sezon" value="iarna">
            <label for="primavara">Iarna</label></td>
        </tr>
    

    
        <tr>
        <td><b>Culoare</b></td>
        <td><input type="radio" id="alb" name="culoare" value="alb">
            <label for="alb">Alb</label></td>
        <td><input type="radio" id="negru" name="culoare" value="negru">
            <label for="negru">Negru</label><br></td>
        <td><input type="radio" id="maro" name="culoare" value="maro">
            <label for="maro">Maro</label></td>
        <td><input type="radio" id="albastru" name="culoare" value="albastru">
            <label for="albastru">Albastru</label></td>
        <td><input type="radio" id="rosu" name="culoare" value="rosu">
            <label for="rosu">Rosu</label></td>
        </tr>

    
        <tr>
        <td><b>Gen</b></td>
        <td><input type="radio" id="feminim" name="gen" value="feminim">
            <label for="feminim">Feminin</label></td>
        <td><input type="radio" id="masculin" name="gen" value="masculin">
            <label for="masculin">Masculin</label></td>
        </tr>
    
</table><br> 
<input class="butonsubmit" type="submit" name="submit" value="Submit">
</form>

</div>
</body>
</html>
<?php
}else{
    header("location:start.php");
    exit();
}
?>
