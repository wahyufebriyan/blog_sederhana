@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>
                <div class="card-body">
                    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modal-create">New</button>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Kategori</th>
                                <th>Description</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody id="tablePosts">
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->kategori }}</td>
                                <td>{!!  Str::limit( strip_tags( $post->description ), 50 ) !!}</td>
                                <td><img src="{{ asset('images') }}/{{ $post->image }}" alt="image" width="50px"></td>
                                <td class="text-center">
                                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                        <a href="#" type="button" class="btn btn-warning btn-circle" data-bs-toggle="modal" data-bs-target="#modal-edit{{ $post->id }}">Edit</a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @include('admin.posts.edit')

                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.posts.create')
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets') }}/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('description');
</script>
@endpush

