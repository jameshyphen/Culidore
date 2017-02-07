<div class="recepttoevoegen" style="overflow-y: scroll;">
    <form class="voegrecept" action="recept.php" method="Post" enctype="multipart/form-data">

        <div class="titelgerecht">
            <a class="titelgerecht">Titel gerecht</a></br>
            <input type="txtText" name="Titel" id="TGR" required data-errormessage-value-missing="Vul dit veld in">

        </div>
        <div class="divomschrijving">
            <a class="rating">Omschrijving</a></br>
            <textarea class="textareaomschrijving" name="Omschrijving" style="width:250px;height:130px;" required data-errormessage-value-missing="Vul dit veld in"></textarea>
        </div>
        <div class="divprijs">
            <a class="prijs">Prijs 1-5</a></br>
            <input type="txtText" name="Prijs" id="PRI" required data-errormessage-value-missing="Vul dit veld in">
        </div>
        <div class="divbereiding">
            <a class="bereiding">Bereiding</a></br>

            <textarea name="Bereiding" style="width:250px;height:100px;" required data-errormessage-value-missing="Vul dit veld in"></textarea>
        </div>

        <div class="divprijs">
            <a class="soort">Soort</a></br>
            <select required data-errormessage-value-missing="Vul dit veld in" name="Soort">
                <option>Ontbijt</option>
                <option>Middageten</option>
                <option>Avondeten</option>
            </select>
        </div>
        <div class="divfoto">
            <?php include('test.php');?>
        </div>
        <input class="divinputknop" type="submit" name="Toevoegen" value="Toevoegen">
    </form>
</div>