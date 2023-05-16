@extends('frontend.layouts.master')

@section('title','All Jobs')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($users as $user)
                <div class="col-6">
                    <div class="card m-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if (Storage::disk('public')->exists($user->avatar))
                                    <img src="{{ asset('storage') }}/{{ $user->avatar }}" class="img-fluid rounded-start" alt="...">
                                @else
                                    <img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $user->name ?? __('labels.users.not_set') }}</h5>
                                    <p><i class="far fa-building"></i> {{ $user->details->company_name  ?? __('labels.users.not_set') }}</p>
                                    <p class="card-text"><i class="fas fa-map-marker-alt"></i>
                                        @if(empty($user->details->postcode) && empty($user->details->city))
                                            {{ __('labels.users.not_set') }}
                                        @else
                                        {{ $user->details->postcode ?? __('labels.users.not_set') }}
                                        {{ $user->details->city ?? __('labels.users.not_set') }}
                                        @endif
                                    </p>
                                    <p class="card-text"><small class="text-muted">{{ __('labels.users.last_login') }}: {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : '-' }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
