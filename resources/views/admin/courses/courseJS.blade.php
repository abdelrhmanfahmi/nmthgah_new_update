<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#addItem').on('click', function(e) {
            e.preventDefault();
            var arr = [];
            var pillars = document.getElementById('pillars').value;
            if (pillars.length != 0) {
                var data = document.getElementById('dataPillar');
                data.style.display = "block";
                data.value += pillars + ',';
                $('#pillars').val("");
                $('#pillars').focus();
            }else{
                return false;
            }
        });
    
    });
</script>