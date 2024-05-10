@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="profile-header col-md-3">
                <div class="row">
                    @component('components.profiles.user-side', ['user' => $user])
                    @endcomponent
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-7">
                        <div class="">
                            <h4 id="gradient-text" class="animated-link" style="cursor: default">
                                @if(Auth::user()->id !== $user->id)
                                    <strong>{{'@'.$user->nickname . ' Posts!'}}</strong>
                                @else
                                    <strong>{{'Your Posts!'}}</strong>
                                @endif
                            </h4>
                        </div>
                        <div class="">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                @if($user->images->isEmpty())
                                    <div class="row comment-row">
                                            <div class="d-flex justify-content-start">
                                                <p href="" class="mt-2 px-2 text-muted" style="font-size: medium"><strong>Nothing here...</strong></p>
                                            </div>
                                    </div>
                                @else
                                <div class="">
                                    @component('components.posts.cards.card-list.card-list', ['images' => $user->imagesPaginate(), 'showdesc' => false])
                                    @endcomponent
                                    <div class="clearfix"></div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-center ">{{ $user->imagesPaginate()->links() }}</div>

                    </div>

                    <div class="col-md-5">
                        <h4 id="gradient-text" class="animated-link" style="cursor: default">
                            @if(Auth::user()->id !== $user->id)
                                <strong>{{'@'.$user->nickname . ' Liked Posts!'}}</strong>
                            @else
                                <strong>{{'Your Liked Posts!'}}</strong>
                            @endif
                        </h4>
                        <div class="card">
                            <div class="card-body">
                                @component('components.profiles.likes-profile', ['user' => $user])
                                @endcomponent
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">{{ $user->likesPaginate()->links() }}</div>
                    </div>
                </div>


            </div>
        </div>
@endsection
