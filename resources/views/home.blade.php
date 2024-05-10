@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if($images->isEmpty())
                    <h2><strong>Nothing to show here...</strong></h2>
                @else
                        @component('components.posts.cards.card-list.card-list', ['images' => $images, 'showdesc' => false])
                        @endcomponent
                @endif
                <div class="clearfix"></div>
            </div>
            <div class="d-flex justify-content-center">{{ $images->links() }}</div>
        </div>
    </div>
@endsection
