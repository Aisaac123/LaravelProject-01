<div class="card mb-4 " style="margin: 0; padding: 0;">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-start">
                    @if($image->user->image)
                        @component('image.profile_image', ['user' => $image->user])
                        @endcomponent
                    @endif
                    <div class="d-flex border-end names">
                        <a href="{{route('user.profile', ['user_id' => $image->user->id])}}"
                           style="text-decoration: none" class="mt-3 px-2 text-muted">
                            <p class="animated-link-profile"><strong>{{'@'.$image->user->nickname}}</strong></p>
                        </a>
                    </div>
                    <div class="d-flex">
                        <p class="mt-3 px-2"><strong>{{$image->user->name . ' ' . $image->user->surname}}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <img src="{{route('image.show', ['filename' => $image->path])}}" alt="" style="padding: 0; margin: 0;"
             id="imagePreview" class="container card-body pub_image fade-in">
    </div>
    <div class="card-footer">
        @if(!$showdesc)
            <div class="mb-2 " id="titleCard">
                <div class="row likes-comments-container">
                    <div class="col-md-8">
                        <p class="">
                            <strong>
                                <a href="{{route('image.details', ['id' => $image->id])}}" class="animated-link">
                                    {{$image->title}}
                                </a>
                            </strong>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="likes d-flex justify-content-end">
                                @if($image->user->id === Auth::user()->id)
                                    <div class="trash-icon" style="margin-right: 32px;">
                                        <a href="{{route('image.delete', ['id' => $image->id])}}">
                                            <img src="{{asset('/shared/trash_hover.png')}}" alt=""
                                                 style="cursor: pointer">
                                            <img src="{{asset('/shared/trash.png')}}" alt="" style="cursor: pointer">
                                        </a>
                                    </div>
                                @endif
                                <div class="comment-icon">
                                    <img class="comment" src="{{asset('shared/comment.png')}}" alt=""
                                         style="cursor: pointer; margin-left: -44px;">
                                    <img class="comment" src="{{asset('shared/comment_hover.png')}}" alt=""
                                         style="cursor: pointer; margin-left: -44px;">
                                </div>
                                @component('components.posts.comments.likes&comments.likes', ['image' => $image])
                                @endcomponent
                            </div>
                        </div>
                        <div class="row ">
                            <div class="likes d-flex justify-content-end">
                                <p class="comments-count" style=" margin-right: 38px;">{{count($image->comments)}}</p>
                                <p class="likes-count">{{count($image->likes)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p style="color: gray; font-size: small">
                    {{ ucfirst(\Carbon\Carbon::createFromTimeStamp(strtotime($image->created_at))->locale('en')->diffForHumans()) }}
                </p>
            </div>
        @else
            <div class="mb-2 " id="titleCard">
                <div class="row likes-comments-container">
                    <div class="col-md-8">
                        <p class="mt-2" id="gradient-title" style="cursor: default">
                            <strong>
                                {{$image->title}}
                            </strong>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="likes d-flex justify-content-end">
                                @if($image->user->id === Auth::user()->id)
                                    <div class="trash-icon" style="margin-right: 32px;">
                                        <a href="{{route('image.delete', ['id' => $image->id])}}">
                                            <img src="{{asset('/shared/trash_hover.png')}}" alt=""
                                                 style="cursor: pointer">
                                            <img src="{{asset('/shared/trash.png')}}" alt="" style="cursor: pointer">
                                        </a>
                                    </div>
                                @endif
                                <div class="comment-icon">
                                    <img class="comment" src="{{asset('shared/comment.png')}}" alt=""
                                         style="cursor: pointer; margin-left: -54px;">
                                    <img class="comment" src="{{asset('shared/comment_hover.png')}}" alt=""
                                         style="cursor: pointer; margin-left: -54px;">
                                </div>
                                @component('components.posts.comments.likes&comments.likes', ['image' => $image])
                                @endcomponent
                            </div>
                        </div>
                        <div class="row">
                            <div class="likes d-flex justify-content-end">
                                <p class="comments-count" style=" margin-right: 48px;">{{count($image->comments)}}</p>
                                <p class="likes-count">{{count($image->likes)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div id="bottomCard">
                <strong style="color: #093f7f">{{$image->description}}</strong>
                <br>
                <p style="color: darkgray; margin-top: 10px">
                    {{ ucfirst(\Carbon\Carbon::createFromTimeStamp(strtotime($image->created_at))->locale('en')->diffForHumans()) }}
                </p>
            </div>
        @endif
        @component('components.posts.comments.comment-box', ['image' => $image])
        @endcomponent
    </div>
</div>
