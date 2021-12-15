@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Berkas Repository</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Berkas Repository</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if (Auth::user()->role == 'ADMIN')
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('data-repository.create') }}" class="btn btn-primary mb-3">Tambah Berkas</a>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Repository</th>
                            <th>Judul</th>
                            <th>Dosen Pembimbing</th>
                            <th>Penulis</th>
                            <th>Jurusan</th>
                            <th>Fakultas</th>
                            @if (Auth::user()->role == 'ADMIN')
                            <th class="text-center">Aksi</th>
                            @elseif (Auth::user()->role == 'DOSEN')
                            <th class="text-center">Aksi</th>
                            @else

                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->kode_repository }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->dosen_pembimbing }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->fakultas }}</td>
                            @if (Auth::user()->role == 'ADMIN')
                            <td class="text-center">
                                <a href="{{ route('data-repository.show', $item->id) }}" class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('repository.download', $item->nama_file) }}" class="btn btn-secondary">
                                    <i class="fa fa-download"></i>
                                </a>
                                <a href="{{ route('data-repository.edit', $item->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                    title="Edit Data">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('data-repository.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                            @elseif (Auth::user()->role == 'DOSEN')
                            <td class="text-center">
                                <a href="{{ asset('storage/file-pdf/' . $item->nama_file) }}" class="btn btn-secondary">
                                    <i class="fa fa-file-pdf"></i>
                                </a>
                                <a href="{{ route('data-repository.show', $item->id) }}" class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            @else

                            @endif
                        </tr>
                        @empty

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@push('addon-script')
    @if (Session::get('success-tambah-berkas'))
    <script>
        swal({
            title: "Berhasil",
            text: "Berkas Sudah Ditambahkan",
            icon: "success",
        });
    </script>
    @endif

    @if (Session::get('success-ubah-berkas'))
    <script>
        swal({
            title: "Berhasil",
            text: "Berkas Sudah Diubah",
            icon: "success",
        });
    </script>
    @endif

    @if (Session::get('success-hapus-berkas'))
    <script>
        swal("Berhasil Menghapus Berkas", "Berkas Sudah Terhapus Secara Permanen", "success");
    </script>
    @endif

    @if (Session::get('success-download-berkas'))
    <script>
        swal({
            title: "Berhasil",
            text: "Berkas Sudah Didownload",
            icon: "success",
        });
    </script>
    @endif
@endpush
