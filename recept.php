<?php
include('db.php');
session_start();
if ($conn) 
{
if (isset($_SESSION['gebruiker']))
{
    $gebruiker = $_SESSION['gebruiker'];
    $titel = $_POST['Titel'];
    $omschrijving = $_POST['Omschrijving'];
    $prijs = $_POST['Prijs'];
    $soort = $_POST['Soort'];
    $foto = $_POST['foto'];
    $bereiding = $_POST['Bereiding'];
    $location = "index.php";
    $rating = "0";
    $datum = date("Y-n-d");
    
    //fotopath in database
    $filetmp = $_FILES['Foto']['tmp_name'];
    $filename = $_FILES['Foto']['name'];
    $filetype = $_FILES['Foto']['type'];
    $filepath = "images/".$filename;

    move_uploaded_file($filetmp, $filepath);

    // maak recept aan
    $sql = "INSERT INTO tblrecepten(id, naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst) VALUES('', '$titel', '$rating', '$prijs', '$soort', '$omschrijving', '$filepath', '$bereiding', '$gebruiker', '$datum')";
    mysqli_query($conn, $sql);
    // terug naar index pagina
    header('location:index.php');
}
else
{
    //foutcode
    echo "Kan recept niet toevoegen";
}
}
else
{
    mysqli_close($conn);
}
?>