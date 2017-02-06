<style>#upload_button {
        display: none;

        border: 0px;
        background: linear-gradient(180deg, #3d0000, #811412);
        border-radius: 3px;

        color: #fff;

        padding: 5px;
    }</style>

<script src="https://use.fontawesome.com/3008661bde.js"></script>

<form>
    <p><button id="upload_button"><i class="fa fa-cloud-upload"></i>Click here to select file</button></p>
    <p><input  id="upload_input" name="Foto" type="file"/></p>

</form>
<script>
    var button = document.getElementById('upload_button');
    var input  = document.getElementById('upload_input');

    // Making input invisible, but leaving shown fo graceful degradation
    input.style.display = 'none';
    button.style.display = 'initial';

    button.addEventListener('click', function (e) {
        e.preventDefault();

        input.click();
    });

    input.addEventListener('change', function () {
        button.innerText = this.value;
    });
</script>