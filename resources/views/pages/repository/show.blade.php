@extends('layouts.admin')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penelitian</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('data-repository.index') }}">Dokumen Mutu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lihat Dokumen</li>
        </ol>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <h3 class="text-center" style="color: black">{{ $item->judul }} </h3>
            <form action="{{ route('data-repository.show', $item->id) }}" method="POST" enctype="multipart/form-data">
                <embed src="{{ asset('storage/file-pdf/' . $item->nama_file) }}#toolbar=0" width="100%" height="1000"/>
            </form>
        </div>
    </div>
</div>

@endsection
