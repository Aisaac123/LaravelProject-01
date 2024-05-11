<div class="text-start mt-4">
    <div class="mb-4">
        @if($user->image)
            @component('image.profile_image', ['user' => $user])
            @endcomponent
        @endif
    </div>
    <h3 class="animated-link-profile mb-4" style="cursor: default"><strong>{{'@'.$user->nickname}}</strong></h3>
    <div class="names">
        <h4 class="animated-link-profile mb-4" style="cursor: default">{{$user->name . ' ' . $user->surname}}</h4>
    </div>
    <div class="names">
        <h5 class="animated-link-profile" style="cursor: default">{{$user->email}}</h5>
    </div>
    <div class="d-flex justify-content-start mt-4">
        <a href="{{ route('user.edit-profile') }}" style="text-decoration: none; width: 100%;">
            <button class="btn btn-dark d-flex justify-content-center" style="width: 95%;">
                <p style="font-size: medium; margin: 0 0 0 -8px;padding: 0;">Edit Profile</p>
            </button>
        </a>
    </div>
</div>

<div class="clearfix"></div>
