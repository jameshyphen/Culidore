<?php include('sources.php');?>
<script>
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "instellingenwijzigen");
    }
</script>
<body>
<?php include('scriptswhensomethingsucceedorfail.php');
include('scriptfunctionsonclick.php');
?>
<div class="mainpagina">
    <?php
    include('instellingenwijzigenform.php');
    ?>
</div>
<?php
include('menuvanboven.php');
include('logindiv.php');
include('script1.php');
?>
</body>
</html>