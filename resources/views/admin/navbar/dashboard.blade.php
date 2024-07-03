@extends('admin.template.main')
@section('title', 'Dashboard')

@push('style')
    <style>
        .small-box {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            color: white;
            border-radius: 3px;
            overflow: hidden;
            /* Perubahan: Tambahkan margin-bottom untuk memberikan jarak antar card */
            margin-bottom: 20px;
        }

        .mahasiswa {
            background-color: #afc9f0 !important;
            color: white
        }


        .penerbit {
            background-color: #88b1ee !important;
            color: white
        }

        .keseluruhanbuku {
            background-color: #5c96ec !important;
            color: white
        }

        .bukudipinjam {
            background-color: #3a85f6 !important;
            color: white
        }

        .bukuada {
            background-color: #2d7bf1 !important;
            color: white
        }

        .small-box .inner {
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* Perubahan: Tambahkan align-items flex-start untuk rata kiri */
        }

        .small-box .inner h3 {
            margin: 0;
            font-size: 2.2em;
            text-align: left;
            /* Perubahan: pastikan teks nilai rata kiri */
        }

        .small-box .inner h4 {
            margin: 0;
            font-size: 1.2em;
            text-align: center;
            /* Perubahan: pastikan teks judul tetap rata tengah */
            align-self: center;
            /* Perubahan: pastikan teks judul tetap rata tengah */
        }

        .small-box .icon {
            font-size: 90px;
            opacity: 0.2;
            position: absolute;
            right: 20px;
            top: 20px;
            z-index: 1;
        }

        /* Perubahan: Tambahkan media query untuk memastikan isi card berada di tengah ketika responsif */
        @media (max-width: 768px) {
            .small-box {
                flex-direction: column;
                text-align: center;
            }

            .small-box .icon {
                position: static;
                margin-top: 10px;
            }

            .small-box .inner {
                align-items: center;
                /* Perubahan: pastikan teks nilai dan judul berada di tengah ketika responsif */
            }

            .small-box .inner h3,
            .small-box .inner h4 {
                text-align: center;
                /* Perubahan: pastikan teks nilai dan judul berada di tengah ketika responsif */
            }
        }
    </style>
@endpush

@section('content')
    <section class="content-header">
        <h1>
            <b>Dashboard Admin</b>
        </h1>

        <p>
            @if (session('berhasil_login'))
                <div class="alert alert-success">
                    {{ session('berhasil_login') }}
                </div>
            @endif
        </p>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="small-box mahasiswa">
                        <div class="inner">
                            <h3><strong>{{ $jumlah_mahasiswa }}</strong></h3>
                            <h4><strong>Total Mahasiswa</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="small-box penerbit">
                        <div class="inner">
                            <h3><strong>{{ $jumlah_penerbit }}</strong></h3>
                            <h4><strong>Total Penerbit</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-pencil"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="small-box keseluruhanbuku">
                        <div class="inner">
                            <h3><strong>{{ $jumlah_buku }}</strong></h3>
                            <h4><strong>Total Keseluruhan Buku</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="small-box bukuada">
                        <div class="inner">
                            <h3><strong>{{ $jumlah_buku_ada }}</strong></h3>
                            <h4><strong>Total Buku Masih Ada</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="small-box bukudipinjam">
                        <div class="inner">
                            <h3><strong>{{ $jumlah_buku_dipinjam }}</strong></h3>
                            <h4><strong>Total Buku yang sedang Dipinjam</strong></h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    {{--  --}}
@endpush
