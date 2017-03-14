<?php
if(isset($_GET['lv'])){
    if($_GET['lv']=='s'){
        echo "Je bent nu ingelogd!";
    }

}

if(isset($_GET['lgo'])){
    if($_GET['lgo']=='s'){
        echo "Je bent nu uitgelogd!";
    }

}
if(isset($_GET['prob'])){
    if($_GET['prob']=='s'){
        echo "Probleem is gefixt";
    }

}
if(isset($_GET['pr'])){
    if($_GET['pr']=='s'){
        echo "Probleem is aangemeld";
    }

}
if(isset($_GET['reto'])){
    if($_GET['reto']=='s'){
        echo "Recept is toegevoegd!";
    }

}
if(isset($_GET['rec'])){
    if($_GET['rec']=='s'){
        echo "Recept verwijderd!";
    }

}
?>