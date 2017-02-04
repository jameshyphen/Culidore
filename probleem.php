<?php
include('db.php');
session_start();
if (isset($_SESSION['gebruiker']))
{
    $gebruiker = $_SESSION['gebruiker'];
    $titel = $_POST['Titel'];
    $omschrijving = $_POST['Omschrijving'];
    $prijs = $_POST['Prijs'];
    $soort = $_POST['Soort'];
    $foto = $_POST['foto'];
    $bereiding = $_POST['bereiding'];
    $location = "index.php";
    $rating = "0";
    $datum = date("Y-n-d");
    $foto = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME);

    // maak recept aan
    $sql = "INSERT INTO tblrecepten(id, naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst) VALUES('', '$titel', '$rating', '$prijs', '$soort', '$omschrijving', '$foto', '$bereiding', '$gebruiker', '$datum')";
    mysqli_query($conn, $sql);
    // terug naar index pagina
    header('location:index.php');
}
else
{
    //foutcode
    echo "Kan recept niet toevoegen";
}
mysqli_close($conn);
?>