@foreach($users as $user)
    @component('users.search-body.search-card', ['user' => $user])
    @endcomponent
@endforeach
