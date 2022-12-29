@extends('users.layouts.main')

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
            height: 250px;
        }

        .containerr {
            height: 70px;
            transition: all 0.5s;
            z-index: 997;
            transition: all 0.5s;
            background: rgba(42, 44, 57, 0.9);
            padding: 5px 15px 7px 15px;
            text-decoration: none;
        }

        .containerr h1 {
            font-size: 28px;
            margin: 0;
            padding: 0;
            line-height: 1;
            font-weight: 700;
            letter-spacing: 1px;
            color: white;
            font-style: bold;
        }

        /* .container {
                                                    padding: 20px;
                                                    text-align: center;
                                                }

                                                .container .text {
                                                    font-size: 35px;
                                                    color: bal;
                                                    text-shadow: 2px 2px 2px black;
                                                    margin-top: 40px;
                                                    padding: 5px 10px 5px 10px;
                                                }

                                    .container .logo img {
                                        width: 200px;
                                    } */

        /*Bagian Menu*/

        .menu {
            width: 100%;
            float: left;
            background-image: linear-gradient(#1f0A60, #21007f);
        }

        .menuutama ul>li {
            float: left;
            list-style: none;
            text-transform: capitalize;
            font-size: 20px;
            padding: 25px;
        }

        .menuutama ul>li>a {
            text-decoration: none;
            color: white;
        }

        .menuutama ul>li:hover {
            background-color: #DD2121;
        }

        /* kelas isi */

        .isi {
            width: 100%;
            float: left;
            padding: 5px 10px 5px 10px;
            margin-top: 300px
        }

        .isinya .col3 {
            box-sizing: border-box;
            margin: 0.5%;
            width: 32.33%;
            float: left;
            background-color: white;
            border-radius: 10px;
            box-shadow: 1px 1px 10px black;
            padding: 5px 10px 5px 10px;
        }

        .gambar img {
            width: 100%;
            height: 30%;
            box-sizing: border-box;
        }

        .judul {
            width: 100%;
            box-sizing: border-box;
            background-image: linear-gradient(#004A79, #00137f);
            padding: 10px;
            padding-bottom: 4px;
            font-size: 20px;
            font-weight: bold;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
        }

        .tanggal {
            color: white;
            background-color: #17204E;
            padding: 10px 0px 10px 10px;
        }

        .isiberita {
            padding: 10px;
            text-align: justify;
        }

        .tombolheader {
            width: 100%;
            margin-top: 10px;
            text-align: center;
            padding: 10px 0px 10px 10px;
        }

        .tombolheader a {
            text-decoration: none;

        }

        .tombolheader .btn {
            padding: 10px;
            background-color: #17204E;
            font-size: 15px;
            color: white;
            padding: 10px 20px 10px 20px;
        }

        .tombolheader .btn:hover {
            background-color: #DD2121;
        }

        .tombol {
            width: 100%;
            margin-top: 10px;
            text-align: right;
            padding: 10px 0px 10px 10px;
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
            background-color: #DD2121;
        }

        .tag {
            clear: both;
            padding: 5px 10px 5px 10px;
            color: white;
            background-color: #17204E;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            text-align: center;

        }

        /* ini adalah bagian footer */

        .fot {
            box-sizing: border-box;
            width: 100%;
            background: #14151c;
            text-align: center;
            clear: both;
            color: white;
            padding: 20px 20px 20px 10px;
            background: ;
            font-size: 14px;
            padding: 30px 0;
        }
    </style>
@endpush

@section('content')
    <div class="header">
        <div class="card mb-3">
            <img src="https://source.unsplash.com/800x200?mobile" class="card-img-top" alt="...">
            <div class="card-body text-center">
                <h5 class="card-title"><b>Dukcapil Dorong Optimalisasi Integrasi Data dengan Pedulilindungi dan PCare
                        BPJS
                        Sukseskan Vaksinasi</b></h5>
                <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. A, iure? Est, vel
                    doloribus! Cumque placeat impedit necessitatibus. Dicta, necessitatibus. Fugiat perferendis
                    quasi quia. Provident, laudantium! Cumque suscipit fugit molestiae amet. </p>
                <div class="tombolheader">
                    <a href="#" class="btn">Read More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="isi">
        <div class="isinya">
            <div class="col3">
                <div class="judul">Pekan Dukcapil 2022 Dibanjiri Masyarakat</div>
                <div class="tanggal">Penulis : Tsalsabila Jilhan Haura | Tanggal : 03 November 2022</div>
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
                <div class="tanggal">Penulis : Naufal Hady| Tanggal : 03 November 2022</div>
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
                <div class="judul">Selama Empat Bulan Dukcapil Padang Terbitkan 5400 KTP Pemula</div>
                <div class="tanggal">Penulis : Tsalsabila Jilhan Haura | Tanggal : 03 November 2022</div>
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
                <div class="tanggal">Penulis : Naufal Hady| Tanggal : 03 November 2022</div>
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


    <!-- footer -->
    {{-- <footer class="fot">
            <div class="container">
                <h3>Sistem Informasi Administarsi Kependudukan</h3>
                <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi
                    placeat.</p>
                <div class="social-links">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
                <div class="copyright">
                    &copy; Copyright <strong><span>SI | Kelompok 4</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>

        </footer> --}}
@endsection
