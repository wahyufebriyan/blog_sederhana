@extends('layouts.welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <img src="{{ asset('images') }}/{{ $post->image }}" alt="image" class="w-100 d-flex py-2" height="450px">
            <nav aria-label="breadcrumb" class="py-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Article: {{ $post->title }}</li>
                </ol>
            </nav>
            <h3 class="card-title fw-bold">{{ $post->title }}</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><span class="fa fa-user"></span> {{ $post->name }}</li>
                <li class="breadcrumb-item active">Create: {{ $post->created_at }}</li>
            </ol>
            <p>{!! ($post->description) !!}</p>
        </div>
    </div>
</div>
@endsection
