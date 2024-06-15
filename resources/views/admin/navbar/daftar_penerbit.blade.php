@extends('admin.template.main')

{{-- untuk cssnya --}}
@push('style')
    <link rel="stylesheet" href="{{ asset('css') }}/datatables.css">
@endpush

@section('title', 'Daftar-penerbit')

{{-- untuk contentnya --}}
@section('content')
    <section class="content-header">
        <h1>
            <b>Daftar Penerbit</b>
            <a href=" {{ route('tambah-penerbit') }} " class="btn btn-primary">Tambah Penerbit</a>
        </h1>
        <P>
            {{-- alert untuk sukses --}}
            @if (session('success_tambah'))
                <div class="alert alert-success">
                    <span class="close-btn"></span>
                    {{ session('success_tambah') }}
                </div>
            @endif

            {{-- alert untuk hapus  --}}
            @if (session('success_hapus'))
                <div class="alert alert-danger">
                    {{ session('success_hapus') }}
                </div>
            @endif

            {{-- gagal hapus data --}}
            @if (session('eror_hapus'))
                <div class="alert alert-danger">
                    {{ session('eror_hapus') }}
                </div>
            @endif

            {{-- alert untuk edit --}}
            @if (session('success_edit'))
                <div class="alert alert-warning">
                    {{ session('success_edit') }}
                </div>
            @endif
        </P>

    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped table-danger">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penerbit as $penerbit)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $penerbit->nama_penerbit }} </td>
                                <td> {{ $penerbit->alamat }} </std>
                                <td> {{ $penerbit->no_telepon }} </td>
                                <td>

                                    <a href="{{ url('ubah-penerbit/' . $penerbit->id) }}"
                                        class="btn btn-warning btn-sm">Ubah</a>
                                    <a href="{{ url('hapus-penerbit/' . $penerbit->id) }}"
                                        class="btn btn-danger btn-sm">Hapus</a>
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
