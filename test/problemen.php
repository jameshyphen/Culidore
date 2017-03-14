<?php include('sources.php');?>
<script>
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "problemen");
    }
</script>
<body>
<?php include('scriptswhensomethingsucceedorfail.php');
include('scriptfunctionsonclick.php');
?>
<div class="mainpagina">
    <?php
    include('ifadmin.php');
    include('probleemtonen.php');
    ?>
</div>
<?php
include('menuvanboven.php');
include('logindiv.php');
include('script1.php');
?>
<?php
include('registerdiv.php');
include('recepttoevoegendiv.php');
include('probleemtoevoegen.php');
?>
</body>
</html>