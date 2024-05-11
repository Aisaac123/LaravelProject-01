@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-10">
                <div class="col pt-5">

                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <strong>Upload a new photo</strong>
                        </div>
                        <div class="card-body mt-3">
                            <div class="row">
                                <div class="col align-content-center align-items-center">
                                    <form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="title" class="col-md-3 col-form-label text-md-end">
                                                <strong>Title:</strong>
                                            </label>

                                            <div class="col-md-8 pe-4">
                                                <input id="title" type="text"
                                                       class="form-control @error('title') is-invalid @enderror"
                                                       name="title" placeholder="Title" required>
                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3 mt-4">
                                            <label for="image_path" class="col-md-3 col-form-label text-md-end">
                                                <h5> Image: </h5>
                                            </label>

                                            <div class="col-md-8 pe-4">
                                                <input id="image_path" type="file"
                                                       class="form-control @error('image_path') is-invalid @enderror"
                                                       name="image_path" placeholder="yourImage.jpg" required>

                                                @error('image_path')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3 mt-4">
                                            <label for="description" class="col-md-3 col-form-label text-md-end">
                                                Description:
                                            </label>

                                            <div class="col-md-8 pe-4">
                                                <textarea id="description"
                                                          class="form-control @error('description') is-invalid @enderror"
                                                          name="description" placeholder="Just a beautiful image"
                                                          required></textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="text-center align-content-center mt-3">
                                                <input type="submit" class="btn btn-primary" value="Upload Image">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="col align-content-center align-items-center">

                                    <div class="text-center mb-3 pe-4">
                                        <strong><h5 class="col-md-10 ps-2">Preview</h5></strong>
                                    </div>
                                    @component('image.image_card_upload')
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    +
@endsection
