@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10 detail-delete">
                @component('components.posts.cards.card', ['image' => $image, 'showdesc' => true])
                @endcomponent
                <div class="clearfix"></div>
            </div>
            <div class="col-md-9 mt-4">
                <h4 id="gradient-text" class="animated-link" style="cursor: default"><strong>People liked this!!</strong></h4>
                <div class="card">
                    <div class="card-body">
                        @component('components.posts.cards.image-likes-card', ['image' => $image])
                        @endcomponent
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
