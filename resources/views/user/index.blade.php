@extends('user.layout.main')
@push('css')
    <style>
        .berita .box {
            display: flex;
            flex-direction: column;
            height: 100%;

        }

        .berita .box p {
            height: 100%;
        }
    </style>
@endpush
@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>About</h2>
                <p>Sistem Informasi Administrasi Kependudukan</p>
            </div>

            <div class="row content" data-aos="fade-up">
                <div class="col-lg-6">
                    <p>
                        Sistem Informasi Administrasi Kependudukan (SIAK) adalah suatu sistem informasi yang
                        ditumbuh-kembangkan berdasarkan prosedur-prosedur pelayanan administrasi kependudukan dengan
                        menerapkan sistem teknologi informasi dan komunikasi guna menata sistem administrasi
                        kependudukan di Indonesia. SIAK melayani pendaftaran penduduk dan pencatatan sipil
                        berdasarkan peristiwa kependudukan (population events) dan peristiwa penting (vital events)
                        yang dialami oleh penduduk sejak lahir hingga meninggal dunia. Data kependudukan yang
                        tersimpan dalam basis data yang keluarannya antara lain:
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Surat Penerbitan</li>
                        <li><i class="ri-check-double-line"></i> Surat Keterangan</li>
                        <li><i class="ri-check-double-line"></i> Surat Izin</li>
                    </ul>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        Pendataan kependudukan dan catatan sipil yang menggunakan teknologi informasi dan komunikasi
                        pada mulanya dikenal dengan istilah SIMDUK (Sistem Informasi Manajemen Kependudukan)pada
                        tahun 1996. Namun pada pelaksanaannya dilapangan, sistem ini memiliki banyak kelemahan
                        sebagai sebuah sistem yang mengelola data kependudukan. Berdasarkan hasil evaluasi terhadap
                        SIMDUK, maka Pemerintah Indonesia membuat SIAK (Sistem Informasi Administrasi Kependudukan)
                        sebagai sistem yang mengolah data kependudukan dan catatan sipil di Indonesia. Kelebihan
                        dari SIAK selain untuk mendata pendudukan secara akurat tetapi juga dapat memberikan NIK
                        yang secara otomatis dan tetap untuk satu penduduk, sehingga dapat mengeliminasi terjadinya
                        kepemilikan identitas ganda.
                    </p>
                    <a href="#" class="btn-learn-more">Learn More</a>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <ul class="nav nav-tabs row d-flex">
                <li class="nav-item col-3" data-aos="zoom-in">
                    <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                        <i class="ri-gps-line"></i>
                        <h4 class="d-none d-lg-block">Layanan Surat Penerbitan</h4>
                    </a>
                </li>
                <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="100">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                        <i class="ri-body-scan-line"></i>
                        <h4 class="d-none d-lg-block">Layanan Surat Keterangan</h4>
                    </a>
                </li>
                <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="200">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                        <i class="ri-sun-line"></i>
                        <h4 class="d-none d-lg-block">Layanan Surat Izin</h4>
                    </a>
                </li>
                <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="300">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                        <i class="ri-store-line"></i>
                        <h4 class="d-none d-lg-block">Layanan Update Elemen Data</h4>
                    </a>
                </li>
            </ul>

            <div class="tab-content" data-aos="fade-up">
                <div class="tab-pane active show" id="tab-1">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Layanan Surat Penerbitan</h3>
                            <p>
                                Berikut Layanan-layanan yang bisa digunakan oleh user :
                            </p>
                            <ul>
                                <li><i class="ri-check-double-line"></i> Surat Penerbitan KTP</li>
                                <li><i class="ri-check-double-line"></i> Surat Penerbitan Akta Kelahiran</li>
                                <li><i class="ri-check-double-line"></i> Surat Penerbitan Kartu Keluarga</li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum
                            </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ Vite::image('features-1.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-2">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Layanan Surat Keterangan</h3>
                            <p>
                                Berikut Layanan-layanan yang bisa digunakan oleh user :
                            </p>

                            <ul>
                                <li><i class="ri-check-double-line"></i> Surat Keterangan Pinda WNA</li>
                                <li><i class="ri-check-double-line"></i> Surat Keterangan Kematian</li>
                                <li><i class="ri-check-double-line"></i> Surat Keterangan Pindah Datang</li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum
                            </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ Vite::image('features-2.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-3">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Layanan Surat Izin</h3>
                            <p>
                                Berikut Layanan-layanan yang bisa digunakan oleh user :
                            </p>
                            <ul>
                                <li><i class="ri-check-double-line"></i> Surat Izin Keramaian</li>

                            </ul>
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore
                                magna aliqua.
                            </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ Vite::image('features-3.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-4">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Layanan Update Elemen Data</h3>
                            <p>
                                Berikut Layanan-layanan yang bisa digunakan oleh user :
                            </p>
                            <ul>
                                <li><i class="ri-check-double-line"></i> update data BPJS</li>
                                <li><i class="ri-check-double-line"></i>Update Data Kartu Keluarga</li>
                            </ul>
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore
                                magna aliqua.
                            </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ Vite::image('features-4.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Services</h2>
                <p>JENIS LAYANAN</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box" data-aos="zoom-in-left">
                        <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
                        <h4 class="title"><a href="/pengajuan">Penerbitan KTP</a></h4>
                        <p class="description">Layanan penerbitan dokumen KTP-El bagi yang belum pernah memiliki
                            KTP El (baru perekaman), hilang atau rusak/patah/tidak terbaca.
                            Layanan ini tanpa PERUBAHAN DATA PADA ELEMEN KTP-El. Jika sudah selesai dicetak KTP El
                            diambil di Dukcapil Ogan Ilir.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                        <div class="icon"><i class="bi bi-book" style="color: #e9bf06;"></i></div>
                        <h4 class="title"><a href="">Penerbitan Akta Kelahiran</a></h4>
                        <p class="description">Layanan pengajuan akta kelahiran adalah layanan administrasi
                            kependudukan
                            di mana pemohon dapat mengajukan penerbitan akta kelahiran baik bagi bayi yang baru
                            lahir maupun penduduk yang belum memiliki akta kelahiran.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                        <div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i></div>
                        <h4 class="title"><a href="">Penerbitan Kartu Keluarga</a></h4>
                        <p class="description">Penerbitan Kartu Keluarga baru, pisah kartu keluarga, penambahan
                            atau perubahan anggota Kartu Keluarga, kehilangan maupun Kartu Keluarga yang rusak. bisa
                            cetak sendiri</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
                        <div class="icon"><i class="bi bi-binoculars" style="color:#41cf2e;"></i></div>
                        <h4 class="title"><a href="">Surat Keterangan Pindah WNA</a></h4>
                        <p class="description">Surat keterangan pindah WNA adalah surat yang mana pemohon dapat
                            mengajukan surat pindah dari WNA ke WNI</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-5">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="400">
                        <div class="icon"><i class="bi bi-globe" style="color: #d6ff22;"></i></div>
                        <h4 class="title"><a href="">Surat Keterangan Kematian</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                            blanditiis praesentium voluptatum deleniti atque</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="500">
                        <div class="icon"><i class="bi bi-clock" style="color: #4680ff;"></i></div>
                        <h4 class="title"><a href="">Surat Keterangan Pindah Datang</a></h4>
                        <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                            tempore, cum soluta nobis est eligendi</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
                        <div class="icon"><i class="bi bi-binoculars" style="color:navy"></i></div>
                        <h4 class="title"><a href="">Surat Izin Keramaian</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
                        <div class="icon"><i class="bi bi-clock" style="color:black"></i></div>
                        <h4 class="title"><a href="">Update Data BPJS</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
                        <div class="icon"><i class="bi bi-globe" style="color:red"></i></div>
                        <h4 class="title"><a href="">Update Data Kartu Keluarga</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Services Section -->


    <!-- ======= Pricing Section ======= -->
    <section id="berita" class="berita">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Berita & Artikel</h2>
                <p>Berita & Artikel</p>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="box" data-aos="zoom-in">
                        <h3>
                            Pekan Dukcapil 2022 Dibanjiri Masyarakat</h3>
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSACoB1BvrHMpMmawL4eZlDZK7--6MblgD2wQ&usqp=CAU">
                        <p>Kegiatan Pekan Dukcapil Sumatera Barat 2022 mendapat sambutan positif dari
                            masyarakat,
                            ini terlihat dari ramainya warga mendatangi kegiatan yang diadakan di Kantor Gubernur
                            Sumatra Barat, Selasa (4/10/2022).</p>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="box" data-aos="zoom-in">
                        <h3>Kadis Dukcapil Padang Ajak Warga Manfaatkan Pekan Dukcapil</h3>
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSACoB1BvrHMpMmawL4eZlDZK7--6MblgD2wQ&usqp=CAU">
                        <p>Kepala Dinas Kependudukan dan Catatan Sipil (Kadis Dukcapil) Kota Padang Teddy Antonius
                            , mengajak warga Kota Padang untuk manfaatkan Pekan Dukcapil 2022
                        </p>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="box" data-aos="zoom-in">
                        <h3>Wako Padang Serahkan KTP Pemula Bagi Pelajar SMAN 1</h3>
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSACoB1BvrHMpMmawL4eZlDZK7--6MblgD2wQ&usqp=CAU">
                        <p>Walikota Padang Hendri Septa menyerahkan secara simbolis KTP pemula kepada perwakilan
                            siswa SMA 1 Padang.

                            Penyerahan tersebut dilakukan Wako saat bertindak sebagai pembina upacara di lapangan
                            upacara SMAN 1 Padang, Senin (3/10/2020).
                        </p>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Read More</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="box" data-aos="zoom-in">
                        <h3>
                            Selama Empat Bulan Dukcapil Padang Terbitkan 5400 KTP Pemula</h3>
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSACoB1BvrHMpMmawL4eZlDZK7--6MblgD2wQ&usqp=CAU">
                        <p>Selama rentang waktu empat bulan, terhitung mulai 1 Juni 2022 hingga 26 September 2022,
                            Dinas Kependudukan dan Catatan Sipil Kota Padang, telah melakukan perekaman data dan
                            penerbitan KTP pemula sebanyak 5400 lembar.
                        </p>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Read More</a>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Team</h2>
                <p>Our Hardworking Team</p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up">
                        <div class="member-img">
                            <img src="{{ Vite::image('team/team-1.jpg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href="https://www.instagram.com/jilhanhaura/"><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Tsalsabila Jilhan Haura</h4>
                            <span>Front End</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="{{ Vite::image('team/team-2.jpeg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href="https://www.instagram.com/naufal.hadyy/"><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Naufal Hady</h4>
                            <span>Back End</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="200">
                        <div class="member-img">
                            <img src="{{ Vite::image('team/team-3.jpg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href="https://www.instagram.com/erizal_mh/"><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Erizal May Hendra</h4>
                            <span>Ui & UX</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="300">
                        <div class="member-img">
                            <img src="{{ Vite::image('team/team-3.jpeg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href="https://www.instagram.com/nelly.sintiaaa/"><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Nelly Sintia</h4>
                            <span>.........</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="200">
                        <div class="member-img">
                            <img src="{{ Vite::image('team/team-3.jpg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Ilham</h4>
                            <span>.........</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="200">
                        <div class="member-img">
                            <img src="{{ Vite::image('team/team-3.jpg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Rhadi Akhila</h4>
                            <span>..........</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>

            <div class="row mt-5">

                <div class="col-lg-4" data-aos="fade-right">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
@endsection
