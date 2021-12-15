@extends('layouts.admin')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penelitian</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('data-repository.index') }}">Data Repository</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </div>

    <div class="card mb-5">
        <div class="card-body">
            <form action="{{ route('data-repository.show', $item->id) }}" method="POST" enctype="multipart/form-data">
                <embed src="{{ asset('storage/file-pdf/' . $item->nama_file) }}" width="100%" height="470"/>
            </form>
        </div>
    </div>

</div>

@endsection
