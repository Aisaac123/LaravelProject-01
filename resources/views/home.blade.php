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
                @component('components.card-list', ['images' => $images, 'showdescs' => false])
                @endcomponent
                <div class="clearfix"></div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{$images->links()}}
            </div>
        </div>
    </div>
@endsection
