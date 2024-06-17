@extends('admin.template.main')


@section('title', 'Tambah Penerbit')

@section('content')
    <section class="content-header">
        <h1>
            <b>Tambah Buku</b>
        </h1>

    </section>
    <section class="content">
        <p>
            @if ($errors->any())
                <div class="alert">
                    <div id="success-alert" class="alert alert-danger" role="alert">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </div>
                </div>
            @endif
        </p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <form id="quickForm" method="POST" action="{{ route('proses-tambah-buku') }}">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="judul_buku" class="form-label">Judul Buku</label>
                                    <input type="text" name="judul_buku" class="form-control" id="judul_buku"
                                        aria-describedby="judul_buku" value="{{ old('judul_buku') }}">

                                </div>
                                <div class="form-group">
                                    <label for="nama_penerbit" class="form-label">Nama Penerbit</label>
                                    <select name="id_penerbit" id="penerbit_id" class="form-control" required>
                                        @foreach ($penerbit as $penerbit)
                                            <option value="{{ $penerbit->id }}"
                                                {{ old('id_penerbit') == $penerbit->id ? 'selected' : '' }}>
                                                {{ $penerbit->nama_penerbit }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                    <input type="text" name="tahun_terbit" class="form-control " id="tahun_terbit"
                                        aria-describedby="tahun_terbit" value="{{ old('tahun_terbit') }}">

                                </div>
                                <div class="form-group">
                                    <label for="jumlah_buku" class="form-label">Jumlah Buku</label>
                                    <input type="text" name="jumlah_buku" class="form-control" id="jumlah_buku"
                                        aria-describedby="jumlah_buku" value="{{ old('jumlah_buku') }}">

                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pengadaan" class="form-label">Tanggal Pengadaan</label>
                                    <input type="date" name="tanggal_pengadaan" class="form-control"
                                        id="tanggal_pengadaan" aria-describedby="tanggal_pengadaan"
                                        value="{{ old('tanggal_pengadaan') }}">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
