<div class="recepttoevoegen" style="overflow-y: scroll;">
    <form class="voegrecept" action="recept.php" method="Post" enctype="multipart/form-data">

        <div class="titelgerecht">
            <a class="titelgerecht">Titel gerecht</a></br>
            <input type="txtText" name="Titel" id="TGR" required data-errormessage-value-missing="Vul dit veld in">

        </div>
        <div class="divomschrijving">
            <a class="rating">Bereiding</a></br>
            <textarea class="textareaomschrijving" name="textareaomschrijving" style="width:90%;height:230px;" required data-errormessage-value-missing="Vul dit veld in"></textarea>
        </div>
        <div class="divprijs">
            <a class="prijs">Prijs 1-5</a></br>
            <input type="txtText" name="Prijs" id="PRI" required data-errormessage-value-missing="Vul dit veld in">
        </div>
        <div class="divbereiding">
            <a class="bereiding">Omschrijving</a></br>

            <textarea  name="Bereiding" style="width90%;height:100px;" required data-errormessage-value-missing="Vul dit veld in"></textarea>
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
        <div class="divvaningredienten">
            <a class="circle2">+</a>
            <?php
            include('ingredientinput.php');?>
            <script>
                $(document).ready(function(){
                    $(".circle2").click(function(){
                        $(".divvaningredienten").append("asdasd");
                    });
                });
            </script>

        </div>

        <input class="divinputknop" type="submit" name="Toevoegen" value="Toevoegen">
    </form>
</div>