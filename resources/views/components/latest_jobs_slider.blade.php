<section class="section-padding jobs-section slider-section pt-0">
    <div class="container-fluid container-xl">
        <div class="list-top-bar d-flex justify-content-between align-items-center border-bottom">
            <h3 class="font-semibold section-title mb-3">{{ __('labels.company.recent_jobs') }}</h3>
            <a href="{{ route('frontend.jobs') }}" class="theme-clr xs-font text-uppercase font-medium ms-3 mb-3 view-all">{{ __('labels.company.view_all') }}</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 px-md-0">
                <div class="job_slick">
                    @foreach($jobs as $job)
                        <div>
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
                                        <a href="{{route('frontend.company.job_detail',[$job->company,$job,$job->company->slug])}}" class="btn btn-border-theme btn-theme btn-sm">{{ __('labels.job.submit_btn') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <!--col-end-->
        </div>
    </div>
</section>
