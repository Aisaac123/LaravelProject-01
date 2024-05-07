@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.card', ['image' => $image, 'showdesc' => true])
                @endcomponent
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
