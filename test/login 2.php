<?php
include('db.php');
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['gebruiker'];
$password=$_POST['passwoord'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($gebruiker);
$password = stripslashes($passwoord);
$username = mysqli_real_escape_string($conn, $gebruiker);
$password = mysqli_real_escape_string($conn, $passwoord);
// Selecting Database

// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query("select * from login where password='$password' AND username='$username'", $connection);
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location:index.php?lv=s&l=1"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($conn); // Closing Connection
}
}
?>