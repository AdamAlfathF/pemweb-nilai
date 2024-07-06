$('.hapus').on('click', function(e){
	e.preventDefault();
	var getLink = $(this).attr('href');

	Swal.fire({
	  title: 'Hapus Data?',
	  text: "Data akan dihapus permanen",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    window.location.href = getLink;
	  }
	})
});


$('#backup').on('click', function(e){
	e.preventDefault();
	var getLink = $(this).attr('href');

	Swal.fire({
  title: 'Yakin ingin mencadangkan database?',
  showDenyButton: true,
  confirmButtonText: 'Yakin',
  denyButtonText: `Tidak`,
	}).then((result) => {
	  if (result.value) {
	    window.location.href = getLink;
	  }
	})
});
