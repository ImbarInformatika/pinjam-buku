@extends('admin.template.main')

{{-- untuk cssnya --}}
@push('style')
    <link rel="stylesheet" href="{{ asset('css') }}/datatables.css">
@endpush

@section('title', 'Daftar Mahasiswa')

{{-- content --}}
@section('content')
    <section class="content-header">
        <h1>
            <b>Daftar Mahasiswa</b>
            <a href="{{ route('tambah-mahasiswa') }}" class="btn btn-primary">Tambah Mahasiswa</a>
        </h1>

        <p>
            @if (session('success_tambah'))
                <div class="alert alert-success">
                    {{ session('success_tambah') }}
                </div>
            @endif

            @if (session('success_edit'))
                <div class="alert alert-warning">
                    {{ session('success_edit') }}
                </div>
            @endif

            @if (session('eror_edit'))
                <div class="alert alert-danger">
                    {{ session('eror_edit') }}
                </div>
            @endif

            @if (session('eror_hapus'))
                <div class="alert alert-danger">
                    {{ session('eror_hapus') }}
                </div>
            @endif

            @if (session('success_hapus'))
                <div class="alert alert-success">
                    {{ session('success_hapus') }}
                </div>
            @endif
        </p>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nim</th>
                                <th>Angkatan</th>
                                <th>Fakultas</th>
                                <th>Prodi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswa as $mhs)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mhs->nama_mahasiswa }}</td>
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->angkatan }}</td>
                                    <td>{{ $mhs->fakultas }}</td>
                                    <td>{{ $mhs->prodi }}</td>
                                    <td>
                                        <a href="{{ url('ubah-mahasiswa/' . $mhs->id) }}" class="btn btn-warning">Ubah</a>
                                        <a href="{{ url('hapus-mahasiswa/' . $mhs->id) }}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js') }}/datatables.js"></script>


    <script src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json"
                }
            });
        });
    </script>
@endpush
