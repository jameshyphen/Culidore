<?php
include('db.php');

$voornaam = $_POST['voor'];
$achternaam = $_POST['achter'];
$gebruiker = $_POST['gebruiker'];
$email = $_POST['email'];
$password = $_POST['pass'];
$passwordopnieuw = $_POST['opnieuw'];\
$encryptpass = md5($password);
$location = "index.php?";

// Check if user email is already registered
$vraag = "SELECT email FROM Gebruikers WHERE email='" . $email . "'";
$result = mysqli_query($conn, $vraag);

if($row = mysqli_num_rows($result)){
	$location .= "e=m";
	$location .= "&r=1";
    header('Location: '.$location);
}
else if($password == $passwordopnieuw) 
{
    // Make a user account
    
    $sql = "INSERT INTO culidore.Gebruikers(voornaam, achternaam, gebruiker, email, password, admin) VALUES('$voornaam', '$achternaam', '$gebruiker', '$email', '$encryptpass', 0)";
    if(mysqli_query($conn, $sql)){
        header("location: index.php?e=s&l=1"); // Go back to the index page with Success message
    }
    else{
        header("location: index.php?e=pp&l=1");// Account registration is disabled at this instance
    }

  }
  else
  {
	   $location .= "e=p"; //Passwords aren't the same
	   $location .= "&r=1"; //Open register box in index
    header('Location: '.$location);
    
	
  }


mysqli_close($conn);

?>