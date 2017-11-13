<?php
include('db.php');
if ($conn)
{
if(isset($_SESSION['username'])){
$advraag = "select admin from culidore.users where username='".$_SESSION['username']."'";
if ($result = mysqli_query($conn, $advraag)) {
while ($row = mysqli_fetch_assoc($result)){
if($row['admin']==1){
$admin = true;
}
}}}}
?>