<script>
    <?php
    $admin = false;

    session_start();
    if(isset($_GET['r'])){
        if($_GET['r']==1){
            echo "document.addEventListener('DOMContentLoaded', function() {
  regDown();
});";
        }


    }
    if(isset($_GET['l'])){
        if($_GET['l']==1){
            echo "document.addEventListener('DOMContentLoaded', function() {
  logDown();
});";
        }


    }
    ?>

</script>