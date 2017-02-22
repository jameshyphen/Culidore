<div style="overflow-y: scroll;" class="receptdiv" id="rec<?= $xrec ?>"><!--dit is waar wij divs genereren bij het clicken op recepten-->
    <div class="divrecepttitel"><b><a id="titelreceptdiv"><?=htmlspecialchars($row['naam'], ENT_QUOTES, 'UTF-8');?></a></b></div>
    <div class="ratester">
        <?php
        $idvanrecept = $row['id'];
        for($x=0;$x<5;$x++){
            echo '<div onclick="ster'.$x.$xrec.'();" id="'.$x.$xrec.'ster" class="ratezelf">
                    <img onclick="ster'.$x.'();" width="30px" height="30px"		
	src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>';
            echo '<script>function ster'.$x.$xrec.'(){';
            for($y=0;$y<$x+1;$y++){
                echo '
		document.getElementById("'.$y.$xrec.'ster").style.opacity = "1";';
            }
            for($y=$x+1;$y<6;$y++){
                echo '
		document.getElementById("'.$y.$xrec.'ster").style.opacity = "0.3";';
            }
            echo "}</script>";
        }?>
    </div>

    <script>
        function confirmationDelete(anchor)
        {
            var conf = confirm('Wil jij dit recept zeker verwijderen?');
            if(conf)
                window.location=anchor.attr("href");
        }
    </script>
    <?php if($admin) : ?>
        <a class="deleterecept" onclick='javascript:confirmationDelete($(this));return false;' href='verwijderrecept.php?id=<?=$xrec?>'>Verwijder recept</a>

    <?php endif; ?>
    <div class="bereiding">
        <a><?=htmlspecialchars($row['bereiding'], ENT_QUOTES, 'UTF-8');?></a>
    </div>
    <div class="ingredienten">
        <b>Soort:</b></br>
        <?=$row['soort'];?></br></br>
        <b>Ingredienten:</b></br>
        <?php
        $ingredientvraag = 'SELECT Naam
                            FROM Ingredienten
                            INNER JOIN `Recept-Ingredient`
                            ON Ingredienten.id=`Recept-Ingredient`.idIngredient
                            Where `Recept-Ingredient`.`idRecept`='.$idvanrecept.';';
        if ($result2 = mysqli_query($conn, $ingredientvraag)) {

            while ($row = mysqli_fetch_assoc($result2)) {
                echo $row['Naam']."</br>";
            }
        }


        ?>

    </div>

</div>