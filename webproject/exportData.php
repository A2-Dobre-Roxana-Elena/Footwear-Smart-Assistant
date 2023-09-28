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

$query = $con->query("SELECT * FROM recenzii ORDER BY id ASC");

if($query->num_rows > 0){ 
    $delimiter = ","; 
    //$filename = "recenzii" . ".csv";
    $myfile = fopen("recenzii.csv", "w+");

    $fields = array('ID', 'ID_PRODUS', 'RECENZIE'); 
    fputcsv($myfile, $fields, $delimiter);

    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['id_produs'], $row['recenzie']); 
        fputcsv($myfile, $lineData, $delimiter); 
    } 

    fseek($myfile, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="recenzii.csv";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($myfile);
}
exit;
?>