<?php
include('db.php');
if ($conn) {
    $vraag = "select id, Naam from Ingredienten";
    if ($result = mysqli_query($conn, $vraag)) {?>
        <select class="selectingredient" name="ingredient">

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?=$row['id']?>">
                    <?=$row['Naam']?>
                </option>
            <?php       }?>

        </select>
        <?php
    }
    else
    {
        echo "Geen resultaat";
    }


}
?>