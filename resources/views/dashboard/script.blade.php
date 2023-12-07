<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    // add
    $('.tombol-simpan').click(function() {
        var formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('image', $('#image')[0].files[0]);
        formData.append('title', $('#title').val());
        formData.append('body', $('#body').val());

        $.ajax({
            url: {{ route('articles.store') }}, // Ganti dengan URL yang sesuai
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                alert('Data berhasil ditambahkan');
                // Lakukan tindakan lain, seperti me-refresh atau mengarahkan ke halaman lain
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat menambah data');
            }
        });
    });
</script>
<script>
 ClassicEditor
                                .create( document.querySelector( '#body' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
</script>
