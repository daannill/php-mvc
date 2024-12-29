$(document).ready(function() {

    $('#cari').on('keyup', function() {
        
        $('#btnCari').hide();

        $('#container').hide();

        $('.loader').show();

        // Menampilkan Data
        // $('#container').load('ajax/data.php?cari=' + $('#cari').val());

        $.get('ajax/data.php?cari=' + $('#cari').val(), function(data) {

            $('#container').html(data);
            $('#container').show();
            $('.loader').hide();

        })

    });

});