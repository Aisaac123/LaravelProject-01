@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col pt-5">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    <div class="card col mb-5 align-content-center">
                        <div class="card-header align-content-center text-center"><strong>Edit Account Info</strong></div>
                        <div class="card-body pt-4">
                            <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" class="mt-3">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        @include('includes.user_image')
                                        <div class="row mb-3">
                                            <div class="col-md-9 ms-5 text-center align-content-center" >
                                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*">
                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mt-3 me-4">

                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                            <div class="col-md-7">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                                            <div class="col-md-7">
                                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ Auth::user()->surname }}" required autocomplete="surname" autofocus>

                                                @error('surname')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nickname" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                            <div class="col-md-7">
                                                <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname"
                                                       value="{{ Auth::user()->nickname }}" required autocomplete="nickname" autofocus>
                                                @error('nickname')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-7">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row mb-0 justify-content-center align-content-center align-items-center">
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-primary align-items-center mt-2">
                                            Change info
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card col mt-3 align-content-center">
                        <div class="card-header justify-content-center text-center"><strong>Edit Password</strong></div>
                        <div class="card-body align-content-center pt-4">
                            <form method="POST" action="{{ route('user.update.password') }} " class="mt-3">
                                @csrf

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                    <div class="col-md-6 d-flex align-items-center">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" autofocus>

                                        <div class="form-check form-check-inline ms-2">
                                            <input type="checkbox" id="showPassword" class="form-check-input">
                                            <label for="showPassword" class="form-check-label">Show</label>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="new-password" class="col-md-4 col-form-label text-md-end">New password</label>

                                    <div class="col-md-6 d-flex align-items-center">
                                        <input id="new-password" type="password" class="form-control @error('new-password') is-invalid @enderror" name="new-password" required autocomplete="new-password" autofocus>

                                        <div class="form-check form-check-inline ms-2">
                                            <input type="checkbox" id="showNewPassword" class="form-check-input">
                                            <label for="showNewPassword" class="form-check-label">Show</label>
                                        </div>
                                        @error('new-password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="new-password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="new-password-confirm" type="password" class="form-control @error('new-password-confirm') is-invalid @enderror" name="new-password-confirm" required autocomplete="new-password-confirm" autofocus>
                                        @error('new-password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0 justify-content-center">
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-primary mt-2">
                                            Change Password
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
