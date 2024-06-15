@extends('admin.template.main')


@section('title', 'Ubah Penerbit')

@section('content')
    <section class="content-header">
        <h1>
            <b>Ubah Mahasiswa</b>
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
                        <form id="quickForm" method="POST" action="{{ route('proses-ubah-mahasiswa') }}">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
                                    <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                                    <input type="text" name="nama_mahasiswa" class="form-control" id="nama_mahasiswa"
                                        aria-describedby="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa }}">

                                </div>
                                <div class="form-group">
                                    <label for="nim" class="form-label">Nim</label>
                                    <input type="text" name="nim" class="form-control" id="nim"
                                        aria-describedby="nim" value="{{ $mahasiswa->nim }}">
                                </div>
                                <div class="form-group">
                                    <label for="angkatan" class="form-label">Angkatan</label>
                                    <input type="text" name="angkatan" class="form-control" id="angkatan"
                                        aria-describedby="angkatan" value="{{ $mahasiswa->angkatan }}">
                                </div>
                                <div class="form-group">
                                    <label for="fakultas" class="form-label">Fakultas</label>
                                    <input type="text" name="fakultas" class="form-control" id="fakultas"
                                        aria-describedby="fakultas" value="{{ $mahasiswa->fakultas }}">
                                </div>
                                <div class="form-group">
                                    <label for="prodi" class="form-label">Prodi</label>
                                    <input type="text" name="prodi" class="form-control" id="prodi"
                                        aria-describedby="prodi" value="{{ $mahasiswa->prodi }}">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
