<?php
include('db.php');
session_start();


    // maak recept aan
    $sql = "Update Problemen set Bugfix=1 where id=".$_POST['probl'];
    $result = mysqli_query($conn, $sql);
    // terug naar index pagina



if($result){
    header("location:problemen.php?l=1&prob=f");
}
else
{
    header("location:problemen.php?l=1&prob=nf");
}
mysqli_close($conn);
?>