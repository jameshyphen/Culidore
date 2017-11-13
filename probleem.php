<?php
include('db.php');
session_start();

    $gebruiker = $_SESSION['username'];

    $probleem = $_POST['probleembeschrijf'];

    $datum = date("Y-n-d");


    // maak recept aan
    $sql = "INSERT INTO Problemen(Omschrijving, Bugfix, gebruiker, datum) VALUES ('$probleem',false,'$gebruiker','$datum')";
    $result = mysqli_query($conn, $sql);
    // terug naar index pagina



if($result){
    header("location:index.php?pr=s&l=1");
}
else
{
    header("location:index.php?pr=p&l=1");
}
mysqli_close($conn);
?>