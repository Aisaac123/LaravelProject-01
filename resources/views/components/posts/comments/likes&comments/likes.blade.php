@if(!$image->hasLikeFrom(Auth::user()))
    <a href="{{route('like.like', ['image_id' => $image->id]) }}">
        <div class="like-icon">
            <img class="like" src="{{asset('shared/no-like-icon.png')}}" alt="" style="cursor: pointer">
            <img class="like" src="{{asset('shared/like-icon.png')}}" alt="" style="cursor: pointer">
        </div>
    </a>
@else
    <a href="{{route('like.unlike', ['image_id' => $image->id]) }}">
        <div class="like-icon">
            <img class="like" src="{{asset('shared/like-icon.png')}}" alt="" style="cursor: pointer">
            <img class="like" src="{{asset('shared/no-like-icon.png')}}" alt="" style="cursor: pointer">
        </div>
    </a>
@endif
