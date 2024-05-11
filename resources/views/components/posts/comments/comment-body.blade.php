<div class="container comment-body">
    @foreach($comments as $key => $comment)
        @if($loop->first)
            <div style="padding: 0; margin-top: 7px;"></div>
        @endif
        <div class="row comment-row">
            <div class="col col-md-10 d-flex justify-content-start">
                <div class="d-flex justify-content-start">
                    @if($comment->user->image)
                        <a href="{{route('user.profile', ['user_id' => $comment->user->id])}}"
                           style="text-decoration: none" class="m-0 p-0 text-muted">
                            <img src="{{route('user.image', ['filename' => $comment->user->image])}}" alt=""
                                 class="comment-profile-image mt-2"
                                 style="width: 40px; height: 40px; object-fit: cover;">
                        </a>
                    @endif
                    <div class="names" style=" cursor: default">
                        <a href="{{route('user.profile', ['user_id' => $comment->user->id])}}"
                           style="text-decoration: none" class="m-0 p-0 text-muted">
                            <p class="mt-3 px-2 animated-link-profile"><strong>{{'@'.$comment->user->nickname}}
                                    :</strong></p>
                        </a>
                    </div>
                    <p class="mt-3" id="comment-text" style="color: black">{{$comment->body}}</p>
                </div>
            </div>
            <div class="col col-md-2 ">
                <div class="d-flex justify-content-end">
                    <p style="color: darkgray; font-size: small; margin-top: -3px; margin-right: 9px; margin-bottom: 5px">
                        {{ ucfirst(\Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->locale('en')->diffForHumans()) }}
                    </p>
                </div>
                <div class="d-flex justify-content-end" style="margin-right: -12px; margin-top: -3px">
                    @if(Auth::user()->id === $comment->user_id)
                        @component('components.posts.comments.delete-comment', ['comment' => $comment])
                        @endcomponent
                    @endif
                </div>
            </div>
        </div>
        @if(!$loop->last)
            <hr style="padding: 0; margin-top: 4px; margin-bottom: 4px; color: lightslategray">
        @else
            <div style="padding: 0; margin-bottom: 7px;"></div>
        @endif
    @endforeach
</div>

