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
        }

        .mahasiswa {
            background-color: #678bb3 !important;
        }

        .penerbit {
            background-color: #587a9d !important;
        }

        .keseluruhanbuku {
            background-color: #496581 !important;
        }

        .bukudipinjam {
            background-color: #3c5269 !important;
        }

        .bukuada {
            background-color: #47627e !important;
        }


        .small-box .inner {
            z-index: 2;
        }

        .small-box .icon {
            font-size: 90px;
            opacity: 0.2;
            position: absolute;
            right: 20px;
            top: 20px;
            z-index: 1;
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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endpush
