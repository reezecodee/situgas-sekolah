function confirmCreate(){
    Swal.fire({
        title: 'Anda yakin?',
        text: "Perubahan tidak dapat dibatalkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, lanjutkan!',
        cancelButtonText: 'Batal'
    })
}

function confirmLogout(){
    Swal.fire({
        title: 'Peringatan',
        text: "Apakah Anda ingin logout dari aplikasi?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Logout',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout').submit();
        }
    });
}
