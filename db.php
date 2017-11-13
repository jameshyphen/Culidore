<?php

$conn = mysqli_connect("localhost", "root", "", "culidore");

if (!$conn) {
	die("Connectie is niet gelukt: ".mysqli_connect_error());
}

?>