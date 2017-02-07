<script>
    function confirmationDelete(anchor)
    {
        var conf = confirm('Wil jij dit recept zeker verwijderen?');
        if(conf)
            window.location=anchor.attr("href");
    }
</script>