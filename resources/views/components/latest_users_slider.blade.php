<section class="section-padding pt-0">
    <div class="container-fluid container-xl">
        <div class="list-top-bar d-flex justify-content-between align-items-center border-bottom">
            <h3 class="font-semibold section-title mb-3">{{ __('labels.company.new_users') }}</h3>
            <a href="{{ route('frontend.users') }}" class="theme-clr xs-font text-uppercase font-medium ms-3 mb-3 view-all">{{ __('labels.company.view_all') }}</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 px-md-0">
                <div class="multiple_slick">
                    @foreach($users as $user)
                    <div>
                        <div class="lo-card-body card text-center">
                            <div class="card-body box white job-list d-flex flex-column">

                                <div>
                                    <img src="{{ asset('storage') }}/{{ $user->avatar }}" alt="" class="img-user rounded-circle mb-4 mt-2 mx-auto">
                                </div>
                                <h3 class="border-0 sm-font font-medium">{{ $user->name }}</h3>
                                <p class="loc  gray-clr d-flex mb-2 justify-content-center">
                                    <svg class="icon-20 me-1 gray-clr">
                                        <use xlink:href="#ic_map_pin"></use>
                                    </svg>
                                    {{ $user->userdetails->address }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- slide end -->
                </div>
            </div>
        </div>
    </div>
</section>
