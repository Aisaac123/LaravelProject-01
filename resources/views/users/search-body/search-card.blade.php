<div class="card mb-3">
    <div class="row">
        <div class="col">
            <div class="d-flex">

                @if($user->image)
                    <div class="image-search m-0 p-0 border-end justify-content-center d-flex">
                        @component('image.profile_image', ['user' => $user])
                        @endcomponent
                    </div>
                @endif
                <div class="search-username mx-2">
                    <div class="mx-2 p-0">
                        <a href="{{route('user.profile', ['user_id' => $user->id])}}"
                           style="text-decoration: none" class="mt-1 px-2 text-muted">
                            <h4 class="animated-link-profile"><strong>{{'@'.$user->nickname}}</strong></h4>
                        </a>
                    </div>
                    <div class="names" style="margin-top: -10px; cursor: default">
                        <a href="{{route('user.profile', ['user_id' => $user->id])}}"
                           style="text-decoration: none" class="m-0 p-0 text-muted">
                            <h5 class="mt px-2 animated-link-profile">{{$user->name . ' ' . $user->surname}}</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
