<?php
include('db.php');
session_start();

$gebruiker = $_SESSION['gebruiker'];

$probleem = $_POST['probleembeschrijf'];

$datum = date("Y-n-d");


// maak recept aan
$sql = "DELETE from tblrecepten where id=".$_GET['id'];
$result = mysqli_query($conn, $sql);
// terug naar index pagina



if($result){
    header("location:index.php?rec=s&l=1");
}
else
{
    header("location:index.php?rec=p&l=1");
}
mysqli_close($conn);
?>