@extends('frontend.pages.company')

@section('title', __('labels.company.job_tab_title'))

@section('tabcontent')
    <div class="tab-pane-defeated" id="jobs" role="tabpanel" aria-labelledby="job-tab">
        <div class="row">
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-header bg-white pb-0">
                        <h4 class="s-font mb-0">
                            {{ __('labels.job.free_jobs') }}
                        </h4>
                    </div>
                    @foreach ($company->job_published as $key => $job)
                        <div class="card-body box white job-list d-flex flex-column">
                            <h3 class="border-0 body-font font-semibold">{{ $job->title }}</h3>
                            <div class="row">
                                <div class="col">
                                    <div class="tags gray-clr d-flex row g-0">
                                        <p class="loc gray-clr d-flex mb-2">
                                            <svg class="icon-20 me-1 gray-clr">
                                                <use xlink:href="#ic_map_pin"></use>
                                            </svg>
                                            {{ $job->location }}
                                        </p>
                                        <p class="pe-3 d-flex col-auto mb-2 lnh-20">
                                            <svg class="icon-20 me-1 gray-clr">
                                                <use xlink:href="#ic_building"></use>
                                            </svg>
                                            {{ ucfirst($job->company->company_name) }}
                                        </p>
                                        <p class="pe-3 d-flex col-auto mb-2 lnh-20">
                                            <svg class="icon-20 me-1 gray-clr">
                                                <use xlink:href="#ic_briefcase"></use>
                                            </svg>
                                            {{ $job->type }}
                                        </p>
                                        <p class="d-flex col-auto mb-2 lnh-20">
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
{{--                                        <span class="em-chip">Management</span>--}}
{{--                                        <span class="em-chip">Admin &amp; Clerical</span>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="box-actbar d-lg-flex justify-content-between flex-wrap align-items-center mt-3">
                                <div>
                                    <a href="{{route('frontend.company.job_detail',[$company,$job,$company->slug])}}" class=" btn btn-border-theme btn-theme btn-sm">{{__('labels.job.btn_apply_view_job')}}</a>
                                </div>
                                <div class="share mt-lg-0 mt-2">
                                    <label class="gray mb-0 me-1">Share This Job : </label>
                                    <a href="whatsapp://send?text={{ url()->current() }}">
                                        <svg class="icon-20 me-1 gray-clr theme-hover">
                                            <use xlink:href="#ic_whatsapp"></use>
                                        </svg>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank">
                                        <svg class="icon-20 me-1 gray-clr theme-hover">
                                            <use xlink:href="#ic_facebook"></use>
                                        </svg>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank">
                                        <svg class="icon-20 me-1 gray-clr theme-hover">
                                            <use xlink:href="#ic_linkedin"></use>
                                        </svg>
                                    </a>
                                    {{--                                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>--}}
                                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw">
                                        <svg class="icon-20 me-1 gray-clr theme-hover">
                                            <use xlink:href="#ic_twitter"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="mx-3 border-bottom"></div>

                    {{--                    <div class="card-body box white job-list d-flex flex-column">--}}
                    {{--                        <h3 class="border-0 body-font font-semibold">Assistant Property Manager</h3>--}}
                    {{--                        <div class="row">--}}
                    {{--                            <div class="col">--}}
                    {{--                                <div class="tags gray-clr d-flex row g-0">--}}
                    {{--                                    <p class="loc gray-clr d-flex mb-2">--}}
                    {{--                                        <svg class="icon-20 me-1 gray-clr">--}}
                    {{--                                            <use xlink:href="#ic_map_pin"></use>--}}
                    {{--                                        </svg>--}}
                    {{--                                        Villars-sur-Glâne, 1752--}}
                    {{--                                    </p>--}}
                    {{--                                    <p class="pe-3 d-flex col-auto mb-2 lnh-20">--}}
                    {{--                                        <svg class="icon-20 me-1 gray-clr">--}}
                    {{--                                            <use xlink:href="#ic_building"></use>--}}
                    {{--                                        </svg>--}}
                    {{--                                        IT & Network Administration--}}
                    {{--                                    </p>--}}
                    {{--                                    <p class="pe-3 d-flex col-auto mb-2 lnh-20">--}}
                    {{--                                        <svg class="icon-20 me-1 gray-clr">--}}
                    {{--                                            <use xlink:href="#ic_briefcase"></use>--}}
                    {{--                                        </svg> Full Time--}}
                    {{--                                    </p>--}}
                    {{--                                    <p class="d-flex col-auto mb-2 lnh-20">--}}
                    {{--                                        <svg class="icon-20 me-1 gray-clr">--}}
                    {{--                                            <use xlink:href="#ic_bookmark"></use>--}}
                    {{--                                        </svg>--}}
                    {{--                                        Intermediate--}}
                    {{--                                    </p>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="chips d-flex align-items-center flex-wrap">--}}
                    {{--                                    <span class="em-chip">Management</span>--}}
                    {{--                                    <span class="em-chip">Admin &amp; Clerical</span>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="box-actbar d-lg-flex justify-content-between flex-wrap align-items-center mt-3">--}}
                    {{--                            <div>--}}
                    {{--                                <a href="job-detail.php" target="_blank" class=" btn btn-border-theme btn-theme btn-sm">View and Apply</a>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="share mt-lg-0 mt-2">--}}
                    {{--                                <label class="gray mb-0 me-1">Share This Job : </label>--}}
                    {{--                                <a href="javascript:void(0)">--}}
                    {{--                                    <svg class="icon-20 me-1 gray-clr theme-hover">--}}
                    {{--                                        <use xlink:href="#ic_whatsapp"></use>--}}
                    {{--                                    </svg>--}}
                    {{--                                </a>--}}
                    {{--                                <a href="javascript:void(0)">--}}
                    {{--                                    <svg class="icon-20 me-1 gray-clr theme-hover">--}}
                    {{--                                        <use xlink:href="#ic_facebook"></use>--}}
                    {{--                                    </svg>--}}
                    {{--                                </a>--}}
                    {{--                                <a href="javascript:void(0)">--}}
                    {{--                                    <svg class="icon-20 me-1 gray-clr theme-hover">--}}
                    {{--                                        <use xlink:href="#ic_linkedin"></use>--}}
                    {{--                                    </svg>--}}
                    {{--                                </a>--}}
                    {{--                                <a href="javascript:void(0)">--}}
                    {{--                                    <svg class="icon-20 me-1 gray-clr theme-hover">--}}
                    {{--                                        <use xlink:href="#ic_twitter"></use>--}}
                    {{--                                    </svg>--}}
                    {{--                                </a>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            @include('frontend.includes.company.include.right')
        </div>
    </div>
@endsection
