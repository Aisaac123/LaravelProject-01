@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row mb-5">
                    @component('components.searchBox.searchBox')
                    @endcomponent
                </div>
                <div class="row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @yield('body-content')
                </div>
            </div>
        </div>
    </div>
@endsection
