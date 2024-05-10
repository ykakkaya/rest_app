$(function(){
  $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Emin misiniz?',
                  text: "Bu işlem Geri Alınamaz",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'İptal',
                  confirmButtonText: 'Evet Silmek istiyorum!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Silindi!',
                      'Dosya Başarıyla Silindi.',
                      'success'
                    )
                  }
                })


  });

});
