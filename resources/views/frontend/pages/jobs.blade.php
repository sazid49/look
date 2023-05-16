@extends('frontend.layouts.master')

@section('title','All Jobs')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($jobs as $job)
                <div class="col-3 m-2">
                    <div class="lo-card-body card">
                        <div class="card-body box white job-list d-flex flex-column">
                            <h3 class="border-0 sm-font font-bold">{{ $job->title }}</h3>
                            <p class="loc gray-clr d-flex mb-2">
                                <svg class="icon-20 me-1 gray-clr">
                                    <use xlink:href="#ic_map_pin"></use>
                                </svg>
                                {{ $job->location }}
                            </p>
                            <div class="tags gray-clr">
                                <p class="mr-0 flex-fill d-flex  mb-2">
                                    <svg class="icon-20 me-1 gray-clr">
                                        <use xlink:href="#ic_building"></use>
                                    </svg>
                                    {{ $job->company->company_name ?? '' }}
                                </p>
                                <p class="d-flex  mb-2">
                                    <svg class="icon-20 me-1 gray-clr">
                                        <use xlink:href="#ic_briefcase"></use>
                                    </svg>
                                    {{ $job->type }}
                                </p>
                                <p class="d-flex  mb-2">
                                    <svg class="icon-20 me-1 gray-clr">
                                        <use xlink:href="#ic_bookmark"></use>
                                    </svg>
                                    {{ $job->label }}
                                </p>
                            </div>
                            <div class="chips d-flex align-items-center flex-wrap">
                                @foreach(explode(',',$job->skill) as $skill)
                                    <span class="em-chip">{{ $skill }}</span>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                                <a href="{{route('frontend.company.job_detail',[$job->company,$job,$job->company->slug])}}" class="btn btn-border-theme btn-theme btn-sm">{{ __('Apply Now') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@stop
