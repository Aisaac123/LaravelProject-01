<div class="card animated-comment-box"
     style="position: fixed; bottom: 0; z-index: 9999; transition: all 0.3s ease-in-out; width: 50%; left: 25%;">
    <div class="card-body">
        <h4 class="mt-2 mb-3"><strong>Comments</strong> ({{count($image->comments)}})</h4>
        <div class="container" style="padding: 10px">
            <div class="card " style="max-height: 30vh; overflow-y: auto;" id="card-body">
                @component('components.posts.comments.comment-body', ['comments' => $image->comments])
                @endcomponent
            </div>
            <h5 class="mb-3 mt-3">Say something...</h5>
            @component('components.posts.comments.comment-input', ['image_id' => $image->id])
            @endcomponent
        </div>
    </div>
</div>

<div id="overlay"
     style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0); transition: background-color 0.3s ease-in-out; z-index: 9998;"></div>
