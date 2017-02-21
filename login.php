<?php

include('db.php');
session_start();
// username and password sent from form 
$gebruiker=$_POST['gebruiker']; 
$passwoord=$_POST['passwoord']; 

// To protect MySQL injection (more detail about MySQL injection)
$gebruiker = stripslashes($gebruiker);
$passwoord = stripslashes($passwoord);
$gebruiker = mysqli_real_escape_string($conn, $gebruiker);
$passwoord = mysqli_real_escape_string($conn, $passwoord);
$encryptpass = md5($passwoord);
$sql="SELECT * FROM Gebruikers WHERE gebruiker='$gebruiker' and passwoord='$encryptpass'";
$result=mysqli_query($conn, $sql);

function is_user_logged_in() {
    $user = wp_get_current_user();
 
    return $user->exists();
}

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);


// If result matched $gebruiker and $passwoord, table row must be 1 row
if($count==1){
	if ($result = mysqli_query($conn, $vraag))
	{
		
		while ($row = mysqli_fetch_assoc($result))
		{
			if($row['admin']==1){
				$_SESSION['admin'] = true;
			}
			else{
				$_SESSION['admin'] = false;
			}
		}
	}
    $_SESSION['loggedin'] = true;
    $_SESSION['gebruiker'] = $gebruiker;
	header("location:index.php?lv=s&l=1");
}
else 
{
header("location:index.php?lv=p&l=1");
}

mysqli_close($conn);

?>