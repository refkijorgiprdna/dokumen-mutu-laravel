@extends('layouts.user')

@section('content')
<section id="home" class="intro-section">
    <div class="container">
      <div class="row align-items-center text-white">
        <!-- START THE CONTENT FOR THE INTRO  -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <h3 class="text-center" style="color: black">Dokumen Mutu</h3>
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
                                    <a href="{{ route('home.show', $item->id) }}" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('repository.download', $item->nama_file) }}" class="btn btn-secondary">
                                        <i class="fa fa-download"></i>
                                    </a>
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
</section>
@endsection
