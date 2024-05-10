<div>
    <a href="{{route('user.profile', ['user_id' => $user->id])}}">
        <img src="{{route('user.image', ['filename' => $user->image])}}" alt="" class="image_card card">
    </a>
</div>
