@extends('layouts.admin')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Repository</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="./">Data Repository</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <form action="{{ route('data-repository.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="kode_repository">Kode Repository</label>
                    <input type="text" name="kode_repository" id="kode_repository" class="form-control @error('kode_repository') is-invalid @enderror" placeholder="Kode Repository" value="{{ old('kode_repository') }}">
                    @error('kode_repository')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul')  is-invalid  @enderror" placeholder="Judul" value="{{ old('judul') }}">
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_file">Pilih File</label>
                    <input type="file" name="nama_file" id="nama_file" class="form-control @error('nama_file') is-invalid @enderror">
                    @error('nama_file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dosen_pembimbing">Dosen Pembimbing</label>
                    <input type="text" name="dosen_pembimbing" id="dosen_pembimbing" class="form-control @error('dosen_pembimbing')  is-invalid  @enderror" placeholder="Dosen Pembimbing" value="{{ old('dosen_pembimbing') }}">
                    @error('dosen_pembimbing')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" name="penulis" id="penulis" class="form-control @error('penulis')  is-invalid  @enderror" placeholder="Penulis" value="{{ old('penulis') }}">
                    @error('penulis')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan')  is-invalid  @enderror" placeholder="Jurusan" value="{{ old('jurusan') }}">
                    @error('jurusan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control @error('fakultas')  is-invalid  @enderror" placeholder="Fakultas" value="{{ old('fakultas') }}">
                    @error('fakultas')
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
