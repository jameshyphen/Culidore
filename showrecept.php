<?php
include('db.php');
if(isset($_GET['zoek'])){

    $vraag512 = "select count(id) as aantal from Ingredienten";
        if ($result23 = mysqli_query($conn, $vraag512)) {
            while ($row = mysqli_fetch_assoc($result23)) {
                $aantalingredienten=$row['aantal'];

            }
        }
        $zoek="";
        if($_GET['zoek']!=""){
            $zoek =  " AND naam LIKE '%".$_GET['zoek']."%'";
        }
        $NBI = array();
        $NBR = array();

        for($x=1;$x<=$aantalingredienten;$x++){
            if(isset($_GET['ingredient'.$x])){
                $NBI[$x]=$x;
            }
        }
    $y=0;
    foreach ($NBI as $ing){
        $vraag74 =   "SELECT distinct `idRecept` FROM `Recept-Ingredient` where idIngredient = $ing";
        if ($result743 = mysqli_query($conn, $vraag74)) {
            while ($row = mysqli_fetch_assoc($result743)) {
                $y++;
                $NBR[$y]=$row['idRecept'];
            }
        }
    }
    $soort = $_GET['Soort'];
    if($soort=="Alles"){
        $soortzoek="";
        $andsoortzoek="";
    }
    else{
        $andsoortzoek = " AND soort = '".$soort."'";
        $soortzoek = " where soort = '".$soort."'";
    }
    if(count($NBR)==0){
        $vraag = 'select id, naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst from tblrecepten';
        if($_GET['zoek']==""){$vraag.=$soortzoek;}else{
            $vraag.=" where naam like '%".$_GET['zoek']."%'".$andsoortzoek;
        }

    }


    else{
        $numItems = count($NBR);
        $i = 0;
        $vraag = 'select id, naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst from tblrecepten WHERE (';
        foreach($NBR as $recpt){

            if(++$i === $numItems) {
                $vraag.=" id=$recpt)".$zoek.$andsoortzoek;
            }
            else{
                $vraag.=" id=$recpt OR";
            }

        }
    }

}

else
    {
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