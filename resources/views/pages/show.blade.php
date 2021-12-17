@extends('layouts.user')

@section('content')
<section id="home" class="intro-section">
    <div class="container">
      <div class="row align-items-center text-white">
        <!-- START THE CONTENT FOR THE INTRO  -->
        <div class="card mb-5" >
            <div class="card-body">
                <h3 class="text-center" style="color: black">{{ $item->judul }} </h3>
                <br>
                <form action="{{ route('data-repository.show', $item->id) }}" method="POST" enctype="multipart/form-data">
                    <embed src="{{ asset('storage/file-pdf/' . $item->nama_file) }}" width="100%" height="1000"/>
                </form>
            </div>
        </div>
      </div>
    </div>
</section>
@endsection
