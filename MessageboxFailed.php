<?php
if(isset($_GET['lv'])){

    if($_GET['lv']=='p'){
        echo "Wrong username or password.";
    }}
if(isset($_GET['pr'])){

    if($_GET['pr']=='p'){
        echo "Wrong username or password.";
    }}
if(isset($_GET['prob'])){

    if($_GET['prob']=='nf'){
        echo "Error";
    }}
if(isset($_GET['e'])){
    if($_GET['e']=='pp'){
        echo "Account registration is disabled at this instance.";
    }

}
?>