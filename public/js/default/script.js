$(function() {

    $('.tambah').on('click', function() {

        $('.judul').html('Tambah Data');
        $('.tombol').html('Tambah');
        $('#nim').val('');
        $('#nama').val('');
        $('#jurusan').val('Choose...');
        $('#email').val('');
        $("#modal input[name='id']").remove();
        
    });

    $(document).on('click', '.btn-ubah', function() {

        $('.judul').html('Ubah Data');
        $('.tombol').html('Ubah');
        $('#modal').attr('action', 'http://localhost:8080/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            type: "post",
            url: "http://localhost:8080/phpmvc/public/mahasiswa/getubah",
            data: {id: id},
            dataType: "json",
            success: function (data) {
                $('#nim').val(data.nim);
                $('#nama').val(data.nama);
                $('#jurusan').val(data.jurusan);
                $('#email').val(data.email);
                $('#modal').append("<input type='hidden' name='id' value='"+ data.id +"'>");
            }
        });
        
    });

    $('#search').on('click', function() {
        
        const keyword = $('#searchbox').val();
        
        $.ajax({
            type: "post",
            url: "http://localhost:8080/phpmvc/public/mahasiswa/search",
            data: {keyword: keyword},
            dataType: "json",
            success: function (response) {
                $.post("http://localhost:8080/phpmvc/public/mahasiswa/datamahasiswa", {data: response},
                    function (data) {
                        $('.table').html(data);
                    }
                );
            }
        });
        
    });
    
});