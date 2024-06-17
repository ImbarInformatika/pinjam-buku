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
            <b>Daftar Buku</b>
            <a href="{{ route('tambah-buku') }}" class="btn btn-primary">Tambahkan Buku</a>
        </h1>
        <p>
            {{-- sukses tambah data --}}
            @if (session('success_tambah'))
                <div class="alert alert-success">
                    {{ session('success_tambah') }}
                </div>
            @endif

            {{-- sukses hapus data --}}
            @if (session('success_hapus'))
                <div class="alert alert-success">
                    {{ session('success_hapus') }}
                </div>
            @endif

            {{-- eror hapus data --}}
            @if (session('eror_hapus'))
                <div class="alert alert-danger">
                    {{ session('eror_hapus') }}
                </div>
            @endif

            {{-- sukses edit data --}}
            @if (session('success_ubah'))
                <div class="alert alert-warning">
                    {{ session('success_ubah') }}
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
                    <table id="myTable" class="table table-bordered table-striped table-danger">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Nama Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Jumlah Buku</th>
                                <th>Tanggal Pengadaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($buku as $buku)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $buku->judul_buku }}</td>
                                    <td>{{ $buku->penerbit->nama_penerbit }}</td>
                                    <td>{{ $buku->tahun_terbit }}</td>
                                    <td>{{ $buku->jumlah_buku }}</td>
                                    <td>{{ $buku->tanggal_pengadaan }}</td>
                                    <td>
                                        <a href="{{ url('ubah-buku/' . $buku->id) }}" class="btn btn-warning">Ubah</a>
                                        <a href="{{ url('hapus-buku/' . $buku->id) }}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
@endsection

{{-- untuk javascriptnya --}}
@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js') }}/datatables.js"></script>


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
