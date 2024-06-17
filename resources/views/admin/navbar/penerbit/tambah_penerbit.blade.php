@extends('admin.template.main')


@section('title', 'Tambah Penerbit')

@section('content')
    <section class="content-header">
        <h1>
            <b>Tambah Penerbit</b>
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
                        <form id="quickForm" method="POST" action="{{ route('simpan-penerbit') }}">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_penerbit" class="form-label">Nama Penerbit</label>
                                    <input type="text" name="nama_penerbit" class="form-control" id="nama_penerbit"
                                        aria-describedby="nama_penerbit" value="{{ old('nama_penerbit') }}">

                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat"
                                        aria-describedby="alamat" value="{{ old('alamat') }}">
                                </div>
                                <div class="form-group">
                                    <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="text" name="no_telepon" class="form-control" id="no_telepon"
                                        aria-describedby="no_telepon" value="{{ old('no_telepon') }}">
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
