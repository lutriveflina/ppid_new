const name = document.querySelector('#name')
const alamat = document.querySelector('#alamat')
const provinsi = document.querySelector('#provinsi')
const kabKot = document.querySelector('#kabKot')
const noKontak = document.querySelector('#noKontak')
const hidden = document.querySelector('#hidden')

function displayNone() {
    name.setAttribute("style", "display: none;")
    alamat.setAttribute("style", "display: none;")
    provinsi.setAttribute("style", "display: none;")
    kabKot.setAttribute("style", "display: none;")
    noKontak.setAttribute("style", "display: none;")
    hidden.setAttribute("style", "display: none;")
}

function displayBlock() {
    name.setAttribute("style", "display: block;")
    alamat.setAttribute("style", "display: block;")
    provinsi.setAttribute("style", "display: block;")
    kabKot.setAttribute("style", "display: block;")
    noKontak.setAttribute("style", "display: block;")
    hidden.setAttribute("style", "display: block;")
}

document.addEventListener("DOMContentLoaded",() => {
    displayNone()
});

document.querySelector('#cariNik').addEventListener('click', () => {
    let nik = document.querySelector('#nik').value
    let timerInterval
    

    if(nik.length < 16) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'NIK tidak valid!'
        })
    } else {
        Swal.fire({
            title: '',
            html: '<p id="tulisan">Menghubungi server Dukcapil...</p>',
            timer: 500,
            timerProgressBar: true,
            onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        var persen = parseInt(100-(Swal.getTimerLeft()/20));
                        // console.log(persen);
                        if(persen == -700) {
                            content.querySelector('#tulisan').textContent = 'Koneksi Terhubung...' 
                        } else if(persen == -600) {
                            content.querySelector('#tulisan').textContent = 'Melakukan Pencarian NIK : ' + nik
                        } else if(persen == -100) {
                            content.querySelector('#tulisan').textContent = 'Parsing Data'
                        }
                    }
                }, 100)
                
            },
            onClose: () => {
                clearInterval(timerInterval)
                
                axios.get('apiNik/' + nik).then((response) => {
                    console.log(response);
                    if(data[0]['RESPON'] == 'Data Tidak Ditemukan') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: 'NIK tidak terdaftar sebagai Penduduk Kota Bukittinggi, silahkan isi form secara manual!'
                        })

                        displayBlock()
                    } else {
                        displayBlock()
                        
                        for(const element of response.data) {
                            if(element.NIK == nik) {
                                name.value = element.NAMA_LGKP
                                alamat.value = element.ALAMAT
                                provinsi.value = element.PROP_NAME
                                kabKot.value = element.KAB_NAME
                            }
                        }
                    }
                }, (error) => {
                    // console.log(error);

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: error + 'Gangguan Koneksi!'
                    })
                });
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                // console.log('I was closed by the timer')
            }
        })
    }
});