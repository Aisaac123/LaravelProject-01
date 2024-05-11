<div class="container">
    <div class="container comment-body">
        @if($image->likes->isEmpty())
            <h4>Nothing here...</h4>
        @else

        @endif
        @foreach($image->likes as $key => $like)
            <div class="row comment-row">
                <div class="col col-md-10 d-flex justify-content-start">
                    <div class="d-flex justify-content-start">
                        @if($like->user->image)
                            <img src="{{route('user.image', ['filename' => $like->user->image])}}"
                                 alt="" class="comment-profile-image mt-2"
                                 style="width: 40px; height: 40px; object-fit: cover;"
                            >
                        @endif
                            <p class="mt-3 px-2 text-muted" style="font-size: medium">
                                <strong>{{'@'.$like->user->nickname}}: gave you a like!</strong></p>
                            <img src="{{asset('shared/like-icon.png')}}" alt=""
                                 style=" width: 24px; height: 24px; margin-top: 15px;">
                    </div>
                </div>
                <div class="col col-md-2 ">
                    <div class="d-flex justify-content-end">
                        <p style="color: darkgray; font-size: small; margin-top: 15px; margin-right: 9px; margin-bottom: 5px">
                            {{ ucfirst(\Carbon\Carbon::createFromTimeStamp(strtotime($like->created_at))->locale('en')->diffForHumans()) }}
                        </p>
                    </div>
                </div>
            </div>
            @if(!$loop->last)
                <hr style="padding: 0; margin-top: 4px; margin-bottom: 4px; color: lightslategray">
            @endif
        @endforeach
    </div>
</div>
