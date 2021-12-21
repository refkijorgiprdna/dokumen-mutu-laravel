@extends('layouts.user')

@section('content')
<section id="home" class="intro-section">
    <div class="container mb-5">
      <div class="row align-items-center text-white">
        <!-- START THE CONTENT FOR THE INTRO  -->
        <div class="card shadow mb-5 pb-2" >
            <div class="card-body">
                <h3 class="text-center" style="color: black">{{ $item->judul }} </h3>
                @if ($item->nama_file != NULL)
                <form action="{{ route('data-repository.show', $item->id) }}" method="POST" enctype="multipart/form-data">
                    <embed src="{{ asset('storage/file-pdf/' . $item->nama_file) }}#toolbar=0" width="100%" height="1000"/>
                </form>
                @elseif ($item->link != NULL)
                <a href="{{ $item->link }}" class="btn btn-primary" target="_blank">Klik link file</a>
                @endif
                {{--  <form action="{{ route('data-repository.show', $item->id) }}" method="POST" enctype="multipart/form-data">
                    <embed src="{{ asset('storage/file-pdf/' . $item->nama_file) }}#toolbar=0" width="100%" height="1000"/>
                </form>  --}}
            </div>
        </div>
      </div>
    </div>
</section>
@endsection
