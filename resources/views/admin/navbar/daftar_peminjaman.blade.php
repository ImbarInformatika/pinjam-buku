@extends('admin.template.main')

{{-- untuk cssnya --}}
@push('style')
    <link rel="stylesheet" href="{{ asset('css') }}/datatables.css">
@endpush

@section('title', 'Daftar Peminjaman')


{{-- untuk contentnya --}}
@section('content')
    <section class="content-header">
        <h1>
            <b>Daftar Peminjaman</b>
            <a href="{{ route('tambah-peminjaman') }}" class="btn btn-primary">Tambahkan Peminjaman</a>
        </h1>
        <p>
            {{-- sukses buat peminjaman data --}}
            @if (session('success_tambah'))
                <div class="alert alert-success">
                    {{ session('success_tambah') }}
                </div>
            @endif

            {{-- eror buat peminjaman --}}
            @if (session('eror_tambah'))
                <div class="alert alert-danger">
                    {{ session('eror_tambah') }}
                </div>
            @endif

            {{-- sukses kembali data --}}
            @if (session('success_kembali'))
                <div class="alert alert-success">
                    {{ session('success_kembali') }}
                </div>
            @endif

            {{-- eror tambah --}}
            @if (session('eror_kembali'))
                <div class="alert alert-danger">
                    {{ session('eror_kembali') }}
                </div>
            @endif

        </p>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Judul Buku</th>
                            <th>Nomor Telepon</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal kembali</th>
                            <th>denda</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjaman as $no => $peminjaman)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peminjaman->mahasiswa->nama_mahasiswa }}</td>
                                <td>{{ $peminjaman->buku->judul_buku }}</td>
                                <td>{{ $peminjaman->no_telepon }}</td>
                                <td>{{ $peminjaman->tanggal_pinjam }}</td>
                                <td>{{ $peminjaman->tanggal_kembali }}</td>
                                <td>{{ $peminjaman->denda }}</td>
                                <td>
                                    @if ($peminjaman->status == 'Belum Kembali')
                                        <span>Belum Kembali</span>
                                    @else
                                        <span>Dikembalikan</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($peminjaman->status == 'Belum Kembali')
                                        <form action="{{ route('kembalikan', $peminjaman->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit">Kembalikan</button>
                                        </form>
                                    @else
                                        <span>Tidak tersedia</span>
                                    @endif
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


{{-- untuk javacriptnya --}}
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
