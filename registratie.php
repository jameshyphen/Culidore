<?php
include('db.php');

$voornaam = $_POST['voor'];
$achternaam = $_POST['achter'];
$gebruiker = $_POST['gebruiker'];
$email = $_POST['email'];
$passwoord = $_POST['pass'];
$passwoordopnieuw = $_POST['opnieuw'];
$encryptpass = md5($passwoord);
$location = "index.php?";

// checken of email al bestaat
$vraag = "SELECT email FROM Gebruikers WHERE email='" . $email . "'";
$result = mysqli_query($conn, $vraag);

if($row = mysqli_num_rows($result)){
	$location .= "e=m";
	$location .= "&r=1";
    header('Location: '.$location);
}
else if($passwoord == $passwoordopnieuw) 
{
    // maak gebruiker aan
    // encrypteren van passwoord
    $sql = "INSERT INTO Gebruikers(voornaam, achternaam, gebruiker, email, passwoord, admin) VALUES('$voornaam', '$achternaam', '$gebruiker', '$email', '$encryptpass', NULL)";
    if(mysqli_query($conn, $sql)){
        header("location: index.php?e=s&l=1"); // terug naar index pagina
    }
    else{
        header("location: index.php?e=pp&l=1");
    }

  }
  else
  {
	   $location .= "e=p";
	   $location .= "&r=1";
    header('Location: '.$location);
    
	
  }


mysqli_close($conn);

?>