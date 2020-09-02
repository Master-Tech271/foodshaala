<script>
    function preference() {
        var e = document.getElementById("choose_type");
        var choose_type = e.options[e.selectedIndex].value;
        if(choose_type == "user")
            document.getElementById("preference_").classList.remove('d-none');
        else if(choose_type == "restaurant")
            document.getElementById("preference_").classList.add('d-none');
    }
</script>