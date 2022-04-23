const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success container rounded-pill mt-4',
    },
    buttonsStyling: false
})

function logingagal() {
  swalWithBootstrapButtons.fire({
    icon: 'error',
    title : 'Proses Login Gagal',
    html : 'Pastikan Email dan Password ' +
            'Yang dimasukkan Benar',
  })
}

function logout() {
  const swalWithBootstrapButtons1 = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-danger rounded-3 px-5 py-2',
      cancelButton: 'btn btn-outline-secondary me-3 px-5 py-2'
    },
    buttonsStyling: false
  })
  
  swalWithBootstrapButtons1.fire({ 
    title: 'Apakah anda yakin ingin keluar?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Keluar',
    cancelButtonText: 'Batal',
    reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        popUpLogout.classList.remove('popup-logout');
        popUpLogout.setAttribute('href', 'http://localhost/INF206-2022-2-QHealthy/public/dokter/logout');
        popUpLogout.click();
      }
    }
  )
}

const popUpLogin = document.getElementsByClassName('popup-login')[0];
const popUpLogout = document.getElementsByClassName('popup-logout')[0];
const popUpTolong = document.getElementsByClassName('popup-tolong');

if (popUpLogin != undefined) {
  if (popUpLogin.dataset.popup_login == false) {
    logingagal();
  }
}

if (popUpLogout != undefined) {
  popUpLogout.addEventListener('click', function() {
    if(popUpLogout.classList.contains('popup-logout')){
      logout();
    }
  });
}