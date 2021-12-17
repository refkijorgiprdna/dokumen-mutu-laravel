@extends('layouts.admin')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dokumen Mutu</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('data-repository.index') }}">Dokumen Mutu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Dokumen</li>
        </ol>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <form action="{{ route('data-repository.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Nama Dokumen</label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul')  is-invalid  @enderror" placeholder="Nama Dokumen" value="{{ old('judul') }}" required>
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bagian">Bagian/Unit</label>
                    <select name="bagian" id="bagian" class="form-control" required>
                        <option value="">Pilih Bagian/Unit</option>
                        <optgroup label="Fakultas">
                            <option value="Fakultas KIP" @if(old('bagian') == 'Fakultas KIP') selected @endif>Fakultas KIP</option>
                            <option value="Fakultas Hukum" @if(old('bagian') == 'Fakultas Hukum') selected @endif>Fakultas Hukum</option>
                            <option value="Fakultas Pertanian" @if(old('bagian') == 'Fakultas Pertanian') selected @endif>Fakultas Pertanian</option>
                            <option value="Fakultas Ekonomi dan Bisnis" @if(old('bagian') == 'Fakultas Ekonomi dan Bisnis') selected @endif>Fakultas Ekonomi dan Bisnis</option>
                            <option value="Fakultas ISIPOL" @if(old('bagian') == 'Fakultas ISIPOL') selected @endif>Fakultas ISIPOL</option>
                            <option value="Fakultas Matematika dan IPA" @if(old('bagian') == 'Fakultas Matematika dan IPA') selected @endif>Fakultas Matematika dan IPA</option>
                            <option value="Fakultas Teknik" @if(old('bagian') == 'Fakultas Teknik') selected @endif>Fakultas Teknik</option>
                            <option value="Fakultas Kedokteran dan Ilmu Kesehatan" @if(old('bagian') == 'Fakultas Kedokteran dan Ilmu Kesehatan') selected @endif>Fakultas Kedokteran dan Ilmu Kesehatan</option>
                        </optgroup>
                        <optgroup label="Biro dan Lembaga">
                            <option value="Biro PPK" @if(old('bagian') == 'Biro PPK') selected @endif>Biro PPK</option>
                            <option value="Biro USD" @if(old('bagian') == 'Biro USD') selected @endif>Biro USD</option>
                            <option value="LPPM" @if(old('bagian') == 'LPPM') selected @endif>LPPM</option>
                            <option value="LPTIK" @if(old('bagian') == 'LPTIK') selected @endif>LPTIK</option>
                            <option value="LPMPP" @if(old('bagian') == 'LPMPP') selected @endif>LPMPP</option>
                        </optgroup>
                        <optgroup label="UNIT">
                            <option value="UPT Perpustakaan" @if(old('bagian') == 'UPT Perpustakaan') selected @endif>UPT Perpustakaan</option>
                            <option value="UPT PKM" @if(old('bagian') == 'UPT PKM') selected @endif>UPT PKM</option>
                            <option value="UPT Kearsipan" @if(old('bagian') == 'UPT Kearsipan') selected @endif>UPT Kearsipan</option>
                            <option value="UPT Kerja Sama dan Layanan Internasional" @if(old('bagian') == 'UPT Kerja Sama dan Layanan Internasional') selected @endif>UPT Kerja Sama dan Layanan Internasional</option>
                            <option value="UPT Bahasa" @if(old('bagian') == 'UPT Bahasa') selected @endif>UPT Bahasa</option>
                            <option value="Badan Pengembangan Bisnis" @if(old('bagian') == 'Badan Pengembangan Bisnis') selected @endif>Badan Pengembangan Bisnis</option>
                            <option value="Unit Layanan Pengadaan" @if(old('bagian') == 'Unit Layanan Pengadaan') selected @endif>Unit Layanan Pengadaan</option>
                            <option value="LPSE" @if(old('bagian') == 'LPSE') selected @endif>LPSE</option>
                        </optgroup>
                    </select>
                    @error('bagian')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_file">Pilih File</label>
                    <input type="file" name="nama_file" id="nama_file" class="form-control @error('nama_file') is-invalid @enderror" required>
                    @error('nama_file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>

</div>

@endsection
