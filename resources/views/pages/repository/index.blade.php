@extends('layouts.admin')

@section('title')
    <title>Admin | Dokumen Mutu</title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dokumen Mutu</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dokumen Mutu</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if (Auth::user()->role == 'ADMIN')
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('dokumen-mutu.create') }}" class="btn btn-primary mb-3">Tambah Dokumen</a>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Dokumen</th>
                            <th>Bagian/Unit</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->bagian }}</td>
                            <td class="text-center">
                                <a href="{{ route('dokumen-mutu.show', $item->id) }}" class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                </a>

                                @if ($item->nama_file != NULL)
                                <a href="{{ route('repository.download', $item->nama_file) }}" class="btn btn-secondary">
                                    <i class="fa fa-download"></i>
                                </a>
                                @elseif ($item->link != NULL)

                                @endif

                                <a href="{{ route('dokumen-mutu.edit', $item->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                    title="Edit Data">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('dokumen-mutu.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
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

@push('addon-script')
    @if (Session::get('success-tambah-berkas'))
    <script>
        swal({
            title: "Berhasil",
            text: "Dokumen Sudah Ditambahkan",
            icon: "success",
        });
    </script>
    @endif

    @if (Session::get('success-ubah-berkas'))
    <script>
        swal({
            title: "Berhasil",
            text: "Dokumen Sudah Diubah",
            icon: "success",
        });
    </script>
    @endif

    @if (Session::get('success-hapus-berkas'))
    <script>
        swal("Berhasil Menghapus Dokumen", "Dokumen Sudah Terhapus Secara Permanen", "success");
    </script>
    @endif

    @if (Session::get('success-download-berkas'))
    <script>
        swal({
            title: "Berhasil",
            text: "Dokumen Sudah Didownload",
            icon: "success",
        });
    </script>
    @endif

    <script type="text/javascript">
        table = $('#dataTable').DataTable( {
            "lengthChange": false,
            "ordering": false
        } );
    </script>
@endpush
