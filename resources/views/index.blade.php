@extends('layouts.welcome')

@section('content')
<div class="container-fluid bg-white shadow-sm">
    <div class="row justify-content-center">
        <div class="col-sm-8 p-5 text-center">
            <h1 class="fw-bold">Tutorial Linux</h1>
            <br>
            <h4>Temukan tutorial tentang linux disini.</h4>
            <br>
            <a class="btn btn-primary" href="#article">Selengkapnya</a>
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('assets/img/komputer.svg') }}" alt="image" class="w-100 d-flex">
        </div>
    </div>
</div>
<div class="container" id="article">
    <div class="row">
        <div class="col-sm-8">
            @foreach ($posts as $post)
            <div class="card shadow-sm bg-white" style="border: none; margin-top:25px;">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ asset('images') }}/{{ $post->image }}" alt="image" class="w-100 d-flex">
                    </div>
                    <div class="col-sm-8 py-2">
                        <h3 class="card-title fw-bold">{{ $post->title }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><span class="fa fa-user"></span> {{ $post->name }}</li>
                            <li class="breadcrumb-item active">Create: {{ $post->created_at }}</li>
                        </ol>
                        <p class="card-text">{!!  Str::limit( strip_tags( $post->description ), 250 ) !!}</p>
                        <p class="card-text">Kategori: <span class="badge bg-primary">{{ $post->kategori }}</span></p>
                        <a class="btn btn-primary position-absolute bottom-0 end-0" href="{{ route('article',$post->id) }}">Read More..</a>
                    </div>
                </div>
            </div>
            @endforeach
             <div class="d-flex py-4">
                {!! $posts->links() !!}
            </div>
        </div>

        <div class="col-sm-4">
            <h4 class="text-secondary py-4">New:</h4>
            @foreach ($postnew as $post)
            @php
                $dt = \Carbon\Carbon::parse($post->created_at)
            @endphp
            @php
                $days = \Carbon\Carbon::now()
            @endphp
            <div class="list-group py-1">
                <a href="{{ route('article',$post->id) }}" class="list-group-item list-group-item-action active" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $post->title }}</h5>
                        <small>{{ $dt->addDays($days)->diffForHumans() }}</small>
                  </div>
                </a>
            </div>
            @endforeach

            <h4 class="text-secondary py-4">Kategori:</h4>

            @foreach ($postnew as $post)
            <a class="btn btn-primary" style="margin-top: 10px">{{ $post->kategori }}</a>
            @endforeach
        </div>
    </div>
</div>
@endsection
