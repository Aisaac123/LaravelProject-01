@extends('page-body')

@section('body-content')
    @if($images->isEmpty())
        <h2><strong>Nothing to show here...</strong></h2>
    @else
        @component('components.posts.card-list.card-list', ['images' => $images, 'showdesc' => false])
        @endcomponent
    @endif
    <div class="d-flex justify-content-center">{{ $images->links() }}</div>
@endsection
