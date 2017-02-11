<?php
include('db.php');
if ($conn) {
    $vraag = "select id, Naam from Ingredienten";
    if ($result = mysqli_query($conn, $vraag)) {
        echo "<select class=\"selectingredient\" name=\"ingredient\">"?>
        


            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?=$row['id']?>">
                    <?=$row['Naam']?>
                </option>
            <?php       }?>

        </select>
        <button onclick="removeIngredient(">
            X
        </button>
        <?php
    }
    else
    {
        echo "Geen resultaat";
    }


}
?>