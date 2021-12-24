@extends('layouts.admin')

@section('title')
    <title>Admin | Lihat Dokumen Mutu</title>
@endsection

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dokumen Mutu</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dokumen-mutu.index') }}">Dokumen Mutu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lihat Dokumen</li>
        </ol>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <h3 class="text-center" style="color: black">{{ $item->judul }} </h3>
            @if ($item->nama_file != NULL)
            <form action="{{ route('dokumen-mutu.show', $item->id) }}" method="POST" enctype="multipart/form-data">
                <embed src="{{ asset('storage/file-pdf/' . $item->nama_file) }}#toolbar=0" width="100%" height="1000"/>
            </form>
            @elseif ($item->link != NULL)
            <a href="{{ $item->link }}" class="btn btn-primary" target="_blank">Klik link file</a>
            @endif
        </div>
    </div>
</div>

@endsection
