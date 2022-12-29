@extends('user.layout.main')
@push('css')
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: arial;
        }

        .header {
            width: 100%;
            /* background-color: gray; */
            background-image: url("https://source.unsplash.com/800x200?mobile");
            background-size: cover;
        }

        .container {
            padding: 20px;
            text-align: center;
        }

        .container .text {
            font-size: 35px;
            color: white;
            text-shadow: 2px 2px 2px black;
        }

        .container .logo img {
            width: 200px;
        }

        .isi {
            width: 100%;
            float: left;
        }

        .isinya .col3 {
            box-sizing: border-box;
            margin: 0.5%;
            width: 32.33%;
            float: left;
            background-color: white;
            border-radius: 10px;
            box-shadow: 1px 1px 10px black;
        }

        .gambar img {
            width: 100%;
            height: 30%;
            box-sizing: border-box;
        }

        .judul {
            width: 100%;
            box-sizing: border-box;
            background: linear-gradient(0deg, rgb(42, 44, 57) 0%, rgb(51, 54, 74) 100%);
            padding: 10px;
            padding-bottom: 4px;
            font-size: 20px;
            font-weight: bold;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .tanggal {
            color: white;
            background: linear-gradient(0deg, rgb(42, 44, 57) 0%, rgb(51, 54, 74) 100%);
            padding: 10px 0px 10px 10px;
        }

        .isiberita {
            padding: 10px;
            text-align: justify;
        }

        .tombol {
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }

        .tombol a {
            text-decoration: none;

        }

        .tombol .btn {
            padding: 10px;
            background-color: #17204E;
            font-size: 15px;
            color: white;
            padding: 10px 20px 10px 20px;
        }

        .tombol .btn:hover {
             background-color:#ef6603;
        }

        .tag {
            clear: both;

            color: white;
            background: linear-gradient(0deg, rgb(42, 44, 57) 0%, rgb(51, 54, 74) 100%);
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;

        }
    </style>
@endpush
@section('content')
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row justify-content-center align-items-center">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="header">
                        <div class="container">
                            <div class="logo">
                            </div>
                            <div class="text">
                                Selamat Datang Di Web Portal Berita <div>
                                    Baru Berbagi</div>
                            </div>
                        </div>
                    </div>
                    <div class="isi">
                        <div class="isinya">
                            <div class="col3">
                                <div class="judul">Pekan Dukcapil 2022 Dibanjiri Masyarakat</div>
                                <div class="tanggal">Penulis : Jilhan Haura | Tanggal : 03 November 2022</div>
                                <div class="gambar"><img src="https://source.unsplash.com/800x200?web" alt="">
                                </div>
                                <div class="isiberita">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure

                                    <br>
                                    <div class="tombol">
                                        <a href="#" class="btn">Read More</a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="tag">
                                    KELOMPOK 4 | Sistem Informasi Kependudukan
                                </div>
                            </div>
                        </div>

                        <div class="isinya">
                            <div class="col3">
                                <div class="judul">Kadis Dukcapil Padang Ajak Warga Manfaatkan Pekan Dukcapil</div>
                                <div class="tanggal">Penulis : Naufal Hady | Tanggal : 03 November 2022</div>
                                <div class="gambar"><img src="https://source.unsplash.com/800x200?web" alt="">
                                </div>
                                <div class="isiberita">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure

                                    <br>
                                    <div class="tombol">
                                        <a href="#" class="btn">Read More</a>
                                    </div>
                                </div> <br>
                                <br>
                                <div class="tag">
                                    KELOMPOK 4 | Sistem Informasi Kependudukan
                                </div>
                            </div>
                        </div>

                        <div class="isinya">
                            <div class="col3">
                                <div class="judul">Wako Padang Serahkan KTP Pemula Bagi Pelajar SMAN 1</div>
                                <div class="tanggal">Penulis : Nelly Sintia | Tanggal : 03 November 2022</div>
                                <div class="gambar"><img src="https://source.unsplash.com/800x200?web" alt="">
                                </div>
                                <div class="isiberita">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure

                                    <br>
                                    <div class="tombol">
                                        <a href="#" class="btn">Read More</a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="tag">
                                    KELOMPOK 4 | Sistem Informasi Kependudukan
                                </div>
                            </div>
                        </div>
                        <div class="isinya">
                            <div class="col3">
                                <div class="judul">Pekan Dukcapil 2022 Dibanjiri Masyarakat</div>
                                <div class="tanggal">Penulis : Jilhan Haura | Tanggal : 03 November 2022</div>
                                <div class="gambar"><img src="https://source.unsplash.com/800x200?web" alt="">
                                </div>
                                <div class="isiberita">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure

                                    <br>
                                    <div class="tombol">
                                        <a href="#" class="btn">Read More</a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="tag">
                                    KELOMPOK 4 | Sistem Informasi Kependudukan
                                </div>
                            </div>
                        </div>

                        <div class="isinya">
                            <div class="col3">
                                <div class="judul">Kadis Dukcapil Padang Ajak Warga Manfaatkan Pekan Dukcapil</div>
                                <div class="tanggal">Penulis : Naufal Hady | Tanggal : 03 November 2022</div>
                                <div class="gambar"><img src="https://source.unsplash.com/800x200?web" alt="">
                                </div>
                                <div class="isiberita">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure

                                    <br>
                                    <div class="tombol">
                                        <a href="#" class="btn">Read More</a>
                                    </div>
                                </div> <br>
                                <br>
                                <div class="tag">
                                    KELOMPOK 4 | Sistem Informasi Kependudukan
                                </div>
                            </div>
                        </div>

                        <div class="isinya">
                            <div class="col3">
                                <div class="judul">Wako Padang Serahkan KTP Pemula Bagi Pelajar SMAN 1</div>
                                <div class="tanggal">Penulis : Nelly Sintia | Tanggal : 03 November 2022</div>
                                <div class="gambar"><img src="https://source.unsplash.com/800x200?web" alt="">
                                </div>
                                <div class="isiberita">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure

                                    <br>
                                    <div class="tombol">
                                        <a href="#" class="btn">Read More</a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="tag">
                                    KELOMPOK 4 | Sistem Informasi Kependudukan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
    @endpush
