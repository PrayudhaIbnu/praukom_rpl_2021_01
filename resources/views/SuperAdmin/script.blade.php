<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        // edit pop up 
        $(document).on('click', '.btn-edit', function () {
            var user_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "edit-user/"+user_id,
                dataType: "json",
                success: function (response) {
                    $('#edituser').modal('show');
                    $('#user_id').val(user_id);
                    $('#path_foto').val(response.user.foto);
                    $('#foto').html(`<img src="/storage/post-images/${response.user.foto}" width="100" class="img-fluid img-thumbnail">`);
                    $('#nama').val(response.user.nama);
                    $('#username').val(response.user.username);
                    $('#nama_level').val(response.user.level);
                    $('#password').val(response.user.password);
                }
            })
        });

        // delete
        $(document).on('click','.btn-hapus', function () {
            var user_id = $(this).val();
            $('#deleteuser').modal('show');
            $('#delete_id').val(user_id);
        });       
    });

    
  </script>