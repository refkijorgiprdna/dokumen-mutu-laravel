@extends('layouts.admin')

@section('title')
    <title>Admin | Data User</title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-gray-800">Data User</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data User</li>
        </ol>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('data-user.create') }}" class="btn btn-primary mb-3">Tambah User</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('data-user.edit', $item->id) }}" class="btn btn-primary">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('data-user.destroy', $item->id) }}" method="POST" class="d-inline">
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
    @if (Session::get('success-tambah-user'))
    <script>
        swal({
            title: "Berhasil",
            text: "Data Sudah Ditambahkan",
            icon: "success",
        });
    </script>
    @endif

    @if (Session::get('success-ubah-user'))
    <script>
        swal({
            title: "Berhasil",
            text: "Data Sudah Diubah",
            icon: "success",
        });
    </script>
    @endif

    @if (Session::get('success-hapus-user'))
    <script>
        swal("Berhasil", "Data Sudah Terhapus Secara Permanen", "success");
    </script>
    @endif

    <script type="text/javascript">
        table = $('#dataTable').DataTable( {
            "lengthChange": false,
            "ordering": false
        } );
    </script>

@endpush
