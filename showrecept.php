<?php
include('db.php');
if(isset($_GET['zoek'])){

    $vraag512 = "select count(id) as aantal from Ingredienten";
        if ($result23 = mysqli_query($conn, $vraag512)) {
            while ($row = mysqli_fetch_assoc($result23)) {
                $aantalingredienten=$row['aantal'];

            }
        }
        if(isset($_GET['zoek'])){
            $zoek=" AND Naam LIKE '%".$_GET['zoek']."%'";
        }

        $NBI = array();
        $NBR = array();
        for($x=1;$x<=$aantalingredienten;$x++){
            if(isset($_GET['ingredient'.$x])){
                $NBI[$x]=$x;
            }
        }
    $y=0;
    $soort = $_GET['Soort'];
    if($soort=="Alles"){
        $soortzoek="";
        $andsoortzoek="";
    }
    else{
        $andsoortzoek = " AND soort = '".$soort."'";
        $soortzoek = " where soort = '".$soort."'";
    }
    if(count($NBI)==0){
        $vraag74 =   "SELECT distinct `idRecept` FROM `Recept-Ingredient`";
        if ($result743 = mysqli_query($conn, $vraag74)) {
            while ($row = mysqli_fetch_assoc($result743)) {
                $y++;
                $NBR[$y] = $row['idRecept'];
            }
        }
    }
    else{
        foreach ($NBI as $ing){
            $vraag74 =   "SELECT distinct `idRecept` FROM `Recept-Ingredient` where idIngredient = $ing";
            if ($result743 = mysqli_query($conn, $vraag74)) {
                while ($row = mysqli_fetch_assoc($result743)) {
                    $y++;
                    $NBR[$y]=$row['idRecept'];
                }
            }
        }
    }
    if(count($NBI)==0 && $_GET['zoek']==""){
        $vraag = 'select id, naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst from tblrecepten'.$soortzoek;
    }
    else {
        if (count($NBR) == 0) {
            echo "NBR == 0";
            $conn = false;
        }
        else
        {
            if(count($NBI)>0) {
                echo "NBI >0";
                $numItems = count($NBR);
                $i = 0;
                $vraag = 'select id, naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst from tblrecepten WHERE (';
                foreach ($NBR as $recpt) {
                    if (++$i === $numItems) {
                        $vraag .= " id=$recpt)" . $zoek . $andsoortzoek;
                    } else {
                        $vraag .= " id=$recpt OR";
                    }
                }
            }
            else{
                $vraag = 'select id, naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst from tblrecepten WHERE Naam LIKE  "%'.$_GET['zoek'].'%"'.$andsoortzoek;
            }
        }
    }
    echo count($NBI);
    echo $vraag;
}
else {
    $vraag = 'select id, naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst from tblrecepten';
}

if ($conn)
{

    if ($result = mysqli_query($conn, $vraag)) {
        $xy=1;
        while ($row = mysqli_fetch_assoc($result)) {
            $xrec = $row['id'];
            echo "<script>
    $(document).ready(function(){
        $('#tabrec" . $xrec . "').click(function(){
            $('.logintje').slideUp('fast');
            $('.registratie').slideUp('fast');
            $('.venster').fadeIn('fast');
            $('.recepttoevoegen').slideUp('fast');
            $('.gelogged').fadeOut('fast');
            $('#rec" . $xrec . "').fadeToggle('fast');
        });

        $('.venster').click(function(){
            $('#rec" . $xrec . "').fadeOut('fast');
        });
    });
</script>";

            if ($xy == 1) {
                $xy++;
                echo "<div class='venster' >
    </div>";
            }
            $time = strtotime($row['Tijdgeplaatst']);

            $newformat = date('d-F-Y',$time);

            include('tabelrecept.php');
            include('receptdiv.php');
        }

    }
    else
    {
        echo 'Geen resultaat';
    }
    mysqli_close($conn);
}
?>