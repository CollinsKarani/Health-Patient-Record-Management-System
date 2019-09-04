<script src = "js/bootstrap.js"></script>
<script src = "js/jquery.min.js"></script>
<script src = "js/dropdown.js"></script>
<script src = "js/sidebar.js"></script>
<script src = "js/jquery.dataTables.js"></script>
<script src = "js/custom.js"></script>
<script src="js/jquery-ui.js"></script>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	