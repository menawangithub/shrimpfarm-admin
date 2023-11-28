$(document).ready(function() {
    $('.btnDelete').on('click', function() {
        var id = $(this).data('id_delete');
        // Di sini Anda dapat menambahkan kode penghapusan data atau konfirmasi penghapusan.
        alert('Apakah Anda Yakin Akan Menghapus Data Video ini?');
        $.ajax({
            url:"https://asia-south1.gcp.data.mongodb-api.com/app/application-0-rugju/endpoint/deleteVideo?id=" + id,
            type: 'DELETE',
            success: function(data){
                window.location = '/kelolavideo';
            }
        })
    });

    $('.btnUpdate').on('click', function() {
        var id = $(this).data('id');
        // Di sini Anda dapat mengarahkan pengguna ke halaman edit dengan ID yang sesuai.
        window.location.href = '/EditDataVideo/' + id;
    });

    $('.btnDeleteBudidaya').on('click', function() {
        var id = $(this).data('id_delete');
        // Di sini Anda dapat menambahkan kode penghapusan data atau konfirmasi penghapusan.
        alert('Apakah Anda Yakin Akan Menghapus Data Artikel?');
        $.ajax({
            url:"https://asia-south1.gcp.data.mongodb-api.com/app/application-0-rugju/endpoint/deleteArtikel?id=" + id,
            type: 'DELETE',
            success: function(data){
                window.location = '/kelolaartikel';
            }
        })
    });

    $('.btnUpdateBudidaya').on('click', function() {
        var id = $(this).data('id');
        // Di sini Anda dapat mengarahkan pengguna ke halaman edit dengan ID yang sesuai.
        window.location.href = '/EditDataArtikel/' + id;
    });

    $('.btnDeleteFaq').on('click', function() {
        var id = $(this).data('id_delete');
        // Di sini Anda dapat menambahkan kode penghapusan data atau konfirmasi penghapusan.
        alert('Apakah Anda Yakin Akan Menghapus Data FAQ?');
        $.ajax({
            url:"https://asia-south1.gcp.data.mongodb-api.com/app/application-0-rugju/endpoint/deletefaq?id=" + id,
            type: 'DELETE',
            success: function(data){
                window.location = '/kelolafaq';
            }
        })
    });

    $('.btnUpdateFaq').on('click', function() {
        var id = $(this).data('id');
        // Di sini Anda dapat mengarahkan pengguna ke halaman edit dengan ID yang sesuai.
        window.location.href = '/EditDataFaq/' + id;
    });

    $('.btnTonton').on('click', function() {
        window.location.href = '/VideoBudidaya/';
    });

    $('.btnBaca').on('click', function() {
        window.location.href = '/ArtikelBudidaya/';
    });
});
