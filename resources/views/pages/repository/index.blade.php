@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Berkas Repository</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('data-repository.create') }}" class="btn btn-primary mb-3">Tambah Berkas</a>
            </div>
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
                            <th class="text-center">Aksi</th>
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
                            <td class="text-center">
                                @if (Auth::user()->role == 'ADMIN')
                                <a href="{{ asset('storage/file-pdf/' . $item->nama_file) }}" class="btn btn-secondary" target="_blank">
                                    <i class="fa fa-file-pdf"></i>
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
                                @elseif (Auth::user()->role == 'DOSEN')
                                <a href="{{ asset('storage/file-pdf/' . $item->nama_file) }}" class="btn btn-secondary" target="_blank">
                                    <i class="fa fa-file-pdf"></i>
                                </a>
                                @else
                                -
                                @endif

                            </td>
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
