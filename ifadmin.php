<?php
include('db.php');
if ($conn)
{
if(isset($_SESSION['gebruiker'])){
$vraag = "select admin from Gebruikers where gebruiker='".$_SESSION['gebruiker']."'";
if ($result = mysqli_query($conn, $vraag)) {
while ($row = mysqli_fetch_assoc($result)){
if($row['admin']==1){
$admin = true;
}
}}}}
?>