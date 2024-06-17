@extends('admin.template.main')


@section('title', 'Tambah Peminjaman')

@section('content')
    <section class="content-header">
        <h1>
            <b>Tambah Peminjaman</b>
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
                        <form action="{{ route('simpan-peminjaman') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                                <select name="id_mahasiswa" class="form-control " id="id_mahasiswa"
                                    aria-describedby="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}">
                                    @foreach ($mahasiswa as $mahasiswa)
                                        <option value="{{ $mahasiswa->id }}"
                                            {{ old('id_mahasiswa') == $mahasiswa->id ? 'selected' : '' }}>
                                            {{ $mahasiswa->nama_mahasiswa }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="judul_buku" class="form-label">Judul Buku</label>
                                <select name="id_buku" class="form-control" id="id_buku" aria-describedby="judul_buku">
                                    @foreach ($buku as $buku_item)
                                        <option value="{{ $buku_item->id }}"
                                            {{ old('judul_buku') == $buku_item->id ? 'selected' : '' }}>
                                            {{ $buku_item->judul_buku }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                <input type="yaer" name="no_telepon" class="form-control " id="no_telepon"
                                    aria-describedby="no_telepon" value="{{ old('no_telepon') }}">
                                @if ($errors->has('no_telepon'))
                                    <span class="text-danger">{{ $errors->first('no_telepon') }}</span>
                                @endif
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
