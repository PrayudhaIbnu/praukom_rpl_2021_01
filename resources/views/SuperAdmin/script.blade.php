<script>
  //   $.ajaxSetup({
  //     headers: {
  //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     }
  //   });

  $(document).ready(function() {
    // edit pop up 
    $(document).on('click', '.btn-edit', function() {
      var user_id = $(this).val();
      console.log(user_id);
      $.ajax({
        type: "GET",
        url: "edit-user/" + user_id,
        dataType: "json",
        success: function(response) {
          console.log(response);
          $('#edituser').modal('show');
          $('#user_id').val(user_id);
          $('#foto').html(
            `<img  src="/storage/post-images/${response.user.foto}" width="100" class="img-edit img-fluid img-thumbnail" style="object-fit: cover;width:90px;height:90px;">`
          );
          $('#nama').val(response.user.nama);
          $('#username').val(response.user.username);
          $('#nama_level').val(response.user.level);
        }
      })
    });

    // untuk edit password
    $(document).on('click', '.btn-password', function() {
      var user_id = $(this).val();
      console.log(user_id);
      $.ajax({
        type: "GET",
        url: "edit-user/" + user_id,
        dataType: "json",
        success: function(response) {
          console.log(response);
          $('#editpassword').modal('show');
          $('#user').val(user_id);
          $('#namaa').val(response.user.nama);
        }
      })
    });

    // delete
    $(document).on('click', '.btn-hapus', function() {
      var user_id = $(this).val();
      console.log(user_id);
      $('#deleteuser').modal('show');
      $('#delete_id').val(user_id);
    });
  });


  // preview image tambah
  function previewImgTambah() {
    const image = document.querySelector('#img_tambah');
    const imagePreview = document.querySelector('.img-tambah');

    const blob = URL.createObjectURL(image.files[0]);
    imagePreview.src = blob;
    }
  // preview image edit
  function previewImgEdit() {
    const image = document.querySelector('#img_edit');
    const imagePreview = document.querySelector('.img-edit');

    const blob = URL.createObjectURL(image.files[0]);
    imagePreview.src = blob;
    }

    // visibility pasword
    let state = false;
  function toggleTambah(){
    if (state) {
      document.getElementById("password").setAttribute("type","password");
      document.getElementById("eye-tambah").className = "fa-regular fa-eye-slash";
      state = false;
        
    } else {
      document.getElementById("password").setAttribute("type","text");
      document.getElementById("eye-tambah").className = "fa-regular fa-eye";
      state = true;
    }
  }

  function toggleEdit(){
    if (state) {
      document.getElementById("password_e").setAttribute("type","password");
      document.getElementById("eye-edit").className = "fa-regular fa-eye-slash";
      state = false;
        
    } else {
      document.getElementById("password_e").setAttribute("type","text");
      document.getElementById("eye-edit").className = "fa-regular fa-eye";
      state = true;
    }
  }
 

</script>
