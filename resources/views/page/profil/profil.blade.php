@extends('layouts.applanding')

@section('contentlanding')
<section class="breadcrumb_area">
    {{-- <img class="breadcrumb_shap" src="{{asset('landing-page/img/breadcrumb/banner_bg.png')}}" alt=""> --}}
    <div class="container">
        <div class="sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
            <h1 class="f_700 f_size_50 w_color f_p">Informasi Tentang PPID</h1>
        </div>
        <div class="row wow fadeInLeft" data-wow-delay="0.6s">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body mb-5">
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <ul class="nav nav-tabs software_service_tab" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-selected="true">Profil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tugas-tab" data-toggle="tab" href="#tugas" role="tab" aria-controls="tugas" aria-selected="false">Tugas dan Wewenang</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="struktur-tab" data-toggle="tab" href="#struktur" role="tab" aria-controls="struktur" aria-selected="false">Struktur PPID</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="visi-tab" data-toggle="tab" href="#visi" role="tab" aria-controls="visi" aria-selected="false">Visi Dan Misi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tentang-tab" data-toggle="tab" href="#tentang" role="tab" aria-controls="tentang" aria-selected="false">Tentang PPID</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="maklumat-tab" data-toggle="tab" href="#maklumat" role="tab" aria-controls="maklumat" aria-selected="false">Maklumat Pelayanan PPID</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <div class="tab-content software_service_tab_content">
                                        <div class="tab-pane fade active show" id="profil" role="tabpanel" aria-labelledby="profil-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="details_content">
                                                        <div class="sec_title">
                                                            <h3 class="f_p f_size_22 f_500 t_color3 mb_20">Profil</h3>
                                                            <p class="f_400 f_size_15">Hak memperoleh informasi merupakan hak asasi manusia dan keterbukaan informasi publik merupakan salah satu ciri penting Negara demokratis yang menjunjung tinggi kedaulatan rakyat untuk mewujudkan penyelenggaraan Negara yang baik. Sebagai badan publik yang bertugas melayani masyarakat, Pemerintah Kota Bukittinggi menyadari keterbukaan informasi publik merupakan sarana dalam mengoptimalkan pengawasan publik terhadap penyelenggaraan Negara dan badan publik serta segala sesuatu yang berakibat pada kepentingan publik. Keterbukaan informasi publik mendukung terciptanya tata kelola pemerintahan yang baik dan bersih (good governance). Badan publik yang secara optimal menerapkan good governance di lingkungan instansinya akan meraih kepercayaan yang tinggi dari publik.Guna menjamin hak warga Negara untuk memperoleh informasi yang berkaitan dengan kepentingan publik dan mewujudkan penyelenggaraan Negara yang transparan, efektif dan dapat dipertanggungjawabkan, pada tahun 2008 pemerintah menetapkan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik (UU KIP). Selanjutnya di tahun 2010 pemerintah menetapkan Peraturan Pemerintah Nomor 61 tentang Pelaksanaan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik, diikuti dengan Peraturan KI Nomor 1 tahun 2010 tentang standar layanan informasi publik dan Peraturan Menteri Dalam Negeri Nomor 3 Tahun 2017 tentang Pedoman Pengelolaan Pelayanan Informasi dan Dokumentasi Kementerian Dalam Negeri dan Pemerintah Daerah.</p>
                                                            <p class="f_400 f_size_15">UU KIP tersebut tidak hanya mengatur keterbukaan informasi pada lembaga Negara saja, tetapi juga pada organisasi non pemerintah yang sebagian atau seluruh dananya bersumber dari dana publik, baik APBN/APBD, sumbangan masyarakat, maupun sumber luar negeri.</p>
                                                            <p class="f_400 f_size_15">Sebagai bentuk apresiasi dan dukungan Pemerintah Kota Bukittinggi terhadap keterbukaan informasi publik dan wujud pernyataan kepatuhan kepada UU KIP maka Pemerintah Kota Bukittinggi mengimplementasikan UU KIP di lingkungan Pemerintah Kota Bukittinggi. Implementasi UU KIP tersebut diawali dengan penetapan Peraturan Walikota Nomor 07 Tahun 2017 tentang Pedoman Pengelolaan Pelayanan Informasi dan Dokumentasi di Lingkungan Pemerintah Kota Bukittinggi dan Keputusan Walikota Bukittinggi Nomor 188.45-106-2017 tentang Pengelola Layanan Informasi dan Dokumentasi di Lingkungan Pemerintah Kota Bukittinggi. Keputusan tersebut menetapkan Walikota dan Wakil Walikota sebagai Pembinan PLID, Sekretaris Daerah sebagai Atasan PPID, Kepala Dinas Kominfo sebagai PPID Utama, Pejabat Eselon II dan Direktur BUMD sebagai Tim Pertimbangan dan Sekretaris selaku PPID Pembantu.</p>
                                                            <p class="f_400 f_size_15">Pemilihan pola pelayanan yang tersentralisasi pada sekretariat layanan informasi dan dokumentasi yang terletak di Dinas Komunikasi dan Informatika bertujuan untuk menertibkan alur pelayanan dan memudahkan masyarakat untuk memperoleh informasi yang mereka butuhkan.</p>
                                                            <p class="f_400 f_size_15">PPID bertanggung jawab melakukan penyediaan, penyimpanan, pendokumentasian, pelayanan, dan pengamanan informasi publik. Dalam menjalankan tugas fungsinya, PPID dibantu oleh bidang-bidang dan sekretariat. Panduan bagi petugas informasi dalam mengelola layanan informasi dituangkan dalam sebuah Maklumat Informasi dan Standar Operasional Prosedur (SOP), yang terdiri dari: SOP Pelayanan Permohonan Informasi Publik, SOP Penyusunan Daftar Informasi dan Dokumentasi Publik, SOP Penanganan Keberatan Informasi Publik, SOP Fasilitasi Sengketa Informasi Publik dan SOP Uji Konsekuensi Informasi Publik.</p>
                                                            <p class="f_400 f_size_15">Pada Tahun 2017, PLID Pemerintah Kota Bukittinggi juga berhasil menyusun dan menetapkan Daftar Informasi Publik (DIP). DIP diusulkan oleh masing-masing SKPD/BUMD melalui PPID Pembantu. Untuk selanjutnya dibahas dalam rapat Tim Pertimbangan yang dipimpin langsung oleh Sekretaris Daerah selaku atasan PPID. Hasil dari Rapat Tim Pertimbangan tersebut ditetapkan sebagai Daftar Informasi Publik Pemerintah Kota Bukittinggi.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="details_content">
                                                        <div class="job_deatails_content">
                                                            <h3 class="f_p f_size_22 f_500 t_color3 mb_20">Tugas</h3>
                                                            <p class="f_400 f_size_15 mb_5">PPID Pemerintah Kota Bukittinggi bertugas:</p>
                                                            <ul class="list-unstyled mb-0">
                                                                <li><i class="badge badge-warning text-white">1.</i> Menyediakan dan mengamankan Informasi Publik;</li>
                                                                <li><i class="badge badge-warning text-white">2.</i> Memberikan pelayanan Informasi Publik yang cepat, tepat, dan sederhana;</li>
                                                                <li><i class="badge badge-warning text-white">3.</i> Menyusun standar operasional prosedur pelaksanaan tugas dan kewenangan PPID  Pemerintah Kota Bukittinggi dalam rangka penyebarluasan Informasi Publik;</li>
                                                                <li><i class="badge badge-warning text-white">4.</i> Menetapkan Daftar Informasi Publik dalam bentuk keputusan PPID Pemerintah Kota Bukittinggi mengenai Daftar Informasi Publik Pemerintah Kota Bukittinggi sesuai dengan format sebagaimana tercantum dalam Lampiran II huruf A yang merupakan bagian tidak terpisahkan dari Peraturan Menteri ini;</li>
                                                                <li><i class="badge badge-warning text-white">5.</i> Melaksanakan Pengklasifikasian Informasi Publik atau perubahannya dengan persetujuan Atasan PPID Pemerintah Kota Bukittinggi dalam bentuk keputusan PPID Pemerintah Kota Bukittingi  mengenai klasifikasi informasi Pemerintah Kota Bukittinggi sesuai dengan format sebagaimana tercantum dalam Lampiran II huruf B yang merupakan bagian tidak terpisahkan dari Peraturan Menteri ini;</li>
                                                                <li><i class="badge badge-warning text-white">6.</i> Menetapkan Informasi Publik yang Dikecualikan sebagai Informasi Publik yang dapat diakses dalam hal:
                                                                    <ul class="list-unstyled mb-0">
                                                                        <li><i class="ti-arrow-right"></i> Telah dinyatakan terbuka bagi masyarakat berdasarkan mekanisme keberatan;</li>
                                                                        <li><i class="ti-arrow-right"></i> Telah dinyatakan terbuka bagi masyarakat berdasarkan putusan sidang ajudikasi, putusan pengadilan, serta putusan Mahkamah Agung;</li>
                                                                        <li><i class="ti-arrow-right"></i> Telah habis jangka waktu pengecualiannya; dan/atau</li>
                                                                        <li><i class="ti-arrow-right"></i> Ditentukan oleh peraturan perundang-undangan.</li>
                                                                    </ul>
                                                                </li>
                                                                <li><i class="badge badge-warning text-white">1.</i> Melakukan Uji Konsekuensi bersama dengan PPID Tingkat I terhadap Informasi Publik yang tidak dapat diakses oleh masyarakat sebagaimana dimaksud dalam peraturan perundang-undangan mengenai keterbukaan Informasi Publik;</li>
                                                                <li><i class="badge badge-warning text-white">2.</i> Memberikan alasan tertulis atas pengecualian Informasi Publik, dalam hal permohonan Informasi Publik ditolak;</li>
                                                                <li><i class="badge badge-warning text-white">3.</i> Melakukan penghitaman atau pengaburan materi Informasi Publik yang Dikecualikan beserta alasannya;</li>
                                                                <li><i class="badge badge-warning text-white">4.</i> Menetapkan dan menugaskan petugas layanan informasi untuk membantu pelaksanaan tugas PPID Pemerintah Kota Bukittinggi;</li>
                                                                <li><i class="badge badge-warning text-white">5.</i> Melakukan pengembangan kompetensi petugas layanan informasi guna meningkatkan kualitas layanan Informasi Publik;</li>
                                                                <li><i class="badge badge-warning text-white">6.</i> Menggunakan Sistem Informasi PPID dalam pengelolaan layanan Informasi Publik;</li>
                                                                <li><i class="badge badge-warning text-white">7.</i> Menyediakan Informasi Publik yang mutakhir pada portal Pemerintah Kota Bukittingi dan Sistem Informasi PPID;</li>
                                                                <li><i class="badge badge-warning text-white">8.</i> Memelihara dan/atau memutakhirkan informasi pada portal Pemerintah Kota Bukittinggi dan Sistem Informasi PPID paling kurang 1 (satu) kali dalam 1 (satu) bulan;</li>
                                                                <li><i class="badge badge-warning text-white">9.</i> Melakukan koordinasi, harmonisasi, dan fasilitasi Perangkat PPID;</li>
                                                                <li><i class="badge badge-warning text-white">10.</i> Menyediakan ruangan dan/atau meja layanan Informasi Publik;</li>
                                                                <li><i class="badge badge-warning text-white">11.</i> Membuat dan menyampaikan laporan empat bulanan layanan Informasi Publik kepada Atasan PPID Pemerintah Kota Bukittinggi; dan</li>
                                                                <li><i class="badge badge-warning text-white">12.</i> Membuat dan mengumumkan laporan tahunan layanan Informasi Publik serta menyampaikan salinannya kepada Komisi Informasi Provinsi Sumatera Barat.</li>
                                                            </ul>
                                                        </div>
                                                        <div class="job_deatails_content">
                                                            <h3 class="f_p f_size_22 f_500 t_color3 mb_20">FUNGSI</h3>
                                                            <p class="f_400 f_size_15 mb_5">Pembinaan dan pengelolaan Pejabat Pengelola Informasi dan Dokumentasi di lingkungan Pemerintah Kota Bukittinggi.</p>
                                                        </div>
                                                        <div class="job_deatails_content">
                                                            <h3 class="f_p f_size_22 f_500 t_color3 mb_20">Wewenang</h3>
                                                            <p class="f_400 f_size_15 mb_5">Dalam melaksanakan tugas, PPID Pemerintah Kota Bukittinggi berwenang:</p>
                                                            <ul class="list-unstyled mb-0">
                                                                <li><i class="badge badge-warning text-white">1.</i> Memutuskan suatu informasi dapat diakses atau tidak dapat diakses oleh masyarakat berdasarkan Uji Konsekuensi bersama dengan PPID Pembantu;</li>
                                                                <li><i class="badge badge-warning text-white">2.</i> Menolak permohonan Informasi Publik secara tertulis apabila Informasi Publik yang dimohonkan termasuk Informasi Publik yang Dikecualikan dengan disertai alasan serta pemberitahuan tentang hak dan tata cara bagi Pemohon untuk mengajukan keberatan atas penolakan tersebut;</li>
                                                                <li><i class="badge badge-warning text-white">3.</i> Menghadiri rapat pembahasan terkait PPID di tingkat Provinsi;</li>
                                                                <li><i class="badge badge-warning text-white">4.</i> Meminta informasi kepada Perangkat PPID Pembantu dalam hal Informasi Publik yang dimohonkan oleh Pemohon tidak dikuasai oleh PPID Pemerintah Kota Bukittinggi namun dikuasai oleh Perangkat PPID;</li>
                                                                <li><i class="badge badge-warning text-white">5.</i> Melakukan koordinasi dengan Perangkat PPID dan/atau unit terkait dalam menyelesaikan keberatan;</li>
                                                                <li><i class="badge badge-warning text-white">6.</i> Melakukan pendampingan dan koordinasi dengan Perangkat PPID, unit teknis, dan/atau unit yang memiliki tugas dan fungsi memberikan bantuan hukum, pendapat hukum, dan pertimbangan hukum yang berkaitan dengan tugas Pemerintah Kota Bukittinggi;</li>
                                                                <li><i class="badge badge-warning text-white">7.</i> Mengusulkan kepada Atasan PPID Pemerintah Kota Bukittinggi untuk melaporkan dan/atau mengajukan gugatan atas putusan Komisi Informasi ke lembaga peradilan;</li>
                                                                <li><i class="badge badge-warning text-white">8.</i> Melakukan koordinasi dengan PPID Pembantu dalam penyediaan Informasi Publik yang mutakhir pada portal Pemerintah Kota Bukittinggi dan situs selain portal Pemerintah Kota Bukittinggi, dan/atau Sistem Informasi PPID;</li>
                                                                <li><i class="badge badge-warning text-white">9.</i> Melaporkan ketidaksesuaian proses sidang Sengketa Informasi Publik ke Sekretariat Komisi Informasi atas persetujuan Atasan PPID Pemerintah Kota Bukittinggi; dan</li>
                                                                <li><i class="badge badge-warning text-white">10.</i> Melakukan sosialisasi untuk meningkatkan pemahaman atas implementasi keterbukaan Informasi Publik di Pemerintah Kota Bukittinggi.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="struktur" role="tabpanel" aria-labelledby="struktur-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="software_service_item mb_70">
                                                        <h3 class="f_p f_size_22 f_500 t_color3 mb_20">Struktur PPID</h3>
                                                        <img class="" width="100%" src="{{asset('landing-page/struktur_ppid.jpg')}}" alt="">
                                                        <img class="" width="100%" src="{{asset('landing-page/struktur_ppid2.jpg')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="visi" role="tabpanel" aria-labelledby="visi-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="details_content">
                                                        <div class="job_deatails_content">
                                                            <h3 class="f_p f_size_22 f_500 t_color3 mb_20">Visi</h3>
                                                            <p class="f_400 f_size_15 mb_5">Terwujudnya pelayanan informasi yanng transparan dan akuntabel untuk memenuhi hak pemohon informasi sesuai dengan ketentuan peraturan perundang-undangan yang berlaku.</p>
                                                        </div>
                                                        <div class="job_deatails_content">
                                                            <h3 class="f_p f_size_22 f_500 t_color3 mb_20">Misi</h3>
                                                            <p class="f_400 f_size_15 mb_5">Dalam melaksanakan tugas, PPID Pemerintah Kota Bukittinggi berwenang:</p>
                                                            <ul class="list-unstyled mb-0">
                                                                <li><i class="badge badge-warning text-white">1.</i> Meningkatkan pengelolaan dan pelayanan informasi yang berkualitas, benar dan bertanggung jawab.</li>
                                                                <li><i class="badge badge-warning text-white">2.</i> Membangun dan mengembangkan sistem penyediaan dan layanan informasi.</li>
                                                                <li><i class="badge badge-warning text-white">3.</i> Meningkatkan dan mengembangkan kompetensi dan kualitas SDM dalam bidang pelayanan informasi.</li>
                                                                <li><i class="badge badge-warning text-white">4.</i> Mewujudkan keterbukaan informasi Pemerintah Kota Bukittinggi dengan proses yang cepat, tepat, mudah dan sederhana</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tentang" role="tabpanel" aria-labelledby="tentang-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="details_content">
                                                        <div class="job_deatails_content">
                                                            <h3 class="f_p f_size_22 f_500 t_color3 mb_20">GAMBARAN UMUM PELAYANAN INFORMASI PUBLIK PEMKO BUKITTINGGI</h3>
                                                            <p class="f_400 f_size_15 mb_5">Pelayanan informasi di lingkungan Pemko Bukittinggi dipusatkan satu pintu pada sekretariat layanan informasi dan dokumentasi yang berlokasi di Dinas Komunikasi dan Informatika. Pemusatan layanan tersebut bertujuan untuk menertipkan alur pelayanan informasi dan memudahkan masyarakat untuk mendapatkan pelayanan. </p>
                                                            <p class="f_400 f_size_15 mb_5">Pemohon informasi dapat menyampaikan permohonan informasi kepada PLID Pemko Bukittinggi, baik secara langsung dengan mendatangani sekretariat PLID ataupun melalui pengisian formulir pada website resmi PLID Pemko Bukittinggi dengan alamat <a href="{{route('welcome')}}">www.ppid.bukittinggikota.go.id</a>.</p>
                                                            <p class="f_400 f_size_15 mb_5">Pemohonan secara langsung dapat dilakukan dengan mengisi formulir permohonan yang tersedia di meja layanan dan melengkapi persyaratan sesuai ketentuan. Pada saat yang sama petugas layanan akan melakukan registrasi formulir permohonan, dan pemohon akan menerima bukti registrasi tersebut. Sekretariat PLID akan memenuhi permohonan paling lama 10 hari kerja sesuai dengan SOP yang ada.</p>
                                                            <p class="f_400 f_size_15 mb_5">Sementara melalui permohonan melalui website, pemohon dapat secara langsung melakukan resgitrasi dan mengisi formulir permohonan yang telah tersedia. Jika informasi sudah tersedia, maka pemohon dapat langsung mendownload informasi yang dibutuhkan, dan jika belum tersedia permohonan akan diserahkan paling lambat 10 hari kerja.</p>
                                                        </div>
                                                        <div class="job_deatails_content">
                                                            <h3 class="f_p f_size_22 f_500 t_color3 mb_20">Pojok Layanan Informasi dan Dokumentasi Publik</h3>
                                                            <p class="f_400 f_size_15 mb_5">Dengan Sarana dan Fasilitas terdiri dari :</p>
                                                            <ul class="list-unstyled mb-0">
                                                                <li><i class="badge badge-warning text-white">1.</i> 1 meja front desk dan kursi petugas serta kursi tamu,</li>
                                                                <li><i class="badge badge-warning text-white">2.</i> 1 unit PC untuk petugas front desk dan</li>
                                                                <li><i class="badge badge-warning text-white">3.</i> 1 Printer;</li>
                                                                <li><i class="badge badge-warning text-white">4.</i> Daftar Informasi Publik</li>
                                                                <li><i class="badge badge-warning text-white">5.</i> Formulir untuk transaksi pada layanan informasi terdiri dari :
                                                                    <ul class="list-unstyled mb-0">
                                                                        <li><i class="ti-arrow-right"></i> Formulir permintaan informasi publik,</li>
                                                                        <li><i class="ti-arrow-right"></i> Tanda bukti penerimaan permintaan informasi publik,</li>
                                                                        <li><i class="ti-arrow-right"></i> Tanda bukti penyerahan informasi publik,</li>
                                                                        <li><i class="ti-arrow-right"></i> Formulir pemberitahuan tertulis,</li>
                                                                        <li><i class="ti-arrow-right"></i> Formulir pengajuan keberatan.</li>
                                                                    </ul>
                                                                </li>
                                                                <li><i class="badge badge-warning text-white">6.</i> Visi Misi Pemerintah Kota Bukittinggi;</li>
                                                                <li><i class="badge badge-warning text-white">7.</i> Maklumat Pelayanan Informasi;</li>
                                                                <li><i class="badge badge-warning text-white">8.</i> SOP Pelayanan Permohonan Informasi;</li>
                                                                <li><i class="badge badge-warning text-white">9.</i> Standar Biaya Perolehan Informasi</li>
                                                            </ul>
                                                        </div>
                                                        <div class="job_deatails_content">
                                                            <h3 class="f_p f_size_22 f_500 t_color3 mb_20">Jam Pelayanan Informasi Publik</h3>
                                                            <p class="f_400 f_size_15 mb_5">Waktu Pelayanan Informasi di Lingkungan Pemerintah Kota Bukittinggi pada hari kerja, Senin s/d Jum’at</p>
                                                            <ul class="list-unstyled mb-0">
                                                                <table class="table table-bordered table-hover" width="100px">
                                                                    <thead class="text-center">
                                                                        <th>Hari Kerja</th>
                                                                        <th>Jam Kerja</th>
                                                                        <th>Istirahat</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Senin s/d Kamis</td>
                                                                            <td>09.00 – 15.00 WIB</td>
                                                                            <td>12.00 – 13.00 WIB</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jum'at</td>
                                                                            <td>09.00 – 15.00 WIB</td>
                                                                            <td>12.00 – 13.00 WIB</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </ul>
                                                        </div>
                                                        <div class="job_deatails_content">
                                                            <h3 class="f_p f_size_22 f_500 t_color3 mb_20">Pelayanan Bermedia</h3>
                                                            <p class="f_400 f_size_15 mb_5">Permohonan juga dapat dilakukan melalui website di <a href="{{route('welcome')}}">www.ppid.bukittinggikota.go.id</a> atau email di <a href="http://gmail.com" target="_blank">www.ppid.bukittinggi@gmail.com</a>. Permohonan melalui website, pemohon dapat secara langsung melakukan registrasi dan mengisi formulir permohonan yang telah tersedia. Jika informasi sudah tersedia, maka pemohon dapat langsung mendownload informasi yang dibutuhkan, dan jika belum tersedia permohonan akan diserahkan paling lambat 10 hari kerja. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="maklumat" role="tabpanel" aria-labelledby="maklumat-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="details_content">
                                                        <div class="job_deatails_content">
                                                            <img src="{{asset('landing-page/img/maklumat.jpg')}}" class="img-fluid"  alt="">
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
    </div>
</section>
@endsection

@push('scripts')

@endpush
