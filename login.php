<?php

include('db.php');
session_start();
// username and password sent from form 
$username=$_POST['username']; 
$password=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$encryptpass = md5($password);
$sql = "SELECT * FROM culidore.users WHERE username='$username' and password='$encryptpass'";
$result=mysqli_query($conn, $sql);

function is_user_logged_in() {
    $user = wp_get_current_user();
 
    return $user->exists();
}

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);


// If result matched $username and $password, table row must be 1 row
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
    $_SESSION['username'] = $username;
	header("location:index.php?lv=s&l=1");
}
else 
{
header("location:index.php?lv=p&l=1");
}

mysqli_close($conn);

?>