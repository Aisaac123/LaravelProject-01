@extends('page-body')

@section('body-content')
    @if($users->isEmpty())
        <h2><strong>No users here...</strong></h2>
    @else
        @component('users.search-body.search-list', ['users' => $users])
        @endcomponent
    @endif
    <div class="d-flex justify-content-center">{{ $users->links() }}</div>
@endsection
