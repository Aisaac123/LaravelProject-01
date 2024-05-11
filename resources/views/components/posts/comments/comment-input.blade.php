<form action="{{route('comment.store')}}" method="post">
    @csrf
    <input type="hidden" value="{{$image_id}}" name="image-id">
    <div class="row mb-3 mt-2">
        <div class="col">
            <textarea class="form-control @error('comment-text') is-invalid @enderror" name="comment-text"
                      placeholder="So beautiful!" required></textarea>
            @error('comment-text')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3 mt-2">
        <div class="col d-flex justify-content-end px-3">
            <input type="submit" value="Comment" class="btn btn-secondary btn-sm">
        </div>
    </div>
</form>
