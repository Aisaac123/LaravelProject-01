<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-start">
                    @if($image->user->image)
                        @component('components.profile_image', [
                            'route' => route('user.image', ['filename' => $image->user->image]),
                            ])
                        @endcomponent
                    @endif
                    <div class="d-flex border-end">
                        <p class="mt-3 px-2 text-muted"><strong>{{'@'.$image->user->nickname}}</strong></p>
                    </div>
                        <div class="d-flex">
                            <p class="mt-3 px-2"><strong>{{$image->user->name . ' ' . $image->user->surname}}</strong></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <img src="{{route('image.show', ['filename' => $image->path])}}" alt="" style="padding: 0; margin: 0;" id="imagePreview" class="container card-body pub_image fade-in">
    </div>

    <div class="card-footer">
        @if(!$showdesc)
        <div class="mb-2 " id="titleCard">
            <div class="row likes-comments-container">
                <div class="col-md-8">
                    <p class="mt-2">
                        <strong>
                            <a href="{{route('image.details', ['id' => $image->id])}}" class="animated-link" style="text-decoration: none; color: dimgray;">
                                {{$image->title}}
                            </a>
                        </strong>
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="likes d-flex justify-content-end">
                            <img src="{{asset('shared/comment-icon.png')}}" alt="">
                            <img class="like" src="{{asset('shared/no-like-icon.png')}}" alt="">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="likes d-flex justify-content-end">
                            <p class="comments-count">{{count($image->comments)}}</p>
                            <p class="likes-count">{{count($image->likes)}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="mb-2 " id="titleCard">
                <div class="row likes-comments-container">
                    <div class="col-md-8">
                        <p class="mt-2">
                            <strong>
                                {{$image->title}}
                            </strong>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="likes d-flex justify-content-end">
                                <img src="{{asset('shared/comment-icon.png')}}" alt="">
                                <img class="like" src="{{asset('shared/no-like-icon.png')}}" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="likes d-flex justify-content-end">
                                <p class="comments-count">{{count($image->comments)}}</p>
                                <p class="likes-count">{{count($image->likes)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div id="bottomCard">
                {{$image->description}}
                <br>
                <p style="color: darkgray;">
                    {{ ucfirst(\Carbon\Carbon::createFromTimeStamp(strtotime($image->created_at))->locale('en')->diffForHumans()) }}
                </p>
            </div>
        @endif
    </div>

</div>
