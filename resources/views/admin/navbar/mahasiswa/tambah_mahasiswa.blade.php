@extends('admin.template.main')


@section('title', 'Tambah Penerbit')

@section('content')
    <section class="content-header">
        <h1>
            <b>Tambah Mahasiswa</b>
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
                        <form id="quickForm" method="POST" action="{{ route('simpan-mahasiswa') }}">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                                    <input type="text" name="nama_mahasiswa" class="form-control" id="nama_mahasiswa"
                                        aria-describedby="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}">

                                </div>
                                <div class="form-group">
                                    <label for="nim" class="form-label">Nim</label>
                                    <input type="text" name="nim" class="form-control" id="nim"
                                        aria-describedby="nim" value="{{ old('nim') }}">
                                </div>
                                <div class="form-group">
                                    <label for="angkatan" class="form-label">Angkatan</label>
                                    <input type="text" name="angkatan" class="form-control" id="angkatan"
                                        aria-describedby="angkatan" value="{{ old('angkatan') }}">
                                </div>
                                <div class="form-group">
                                    <label for="fakultas" class="form-label">Fakultas</label>
                                    <input type="text" name="fakultas" class="form-control" id="fakultas"
                                        aria-describedby="fakultas" value="{{ old('fakultas') }}">
                                </div>
                                <div class="form-group">
                                    <label for="prodi" class="form-label">Prodi</label>
                                    <input type="text" name="prodi" class="form-control" id="prodi"
                                        aria-describedby="prodi" value="{{ old('prodi') }}">
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

@push('script')
    <script>
        function showSuccessAlert() {
            var alertElement = document.getElementById('success-alert');
            alertElement.style.display = 'block';
        }

        // Misalnya, fungsi ini dipanggil setelah data berhasil ditambahkan
        showSuccessAlert();
    </script>
@endpush
