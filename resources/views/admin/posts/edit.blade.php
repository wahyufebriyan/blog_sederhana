<!-- Modal -->
<div class="modal fade" id="modal-edit{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
            </div>
            <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori" class="control-label">Kategori</label>
                        <input type="text" class="form-control" name="kategori" value="{{ $post->kategori }}">
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <textarea class="form-control" name="description" rows="10" cols="40">{!! ($post->description) !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label">image</label>
                        <input type="file" class="form-control" name="image">
                        <img src="{{ asset('images') }}/{{ $post->image }}" alt="image" width="100px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>