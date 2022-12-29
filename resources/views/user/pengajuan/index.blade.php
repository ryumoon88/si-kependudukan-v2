@extends('user.layout.main')
@section('content')
    @push('css')
        <style>
            .box {
                margin-top: 80px;
                padding: 10px 20px 10px 20px;
            }

            .tittle {
                width: 100%;
                box-sizing: border-box;
                background: linear-gradient(0deg, rgb(42, 44, 57) 0%, rgb(51, 54, 74) 100%);
                padding: 10px;
                padding-bottom: 10px;
                font-size: 20px;
                font-weight: bold;
                color: white;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                text-align: left;
            }

            .ket {
                text-align: left;
                font-style: normal;
                color: black;
                padding: 10px;
            }

            .filelayanan {
                width: 100%;
                margin-top: 10px;
                text-align: left;
                padding: 10px;
                text-decoration: none;
            }

            .filelayanan a {
                text-decoration: none;
            }

            .filelayanan .btn {
                padding: 10px;
                background-color: rgb(51, 54, 74);
                font-size: 15px;
                color: white;
                padding: 10px 20px 10px 20px;
            }

            .filelayanan .btn:hover {
                background-color:#ef6603;
            }
        </style>
    @endpush
    <div class="box px-4 text-center">
        <div class="col">
            <div class="tittle">Data Layanan <br>
                <P>Data terkait layanan ini
                <P>
            </div>
            <div class="ket">
                <h6>Dokumen Petunjuk
                    Petunjuk lengkap tentang pengajuan layanan KTP -El (Baru Perekaman / Hilang / Rusak) dapat didownload
                    dengan menekan tombol berikut:
                </h6>
                <div class="filelayanan">
                    <a href="#" class="btn">Download Petunjuk</a>
                </div>
            </div>
        </div>
        <div class="row gx-5">
            <div class="col">
                <div class="tittle">Persyaratan</div>
                <div class="ket">
                    <h6>1. Surat Keteragan Perekaman atau Foto KTP El (rusak/patah/tidak terbaca)<br><br>
                        2. Kartu Keluarga (Jika Kartu Keluarga tidak ada, silahkan ajukan pelayanan Kartu Keluarga
                        (Hilang/Rusak) terlebih dahulu).<br><br>
                        3. Surat Keterangan Hilang dari Kepolisian (Jika Surat Keterangan Perekaman / KTP-EL lama)
                        4. Surat Keteragan Perekaman atau Foto KTP El (rusak/patah/tidak terbaca)<br><br>
                        5. Kartu Keluarga (Jika Kartu Keluarga tidak ada, silahkan ajukan pelayanan Kartu Keluarga
                        (Hilang/Rusak) terlebih dahulu).<br><br>
                        6. Surat Keterangan Hilang dari Kepolisian (Jika Surat Keterangan Perekaman / KTP-EL lama)
                        7. Foto Surat Keteragan atau Foto KTP El (rusak/patah/tidak terbaca)<br><br>
                        8. Foto Kartu Keluarga<br><br>
                        9. Surat Keterangan Hilang dari Kepolisian (Jika Surat Keterangan/KTP-EL lama)<br><br>
                        10. Foto Selpie (Jika pengambilan KTP-El di wakilkan anggota dalam Kartu Keluarga)</h6>
                </div>
            </div>
            <div class="col">
                <div class="tittle">Mekanisme Pengajuan</div>
                <div class="ket">
                    <h6>
                        1. Pemohon menyiapkan persyaratan yang dibutuhkan dan sudah berusia 17 tahun atau sudah pernah
                        menikah.<br><br>
                        2. Menyiapkan Surat Keterangan Hilang dari Kepolisian (Jika Surat Keterangan Perekaman / KTP-EL
                        lama hilang)<br><br>
                        3. Pemohon mengupload dokumen yang dibutuhkan<br><br>
                        4. Operator Dinas memvalidasi pengajuan pemohon<br><br>
                        5. Operator Dinas memproses penerbitan KTP EL<br><br>
                        6. KTP El telah selesai diterbitkan<br><br>
                        7. Pemohon mengambil KTP El tersebut di Dukcapil Ogan Ilir pada hari dan jam kerja, dengan
                        membawa asli Surat Keterangan Perekaman / KTP El lama (patah/rusak/tidak terbaca), atau Surat
                        Keterangan
                        Hilang dari Kepolisian Asli ( bukan fotocopi )<br><br>
                        8. Pengambilan KTP El yang sudah di cetak harus yang bersangkutan atau anggota dalam Kartu
                        Keluarga.<br><br>
                        9. Jika pemohon tidak dapat menunjukan atau tidak membawa asli Surat Keterangan Perekaman / KTP
                        El
                        lama (patah/rusak/tidak terbaca),, atau tidak membawa Surat Keterangan Hilang dari Kepolisian,
                        maka KTP El yang telah dicetak tidak dapat diambil.<br><br>
                        10. Maksimal pengajuan layanan KTP El hanya 1 KTP EL, jika lebih dari 1 KTP EL yang akan di
                        cetak, maka silahkan ajukan permohonan baru.
                    </h6>
                </div>
            </div>
        </div>


        <div class="row gx-5">
            <div class="col">
                <div class="tittle">Status Pengajuan</div>
                <div class="ket">
                    <h6>
                        1. Pengajuan baru | Pemohon melakukan pengajuan layanan<br><br>
                        3. Pengajuan disetujui | Pengajuan disetujui untuk diproses<br><br>
                        3. Pengajuan dibatalkan | Pengajuan dibatalkan. Alasan pembatalan dapat dilihat pada histori status
                        pengajuan<br><br>
                        4. Pengajuan diproses | Pengajuan sedang dalam proses pengerjaan Status pengerjaan saat ini dapat
                        dilihat pada histori proses pengerjaan<br><br>
                        5. Pengajuan selesai | Pengajuan selesai diproses
                    </h6>
                </div>
            </div>
            <div class="col">
                <div class="tittle">Isian Pengajuan</div>
                <div class="ket">
                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
                            <h6 class="mb-0">Nama Lengkap</h6>
                        </div>
                        <div class="col-md-9 pe-5">
                            <input type="text" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
                            <h6 class="mb-0">NIK</h6>
                        </div>
                        <div class="col-md-9 pe-5">
                            <input type="text" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
                            <h6 class="mb-0">No KK</h6>
                        </div>
                        <div class="col-md-9 pe-5">
                            <input type="text" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
                            <h6 class="mb-0">Tanggal</h6>
                        </div>
                        <div class="col-md-9 pe-5">
                            <input type="date" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
                            <h6 class="mb-0">Nama yang Mengambil</h6>
                        </div>
                        <div class="col-md-9 pe-5">
                            <input type="text" class="form-control form-control-lg" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
