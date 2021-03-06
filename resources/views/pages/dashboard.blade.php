@extends('layouts.admin')

@section('title')
    <title>Admin | Dashboard</title>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <p class="h5 mb-0 text-gray-800">Hi, {{ auth()->user()->name }}</p>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Dokumen Mutu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $repository }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data User
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $user }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('addon-script')
    @if (Session::get('success-login'))
    <script>
        swal({
            title: "Selamat Datang",
            text: "Selamat Datang {{ auth()->user()->name }}",
            icon: "success",
        });
    </script>
    @endif

    @if (Session::get('success-simpan-data'))
    <script>
        swal({
            title: "Berhasil",
            text: "Data Sudah Disimpan",
            icon: "success",
        });
    </script>
    @endif
@endpush
