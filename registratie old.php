<?php

include 'db.php';

$voornaam = $_POST['voor'];
$achternaam = $_POST['achter'];
$gebruiker = $_POST['gebruiker'];
$email = $_POST['email'];
$passwoord = $_POST['pass'];

$encrypt_passwoord=md5($passwoord);

$sql = "INSERT INTO Gebruikers (voornaam, achternaam, gebruiker, email, passwoord)
VALUES ('$voornaam', '$achternaam', '$gebruiker', '$email', '$encrypt_passwoord')";
$resultaat = mysqli_query($conn, $sql);

header("Location: index.php");
?>