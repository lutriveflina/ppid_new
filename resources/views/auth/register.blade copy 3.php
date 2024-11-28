<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="PPID Kota Bukittinggi">
    <meta name="keywords" content="PPID, Kota Bukittinggi, Bukittinggi, Pejabat Pengelola Informasi dan Dokumentasi">
    <meta name="author" content="Dinas Komunikasi dan Informatika Kota Bukittinggi">

    <title>Register - PPID Kota Bukittinggi</title>

    <link rel="apple-touch-icon" href="{{ asset('landing-page/img/logo-ppid2.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landing-page/img/logo-ppid2.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/pages/authentication.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
</head>

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="container mt-5">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header mb-1">
                                    <h4 class="card-title">Pendaftaran</h4>
                                </div>
                                <form action="{{ route('register') }}" method="POST">
                                    <div class="card-content">
                                        <div class="card-body">
                                            @csrf
                                            <p>Informasi Pribadi</p>
                                            <hr>
                                            <div class="form-label-group">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <input type="number" id="nik" name="nik" class="form-control" placeholder="NIK (Nomor Induk Kependudukan)" required aria-describedby="button-addon2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16">
                                                        <div class="input-group-append" id="button-addon2">
                                                            <button class="btn btn-primary" type="button" id="cariNik">Cari</button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="form-label-group">
                                                <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat" required></textarea>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="text" id="provinsi" name="provinsi" class="form-control" placeholder="Provinsi" required>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="text" id="kabKot" name="kabKot" class="form-control" placeholder="Kota atau Kabupaten" required>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="number" id="noKontak" name="noKontak" class="form-control" placeholder="No. Kontak" required>
                                            </div>
                                            <div id="hidden">
                                                <p>Informasi Login</p>
                                                <hr>
                                                <div class="alert alert-info" role="alert">
                                                    Untuk dapat menggunakan fitur PPID, Anda harus memiliki Email Aktif dan Password. Silakan tentukan Email Aktif dan password Anda
                                                </div>
                                                <div class="form-label-group">
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Aktif" required>
                                                </div>
                                                <div class="form-label-group">
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                                </div>
                                                <div class="form-label-group">
                                                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                                                </div>
                                                <div class="form-label-group">
                                                    {!! NoCaptcha::display() !!}
                                                    {!! NoCaptcha::renderJs('id') !!}
                                                </div>
                                                <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                            </div>
                                            <a href="{{ route('login') }}" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ketentuan Pengguna</h4>
                                </div>
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card-body">
                                        <div class="accordion" id="accordionExample" data-toggle-hover="true">
                                            <div class="collapse-margin">
                                                <div class="card-header" id="headingOne" data-toggle="collapse" role="button" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <span class="lead collapse-title collapsed">
                                                        Umum
                                                    </span>
                                                </div>
    
                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <ul class="list-group">
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">1</span>
                                                                </p>
                                                                <span class="text-justify">Pengguna adalah siapa saja yang memanfaatkan layanan SIP PPID baik sebagai individu maupun lembaga.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">2</span>
                                                                </p>
                                                                <span class="text-justify">Dengan menggunakan Layanan ini Pengguna menyetujui sepenuhnya Persyaratan dan Ketentuan Layanan yang diuraikan di dalam dokumen ini. Jika Pengguna tidak menyetujui Persyaratan dan Ketentuan Layanan ini, harap jangan gunakan Layanan ini.</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="collapse-margin">
                                                <div class="card-header" id="headingTwo" data-toggle="collapse" role="button" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <span class="lead collapse-title collapsed">
                                                        Ketentuan Pengguna
                                                    </span>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <ul class="list-group">
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">1</span>
                                                                </p>
                                                                <span class="text-justify">Seluruh sumber data dan informasi yang disimpan/direkam/diolah pada Layanan ini termasuk validasi dan verifikasi keabsahannya sepenuhnya menjadi tanggung jawab dari Pengguna Layanan.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">2</span>
                                                                </p>
                                                                <span class="text-justify">Operasional pengelolaan seluruh data dan informasi mencakup pemutakhiran data dan informasi dimaksud sepenuhnya menjadi tanggung jawab dari Pengguna sesuai hak akses masing-masing.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">3</span>
                                                                </p>
                                                                <span class="text-justify">Pengguna dilarang mendistribusikan data dan informasi dari Layanan ini kepada pihak ketiga kecuali telah mendapat ijin resmi dan tertulis dari Pengelola.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">4</span>
                                                                </p>
                                                                <span class="text-justify">Pengguna berkewajiban memahami dan mematuhi Kebijakan Privasi Data dan Informasi dan Kebijakan Keamanan yang ditetapkan oleh pengelola.</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="collapse-margin">
                                                <div class="card-header" id="headingThree" data-toggle="collapse" role="button" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <span class="lead collapse-title">
                                                        Kebijakan Privasi Data & Informasi 
                                                    </span>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <ul class="list-group">
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">1</span>
                                                                </p>
                                                                <span class="text-justify">Pengelola akan mencatat informasi tentang semua aktifitas dari pengguna. Mencakup semua transaksi data dan informasi dari atau antar pengguna. Pengelola juga dapat mengumpulkan data dan informasi tentang pengguna dari pengguna lain. Hal ini untuk memberikan pengalaman yang lebih baik dalam Layanan untuk para pengguna.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">2</span>
                                                                </p>
                                                                <span class="text-justify">Penggunaan Layanan dan isinya disediakan dan dikembangkan oleh Pengelola secara berkesinambungan untuk kemudahan pengelolaan data dan informasi sesuai kepentingan dan kebutuhan Pengguna. Oleh sebab itu, pengelolaan dan pemanfaatan data dan informasi yang tersedia merupakan sepenuhnya tanggung jawab dari Pengguna. Tersedia apa adanya dan sebagaimana tersedia, tanpa jaminan jenis apapun dari Pengelola.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">3</span>
                                                                </p>
                                                                <span class="text-justify">Pengelola tidak akan dikenakan tanggung jawab atas kerusakan langsung, tidak langsung, tidak disengaja, khusus atau secara konsekuensi, kerugian atau gangguan yang timbul dari penggunaan atau kesalahan informasi yang diberikan oleh Pengguna.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">4</span>
                                                                </p>
                                                                <span class="text-justify">Pengguna memahami sepenuhnya terhadap privasi data dan informasi yang mereka kelola. Pemanfaatan data dan informasi serta fasilitas pada Layanan ini sepenuhnya merupakan tanggung jawab pengguna.</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="collapse-margin">
                                                <div class="card-header" id="headingFour" data-toggle="collapse" role="button" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    <span class="lead collapse-title">
                                                        Ketentuan Penggunaan Akun
                                                    </span>
                                                </div>
                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <ul class="list-group">
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">1</span>
                                                                </p>
                                                                <span class="text-justify">Untuk menggunakan Layanan, Pengguna akan diberikan sebuah akun tertentu sesuai dengan prosedur yang berlaku. Pengguna dilarang menggunakan akun milik pihak lain tanpa izin.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">2</span>
                                                                </p>
                                                                <span class="text-justify">Pengelola akan mengakhiri akses akun Pengguna Layanan bila menurut pertimbangan Pengelola bahwa Pengguna telah melanggar Persyaratan dan Ketentuan Layanan.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">3</span>
                                                                </p>
                                                                <span class="text-justify">Saat melakukan proses permintaan dan aktivasi akun, Pengguna harus memberikan informasi yang lengkap dan akurat. Pengguna secara sendiri bertanggung jawab atas aktivitas yang dilakukan akun miliknya, dan berkewajiban mengamankan kata sandi yang dimilikinya.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">4</span>
                                                                </p>
                                                                <span class="text-justify">Pengguna berkewajiban segera melaporkan Pengelola apabila terjadi penyimpangan keamanan atau penggunaan tanpa izin atas akun miliknya.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">5</span>
                                                                </p>
                                                                <span class="text-justify">Pengelola tidak dapat dimintakan pertanggungjawaban atas kerugian akibat penggunaan akun Pengguna oleh pihak lain. Pengguna bertanggung jawab penuh atas kerugian akibat penggunaan akun Pengguna oleh pihak lain.</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="collapse-margin">
                                                <div class="card-header" id="headingFive" data-toggle="collapse" role="button" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                    <span class="lead collapse-title">
                                                        Perubahan Aturan
                                                    </span>
                                                </div>
                                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <ul class="list-group">
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">1</span>
                                                                </p>
                                                                <span class="text-justify">Kebijakan Pengelola memainkan peranan penting dalam mempertahankan pengalaman positif bagi Pengguna. Harap patuhi kebijakan tersebut saat menggunakan Layanan ini. Saat Pengelola diberi tahu tentang kemungkinan pelanggaran kebijakan, kami dapat meninjau dan mengambil tindakan, termasuk membatasi atau menghentikan akses pengguna ke Layanan ini.</span>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <p class="float-left mr-1">
                                                                    <span class="badge badge-primary badge-pill">2</span>
                                                                </p>
                                                                <span class="text-justify">Pengelola dapat memperbaiki, menambah, atau mengurangi ketentuan ini setiap saat, dengan atau tanpa pemberitahuan sebelumnya. Pengguna diharapkan memantau Persyaratan dan Ketentuan Layanan ini sewaktu-waktu. Seluruh Pengguna terikat dan tunduk kepada ketentuan yang telah diperbaiki/ditambah/dikurangi oleh Pengelola.</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>
</html>