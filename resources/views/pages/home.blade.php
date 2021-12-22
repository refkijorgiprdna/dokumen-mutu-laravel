@extends('layouts.user')

@section('title')
    <title>Beranda</title>
@endsection

@section('content')
<section id="home" class="intro-section">
    <div class="container mb-5">
      <div class="row align-items-center text-white">
        <!-- START THE CONTENT FOR THE INTRO  -->
        <div class="card shadow mb-5">
            <div class="card-body">
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

                                    @if (Auth::user())
                                    <a href="{{ route('home.show', $item->id) }}" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                        @if ($item->nama_file != NULL)
                                        <a href="{{ route('download', $item->nama_file) }}" class="btn btn-secondary">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        @endif
                                    @else
                                    <a href="{{ route('home.show', $item->id) }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa fa-eye"></i>
                                    </a>
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
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Perhatian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Silahkan login terlebih dahulu...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a class="btn btn-primary" href="{{ route('login') }}" >Login</a>
      </div>
    </div>
  </div>
</div>
</section>
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

    <script type="text/javascript">
        table = $('#dataTable').DataTable( {
            "ordering": false
        } );
    </script>
@endpush
