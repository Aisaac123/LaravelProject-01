<div class="comment-body">
    @if($user->likes->isEmpty())
        <div class="row comment-row">
            <div class="col col-md-10 d-flex justify-content-start">
                <div class="d-flex justify-content-start">
                    <p href="" class="mt-2 px-2 text-muted" style="font-size: medium"><strong>Nothing here...</strong>
                    </p>
                </div>
            </div>
        </div>
    @else
        @foreach($user->likesPaginate() as $key => $like)
            <div class="row comment-row">
                <div class="col col-md-8 d-flex justify-content-start">
                    <div class="d-flex justify-content-start">
                        <a href="{{route('image.details', ['id' => $like->image->id])}}"
                           class="text-decoration-none mt-3 px-2 text-muted animated-link " style="font-size: medium">
                            <strong>
                                {{$like->image->title}}
                            </strong>
                                <img src="{{asset('shared/like-icon.png')}}" alt=""
                                     style=" width: 24px; height: 24px; margin-left: 3px;">
                        </a>
                    </div>
                </div>
                <div class="col col-md-4 ">
                    <div class="d-flex justify-content-end">
                        <p style="color: darkgray; font-size: smaller; margin-top: 20px; margin-right: 9px; margin-bottom: 5px">
                            {{ ucfirst(\Carbon\Carbon::createFromTimeStamp(strtotime($like->created_at))->locale('en')->diffForHumans()) }}
                        </p>
                    </div>
                </div>
            </div>
            @if(!$loop->last)
                <hr style="padding: 0; color: lightslategray">
            @endif
        @endforeach
    @endif
</div>
