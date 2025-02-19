@extends('admin/app_admin')
@section('navbar')
    <!-- TOP Nav Bar -->
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <div class="iq-sidebar-logo">
                <div class="top-logo">
                    <a href="index.html" class="logo">
                        <span>Al-Huda Admin</span>
                    </a>
                </div>
            </div>
            {{-- Halaman --}}
            <div class="navbar-breadcrumb">
                <h5 class="mb-0">Informasi Santri</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/beranda') }}">Main</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Santri</li>
                        <li class="breadcrumb-item active" aria-current="page">Informasi Santri</li>
                    </ul>
                </nav>
            </div>
            {{-- Logo Kanan --}}
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="line-menu half start"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu half end"></div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list">
                        {{-- FullScreen --}}
                        <li class="nav-item iq-full-screen"><a href="#" class="iq-waves-effect" id="btnFullscreen">
                                <i class="ri-fullscreen-line"></i></a></li>
                    </ul>
                </div>
                <ul class="navbar-list">
                    <li>
                        <a href="#" class="search-toggle iq-waves-effect bg-white text-white"><img
                                src="{{ asset('images/local/user-1.png') }}" class="img-fluid rounded" alt="user"></a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white line-height">Nama User</h5>
                                        <span class="text-white font-size-12">Online</span>
                                    </div>
                                    <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-primary">
                                                <i class="ri-file-user-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Profil Saya</h6>
                                                <p class="mb-0 font-size-12">Tampilkan data pribadi saya.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-secondary-hover">
                                        <div class="media align-items-center">
                                            <div class="rounded iq-card-icon iq-bg-secondary">
                                                <i class="ri-lock-line"></i>
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Setelan Privasi</h6>
                                                <p class="mb-0 font-size-12">Kontrol parameter privasi Anda.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="d-inline-block w-100 text-center p-3">
                                        <form action="{{ url('/logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="iq-bg-danger iq-sign-btn btn-block">Keluar<i
                                                    class="ri-login-box-line ml-2"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                {{-- Card Head --}}
                <div class="col-sm-12">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body profile-page p-0">
                            <div class="profile-header">
                                <div class="cover-container">
                                    <div class="rounded" style="position: relative;">
                                        <div class="rounded"
                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
                                        </div>
                                        <img src="{{ asset('images/local/bg-3.png') }}" alt="profile-bg"
                                            class="rounded img-fluid w-100" style="height: 25vh; object-fit: cover;">
                                    </div>
                                    <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                        <li><a href="{{ url('/admin/santri/edit/' . $santri->id_santri) }}"><i
                                                    class="ri-pencil-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="profile-info p-4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="user-detail pl-5">
                                                <div class="d-flex flex-wrap align-items-center">
                                                    <div class="profile-img pr-4">
                                                        @php
                                                            $fotoPath = 'berkas_santri/pas_foto_santri/' . $santri->pas_foto_santri;
                                                        @endphp

                                                        @if ($santri->pas_foto_santri && file_exists(public_path($fotoPath)))
                                                            <img src="{{ asset($fotoPath) }}" alt="profile-img" class="avatar-130 img-fluid" style="object-fit:cover;" />
                                                        @else
                                                            <img src="{{ asset('images/page-img/15.jpg') }}" alt="profile-img" class="avatar-130 img-fluid" style="object-fit:cover;" />
                                                        @endif
                                                    </div>
                                                    <div class="profile-detail align-items-center">
                                                        <h3>{{ $santri->nama_santri }}</h3>
                                                        <p>
                                                            No. Induk {{ $santri->no_induk }} / 
                                                            @if (in_array($santri->tingkatan, ['1', '2', '3', '4', '5', '6']))
                                                                Kelas {{ $santri->tingkatan }}
                                                            @elseif (in_array($santri->tingkatan, ['1_TSA', '2_TSA', '3_TSA']))
                                                                {{ str_replace('_', ' ', $santri->tingkatan) }}
                                                            @elseif ($santri->tingkatan == 'pengus')
                                                                Pengurus
                                                            @endif /
                                                            @if ($santri->status_santri == 'tidak_mukim')
                                                                <span class="badge badge-pill badge-primary">Tidak Mukim</span>
                                                            @else
                                                                <span class="badge badge-pill badge-success">Mukim</span>
                                                            @endif
                                                        </p>                                                        
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
                <!-- Alert -->
                <div class="container-fluid">
                    @if (session('success'))
                        <div id="success-alert" class="alert text-white bg-success" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-checkbox-circle-line"></i>
                            </div>
                            <div class="iq-alert-text"><b>Berhasil !</b> {{ session('success') }}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div id="error-alert" class="alert text-white bg-danger" role="alert">
                                <div class="iq-alert-icon">
                                    <i class="ri-information-line"></i>
                                </div>
                                <div class="iq-alert-text"><b>Gagal ! </b> {{ $err }}</div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        {{-- Kolom Kiri --}}
                        <div class="col-lg-5 profile-left">
                            {{-- Card About Santri --}}
                            <div class="iq-card iq-card-block iq-card-stretch">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Informasi Santri</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="about-info m-0 p-0">
                                        <div class="row">
                                            <div class="col-4">Email</div>
                                            <div class="col-8"><a href="mailto:{{ $santri->email_santri }}">: <span
                                                        class="text-primary">{{ $santri->email_santri }}</span></a></div>
                                            <div class="col-4">No Telepon</div>
                                            <div class="col-8"><a href="tel:{{ $santri->no_hp_santri }}">: <span
                                                        class="text-primary">{{ $santri->no_hp_santri }}</span></a></div>
                                            <div class="col-4">No Identitas (KTP/SIM)</div>
                                            <div class="col-8">: {{ $santri->no_identitas }}</div>
                                            <div class="col-4">Tahun Masuk</div>
                                            <div class="col-8">: {{ $santri->tahun_masuk }}</div>
                                            <div class="col-4">Jenis Kelamin</div>
                                            <div class="col-8">: {{ ucfirst($santri->jenis_kelamin_santri) }}</div>
                                            <div class="col-4">TTL</div>
                                            <div class="col-8">: {{ $santri->tempat_tanggal_lahir_santri }}</div>
                                            <div class="col-4">Anak ke</div>
                                            <div class="col-8">: {{ $santri->anak_ke }}</div>
                                            <div class="col-4">Jumlah Saudara</div>
                                            <div class="col-8">: {{ $santri->jumlah_saudara_kandung }}</div>
                                            <div class="col-4">Alamat</div>
                                            <div class="col-8">: {{ $santri->alamat_santri }}</div>
                                            <div class="col-4 mt-2">Berkas Santri</div>
                                            <div class="col-8">:</div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <a class="text-primary" data-placement="top" title="KTP"
                                                    href="#" data-target="#ktpModal" data-toggle="modal"><i
                                                        class="ri-file-fill"></i> KTP</a>
                                            </div>
                                            <div class="col">
                                                <a class="text-primary" data-placement="top" title="KK"
                                                    href="#" data-target="#kkModal" data-toggle="modal"><i
                                                        class="ri-file-fill"></i> KK</a>
                                            </div>
                                            <div class="col">
                                                <a class="text-primary" data-placement="top" title="Akta"
                                                    href="#" data-target="#aktaModal" data-toggle="modal"><i
                                                        class="ri-file-fill"></i>
                                                    Akta</a>
                                            </div>
                                            <div class="col">
                                                <a class="text-primary" data-placement="top" title="Pas Foto"
                                                    href="#" data-target="#pasfotoModal" data-toggle="modal"><i
                                                        class="ri-file-fill"></i> Pas
                                                    Foto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card About Orang Tua --}}
                            <div class="iq-card iq-card-block iq-card-stretch">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Informasi Orang Tua Santri</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="about-info m-0 p-0">
                                        <div class="row">
                                            <div class="col-4">Nama Ayah</div>
                                            <div class="col-8">: {{ $santri->nama_ayah }}</div>
                                            <div class="col-4">Nama Ibu</div>
                                            <div class="col-8">: {{ $santri->nama_ibu }}</div>
                                            <div class="col-4">Pendidikan Ayah</div>
                                            <div class="col-8">: {{ $santri->pendidikan_ayah }}</div>
                                            <div class="col-4">Pendidikan Ibu</div>
                                            <div class="col-8">: {{ $santri->pendidikan_ibu }}</div>
                                            <div class="col-4">Pekerjaan Ayah</div>
                                            <div class="col-8">: {{ $santri->pekerjaan_ayah }}</div>
                                            <div class="col-4">Pekerjaan Ibu</div>
                                            <div class="col-8">: {{ $santri->pekerjaan_ibu }}</div>
                                            <div class="col-4">Pendapatan Perbulan Ayah</div>
                                            <div class="col-8">: {{ 'RP ' . number_format($santri->pendapatan_ayah_perbulan, 0, ',', '.') }}</div>
                                            <div class="col-4">Pendapatan Perbulan Ibu</div>
                                            <div class="col-8">: {{ 'RP ' . number_format($santri->pendapatan_ibu_perbulan, 0, ',', '.') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        {{-- Kolom Kanan --}}
                        <div class="col-lg-7 profile-right">
                            {{-- Tagihan --}}
                            <div class="iq-card iq-card-block iq-card-stretch">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Tagihan Santri</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <ul class="m-0 p-0">
                                        @if (!$TagihanPembayaran->isEmpty())
                                            @foreach ($TagihanPembayaran as $pembayaran)
                                                <li class="d-flex mb-1">
                                                    <div class="news-icon"><i class="ri-message-2-fill"></i></div>
                                                    <div class="news-detail mt-1">
                                                        <p class="mb-0">
                                                            Pembayaran
                                                            @if ($pembayaran->jenis_pembayaran == 'daftar_ulang')
                                                                <span class="text-danger">Daftar Ulang</span>
                                                            @elseif ($pembayaran->jenis_pembayaran == 'iuran_bulanan')
                                                                <span class="text-warning">Iuran Bulanan</span>
                                                            @else
                                                                <span class="text-success">Semester</span>
                                                            @endif
                                                            
                                                            untuk 
                                                            @if ($pembayaran->jenis_pembayaran == 'iuran_bulanan')
                                                                {{ $currentMonth }}
                                                            @endif
                                                            semester {{ $pembayaran->semester_ajaran }} tahun
                                                            {{ $pembayaran->tahun_ajaran }} sejumlah
                                                            {{ 'RP ' . number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}
                                                            @if (auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin_pembayaran')
                                                                , <a class="text-primary" data-placement="top"
                                                                    title="Bayar" href="#"
                                                                    data-target="#bayarModal{{ $pembayaran->id_pembayaran }}"
                                                                    data-toggle="modal">Bayar Sekarang</a>
                                                            @endif
                                                        </p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <p class="text-center">Tidak ada tagihan</p>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            {{-- Riwayat --}}
                            <div class="iq-card iq-card-block iq-card-stretch">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Riwayat Pembayaran Santri</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body pt-1" style="max-height: 300px; overflow-y: auto;">
                                    <ul class="m-0 p-0 pb-2">
                                        {{-- @if (!$RiwayatPembayaran->isEmpty())
                                            @foreach ($RiwayatPembayaran as $pembayaran)
                                                @php

                                                    $tanggal_pembayaran = \Carbon\Carbon::parse(
                                                        $pembayaran->tanggal_pembayaran,
                                                    )->translatedFormat('d F Y'); // Format tanggal dengan hari dan bulan dalam bahasa Indonesia

                                                    $variabel_jam = \Carbon\Carbon::parse(
                                                        $pembayaran->tanggal_pembayaran,
                                                    )->format('H:i'); // Format waktu

                                                @endphp
                                                <li class="d-flex mb-1">
                                                    <div class="news-icon"><i class="ri-chat-check-fill"></i></div>
                                                    <div class="news-detail mt-1">
                                                        <p class="mb-0">
                                                            Pembayaran
                                                            @if ($pembayaran->jenis_pembayaran == 'daftar_ulang')
                                                                <span class="text-danger">Daftar Ulang</span>
                                                            @elseif ($pembayaran->jenis_pembayaran == 'iuran_bulanan')
                                                                <span class="text-warning">Iuran Bulanan</span>
                                                            @else
                                                                <span class="text-success">Tamrin</span>
                                                            @endif
                                                            untuk semester {{ $pembayaran->semester_ajaran }} tahun
                                                            {{ $pembayaran->tahun_ajaran }} sejumlah
                                                            {{ 'RP ' . number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }},
                                                            dibayar pada {{ $tanggal_pembayaran }} jam {{ $variabel_jam }}
                                                            dan diterima oleh
                                                            {{ $pembayaran->user->nama_admin }}
                                                        </p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <p class="text-center">Tidak ada riwayat</p>
                                        @endif --}}
                                        @if (!$RiwayatPembayaran->isEmpty())
                                            @php
                                                $previousDate = null;
                                            @endphp
                                            @foreach ($RiwayatPembayaran as $pembayaran)
                                                @php
                                                    // Format tanggal pembayaran
                                                    $tanggal_pembayaran = \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)
                                                        ->translatedFormat('d F Y'); // Format tanggal dengan hari dan bulan dalam bahasa Indonesia

                                                    // Format waktu pembayaran
                                                    $variabel_jam = \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)
                                                        ->format('H:i'); // Format waktu
                                                @endphp

                                                {{-- Cek apakah tanggal pembayaran berbeda dengan tanggal sebelumnya --}}
                                                @if ($previousDate !== $tanggal_pembayaran)
                                                    @php
                                                        $previousDate = $tanggal_pembayaran;
                                                    @endphp

                                                    {{-- Tampilkan tanggal sebagai header kelompok --}}
                                                    <h5 class="mt-2 mb-1 d-flex align-items-center">
                                                        <span class="badge badge-light text-secondary">{{ $tanggal_pembayaran }}</span>
                                                        <hr class="flex-grow-1 ml-2" style="border: 0; border-bottom: 1px solid #ccc;">
                                                        <a href="{{ route('cetak.riwayat', ['id_santri' => $pembayaran->id_santri,'tanggal' => $pembayaran->tanggal_pembayaran]) }}" target="_blank" class="ml-2 btn btn-sm text-primary">
                                                            <i class="ri-bill-fill"></i> Cetak
                                                        </a>
                                                    </h5>                                                                                                       
                                                @endif

                                                {{-- Tampilkan detail pembayaran --}}
                                                <li class="d-flex mb-1">
                                                    <div class="news-icon"><i class="ri-chat-check-fill"></i></div>
                                                    <div class="news-detail mt-1">
                                                        <p class="mb-0">
                                                            Pembayaran
                                                            @if ($pembayaran->jenis_pembayaran == 'daftar_ulang')
                                                                <span class="text-danger">Daftar Ulang</span>
                                                            @elseif ($pembayaran->jenis_pembayaran == 'iuran_bulanan')
                                                                <span class="text-warning">Iuran Bulanan</span>
                                                            @else
                                                                <span class="text-success">Semester</span>
                                                            @endif
                                                            
                                                            untuk 
                                                            @if ($pembayaran->jenis_pembayaran == 'iuran_bulanan')
                                                                {{ $currentMonth }}
                                                            @endif 
                                                            semester {{ $pembayaran->semester_ajaran }} tahun {{ $pembayaran->tahun_ajaran }} sejumlah
                                                            {{ 'RP ' . number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }},
                                                            dibayar pada {{ $tanggal_pembayaran }} jam {{ $variabel_jam }} dan diterima oleh
                                                            {{ $pembayaran->user->nama_admin }}
                                                        </p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <p class="text-center">Tidak ada riwayat</p>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            {{-- Card About Wali Santri --}}
                            <div class="iq-card iq-card-block iq-card-stretch">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Informasi Wali Santri</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="about-info m-0 p-0">
                                        <div class="row">
                                            <div class="col-4">Nama</div>
                                            <div class="col-8">: {{ $wali->nama_wali }}</div>
                                            <div class="col-4">No Identitas (KTP/SIM)</div>
                                            <div class="col-8">: {{ $wali->no_identitas_wali }}</div>
                                            <div class="col-4">TTL</div>
                                            <div class="col-8">: {{ $wali->tempat_tanggal_lahir_wali }}</div>
                                            <div class="col-4">Email</div>
                                            <div class="col-8"><a href="mailto:{{ $wali->email }}">: <span
                                                        class="text-primary">{{ $wali->email }}</span></a></div>
                                            <div class="col-4">No Telepon</div>
                                            <div class="col-8"><a href="tel:{{ $wali->no_hp }}">: <span
                                                        class="text-primary">{{ $wali->no_hp }}</span></a></div>
                                            <div class="col-4">Alamat</div>
                                            <div class="col-8">: {{ $wali->alamat_wali }}</div>
                                            <div class="col-4">Status</div>
                                            <div class="col-8">: {{ $wali->status_wali }}</div>
                                            <div class="col-4">Pendidikan</div>
                                            <div class="col-8">: {{ $wali->pendidikan_wali }}</div>
                                            <div class="col-4">Pekerjaan</div>
                                            <div class="col-8">: {{ $wali->pekerjaan_wali }}</div>
                                            <div class="col-4">Pendapatan Perbulan</div>
                                            <div class="col-8">: {{ 'RP ' . number_format($wali->pendapatan_wali_perbulan, 0, ',', '.') }}</div>
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

    {{-- Modal KTP --}}
    <div class="modal fade" id="ktpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">KTP Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark" id="dynamicContent">
                    <div class="px-3 py-2">
                        <div class="mt-2 text-center">
                            @if ($santri->ktp_santri === null)
                                <div class="bg-light" style="width: 440px; height: 300px; border-radius: 20px;">
                                    <p class="text-center text-secondary" style="padding-top: 100px;">Gambar tidak ada.
                                    </p>
                                </div>
                            @else
                                <img src="{{ asset('berkas_santri/ktp_santri/' . $santri->ktp_santri) }}"
                                    alt="KTP Santri" class="img-fluid" style="max-width: 440px; border-radius: 20px;">
                                <p class="mt-2"><a
                                        href="{{ asset('berkas_santri/ktp_santri/' . $santri->ktp_santri) }}"
                                        download>Download KTP</a></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal KK --}}
    <div class="modal fade" id="kkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">KK Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark" id="dynamicContent">
                    <div class="px-3 py-2">
                        <div class="mt-2 text-center">
                            @if ($santri->kk_santri === null)
                                <div class="bg-light" style="width: 600px; height: 400px; border-radius: 20px;">
                                    <p class="text-center text-secondary" style="padding-top: 150px;">Gambar tidak ada.
                                    </p>
                                </div>
                            @else
                                <img src="{{ asset('berkas_santri/kk_santri/' . $santri->kk_santri) }}" alt="KK Santri"
                                    class="img-fluid" style="max-width: 600px; border-radius: 20px;">
                                <p class="mt-2"><a href="{{ asset('berkas_santri/kk_santri/' . $santri->kk_santri) }}"
                                        download>Download KK</a></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Akta --}}
    <div class="modal fade" id="aktaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Akta Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark" id="dynamicContent">
                    <div class="px-3 py-2">
                        <div class="mt-2 text-center">
                            @if ($santri->akta_santri === null)
                                <div class="bg-light" style="width: 600px; height: 400px; border-radius: 20px;">
                                    <p class="text-center text-secondary" style="padding-top: 150px;">Gambar tidak ada.
                                    </p>
                                </div>
                            @else
                                <img src="{{ asset('berkas_santri/akta_santri/' . $santri->akta_santri) }}"
                                    alt="Akta Santri" class="img-fluid" style="max-width: 600px; border-radius: 20px;">
                                <p class="mt-2"><a
                                        href="{{ asset('berkas_santri/akta_santri/' . $santri->akta_santri) }}"
                                        download>Download Akta</a></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Pas Foto --}}
    <div class="modal fade" id="pasfotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Pas Foto Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark" id="dynamicContent">
                    <div class="px-3 py-2">
                        <div class="mt-2 text-center">
                            @if ($santri->pas_foto_santri === null)
                                <div class="bg-light" style="width: 440px; height: 300px; border-radius: 20px;">
                                    <p class="text-center text-secondary" style="padding-top: 100px;">Gambar tidak ada.
                                    </p>
                                </div>
                            @else
                                <img src="{{ asset('berkas_santri/pas_foto_santri/' . $santri->pas_foto_santri) }}"
                                    alt="Pas Foto Santri" class="img-fluid"
                                    style="max-width: 440px; border-radius: 20px;">
                                <p class="mt-2"><a
                                        href="{{ asset('berkas_santri/pas_foto_santri/' . $santri->pas_foto_santri) }}"
                                        download>Download Pas Foto</a></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Bayar --}}
    @foreach ($TagihanPembayaran as $pembayaran)
        <div class="modal fade" id="bayarModal{{ $pembayaran->id_pembayaran }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <form id="deleteForm" method="post"
                        action="{{ url('/admin/santri/pembayaran/' . $pembayaran->jenis_pembayaran . '/' . $pembayaran->id_pembayaran . '/update') }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body text-center">
                            <img src="{{ asset('images/local/payment.png') }}" width="80px" alt="">
                            <p class="mt-4" style="font-size: 17px">Benarkah {{ $pembayaran->santri->nama_santri }}
                                ingin membayar tagihan
                                <strong
                                    class="@if ($pembayaran->jenis_pembayaran == 'daftar_ulang') text-danger @elseif($pembayaran->jenis_pembayaran == 'iuran_bulanan') text-warning @else text-success @endif">
                                    {{ ucwords(str_replace('_', ' ', $pembayaran->jenis_pembayaran)) }}
                                </strong> semester
                                <strong>
                                    {{ ucfirst($pembayaran->semester_ajaran) }}
                                </strong> tahun
                                <strong>
                                    {{ $pembayaran->tahun_ajaran }}
                                </strong> ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Bayar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
