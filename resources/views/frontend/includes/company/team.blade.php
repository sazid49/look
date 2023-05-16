@extends('frontend.pages.company')

@section('title', __('labels.company.team_tab_title'))

@section('tabcontent')
    <div class="tab-pane-defeated" id="team" role="tabpanel" aria-labelledby="team-tab">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-header bg-white pb-0">
                        <h4 class="s-font mb-0">
                            Team
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row team-row">
                            @foreach($company->teams as $team)
                                <div class="col-sm-6 mb-4 mb-md-5">
                                    <div class="team-card d-flex row g-0">
                                        <div class="col-auto">
                                            <img src="{{ asset('storage') }}/{{ $team->profile_photo }}" alt="" class="mb-4 rounded-circle team-img">
                                        </div>
                                        <div class="col">
                                            <div class="ps-3">
                                                <h3 class="border-0 body-font font-medium mb-1">{{ $team->name }}</h3>
                                                <p class="gray-clr d-flex mb-2">
                                                    {{ $team->designation }}
                                                </p>
                                                <ul class="d-flex list-unstyled social_icons gray-clr mt-0 mb-1">
                                                    <li>
                                                        <a href="tel:{{ $team->phone }}">
                                                            <svg class="icon-20">
                                                                <use xlink:href="#ic_call"></use>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="mailto:{{ $team->email }}">
                                                            <svg class="icon-20">
                                                                <use xlink:href="#ic_mail"></use>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/{{ $team->twitter }}">
                                                            <svg class="icon-20">
                                                                <use xlink:href="#ic_twitter"></use>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.linkedin.com/in/{{ $team->linkedin }}">
                                                            <svg class="icon-20">
                                                                <use xlink:href="#ic_linkedin"></use>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.linkedin.com/in/{{ $team->xing }}">
                                                            <svg class="icon-20">
                                                                <use xlink:href="#ic_facebook"></use>
                                                            </svg>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
{{--                            <div class="col-sm-6 mb-4 mb-md-5">--}}
{{--                                <div class="team-card d-flex row g-0">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <img src="img/user2.jpg" alt="" class="mb-4 rounded-circle team-img">--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <div class="ps-3">--}}
{{--                                            <h3 class="border-0 body-font font-medium mb-1">Marie Walters</h3>--}}
{{--                                            <p class="gray-clr d-flex mb-2">--}}
{{--                                                CEO--}}
{{--                                            </p>--}}
{{--                                            <p class="gray-clr d-flex mb-2 moto">--}}
{{--                                                <em>"Team long text moto goes to here Team long text moto goes to here"</em>--}}
{{--                                            </p>--}}
{{--                                            <ul class="d-flex list-unstyled social_icons gray-clr mt-0 mb-1">--}}
{{--                                                <li>--}}
{{--                                                    <a href="tel:23920392093">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_call"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="mailto:test@test.com">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_mail"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_twitter"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_linkedin"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}

{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- col end -->--}}
{{--                            <div class="col-sm-6 mb-4 mb-md-5">--}}
{{--                                <div class="team-card d-flex row g-0">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <img src="img/user2.jpg" alt="" class="mb-4 rounded-circle team-img">--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <div class="ps-3">--}}
{{--                                            <h3 class="border-0 body-font font-medium mb-1">Marie Walters</h3>--}}
{{--                                            <p class="gray-clr d-flex mb-2">--}}
{{--                                                CEO--}}
{{--                                            </p>--}}
{{--                                            <p class="gray-clr d-flex mb-2 moto">--}}
{{--                                                <em>"Team long text moto goes to here Team long text moto goes to here"</em>--}}
{{--                                            </p>--}}
{{--                                            <ul class="d-flex list-unstyled social_icons gray-clr mt-0 mb-1">--}}
{{--                                                <li>--}}
{{--                                                    <a href="tel:23920392093">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_call"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="mailto:test@test.com">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_mail"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_twitter"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_linkedin"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}

{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- col end -->--}}
{{--                            <div class="col-sm-6 mb-4 mb-md-5">--}}
{{--                                <div class="team-card d-flex row g-0">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <img src="img/user2.jpg" alt="" class="mb-4 rounded-circle team-img">--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <div class="ps-3">--}}
{{--                                            <h3 class="border-0 body-font font-medium mb-1">Marie Walters</h3>--}}
{{--                                            <p class="gray-clr d-flex mb-2">--}}
{{--                                                CEO--}}
{{--                                            </p>--}}
{{--                                            <p class="gray-clr d-flex mb-2 moto">--}}
{{--                                                <em>"Team long text moto goes to here Team long text moto goes to here"</em>--}}
{{--                                            </p>--}}
{{--                                            <ul class="d-flex list-unstyled social_icons gray-clr mt-0 mb-1">--}}
{{--                                                <li>--}}
{{--                                                    <a href="tel:23920392093">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_call"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="mailto:test@test.com">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_mail"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_twitter"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_linkedin"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}

{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- col end -->--}}
{{--                            <div class="col-sm-6 mb-4 mb-md-5">--}}
{{--                                <div class="team-card d-flex row g-0">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <img src="img/user2.jpg" alt="" class="mb-4 rounded-circle team-img">--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <div class="ps-3">--}}
{{--                                            <h3 class="border-0 body-font font-medium mb-1">Marie Walters</h3>--}}
{{--                                            <p class="gray-clr d-flex mb-2">--}}
{{--                                                CEO--}}
{{--                                            </p>--}}
{{--                                            <p class="gray-clr d-flex mb-2 moto">--}}
{{--                                                <em>"Team long text moto goes to here Team long text moto goes to here"</em>--}}
{{--                                            </p>--}}
{{--                                            <ul class="d-flex list-unstyled social_icons gray-clr mt-0 mb-1">--}}
{{--                                                <li>--}}
{{--                                                    <a href="tel:23920392093">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_call"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="mailto:test@test.com">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_mail"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_twitter"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <svg class="icon-20">--}}
{{--                                                            <use xlink:href="#ic_linkedin"></use>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}

{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- col end -->
                        </div>
                    </div>
                </div>

            </div>
            @include('frontend.includes.company.include.right')
        </div>
    </div>
@endsection
