<header class="fixed-top bg-white overflow-hidden">
    <div class="overflow-hidden">
        <nav class="navbar py-0 px-md-0 position-relative">
            <div class="container-fluid container-xl">
                <div class="left d-flex align-items-center">
                    <a class="navbar-brand me-3 me-sm-5" href="/">
                        <img src="{{ URL::asset('img/logo.png') }}" class="logo" alt="Lookon" />
                    </a>
                </div>

                @if(!request()->routeis('frontend.index'))
                    <button class="btn p-1 btn-white d-md-none d-inline-block ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                        <svg class="icon me-1">
                            <use xlink:href="#ic_search"></use>
                        </svg>
                    </button>
                    <div class="offcanvas offcanvas-top searchcanvas" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                        <div class="offcanvas-body p-0">
                            <form action="{{ url('companies/search') }}">
                                <div class="nav-search @if( Route::currentRouteName() == 'home') d-none @endif">
                                    <button type="button" class="btn p-0 text-reset d-md-none" data-bs-dismiss="offcanvas" aria-label="Close">
                                        <svg class="icon me-1 ms-3">
                                            <use xlink:href="#ic_back"></use>
                                        </svg>
                                    </button>
                                    <input type="text" name="search" class="form-control search-input" id="res-search" placeholder="{{ __('labels.search.search_something') }}">
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                <div class="navbar-toggler border-0 ms-3 cursor-pointer" aria-label="Toggle navigation" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </div>
            </div>
        </nav>
    </div>
</header>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="ms-auto align-items-center" id="navbarNav">
        <div class="offcanvas-header align-items-center">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav ms-md-auto">
                <li class="nav-item mb-3">
                    <div class="btn-group lng-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check lang-btn" name="btnradio" id="btnradio1" autocomplete="off" value="en" {{ app()->getLocale() == 'en' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="btnradio1"><img src="{{ URL::asset('img/english.svg') }}" class="icon me-2" title="English" alt=""/>English</label>
                        <input type="radio" class="btn-check lang-btn" name="btnradio" id="btnradio2" autocomplete="off" value="de" {{ app()->getLocale() == 'de' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="btnradio2"><img src="{{ URL::asset('img/germany.svg') }}" class="icon me-2" title="Germany" />German</label>
                        <input type="radio" class="btn-check lang-btn" name="btnradio" id="btnradio3" autocomplete="off" value="fr" {{ app()->getLocale() == 'fr' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="btnradio3"><img src="{{ URL::asset('img/france.svg') }}" class="icon me-2" title="French" />French</label>
                    </div>
                </li>
                @guest()
                    <li class="nav-item @if( Route::currentRouteName() == 'login') active @endif">
                        <a class="nav-link" href="{{ route('frontend.auth.login') }}">
                            <svg class="icon-20 me-1">
                                <use xlink:href="#ic_login"></use>
                            </svg>
                            <span>{{ __('Login') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @if( Route::currentRouteName() == 'signup') active @endif">
                        <a class="nav-link" href="{{ route('frontend.auth.register') }}">
                            <svg class="icon-20 me-1">
                                <use xlink:href="#ic_person"></use>
                            </svg>
                            <span>
                          {{ __('Register') }}
                        </span>
                        </a>
                    </li>

                    <li class="nav-item @if( Route::currentRouteName() == 'signup') active @endif">
                        <a class="nav-link" href="{{ route('frontend.auth.company.register') }}">
                            <svg class="icon-20 me-1">
                                <use xlink:href="#ic_person"></use>
                            </svg>
                            <span>
                          {{ __('Company Register') }}
                        </span>
                        </a>
                    </li>
                @endguest
                @auth()
                    <li class="nav-item">
                        <span class="d-inline">
                            <svg class="icon-20 me-1">
                                <use xlink:href="#ic_person"></use>
                            </svg>
                            
                            Hallo {{ $logged_in_user->name }}
                            </span>
                    </li>


                    @if ($logged_in_user->isUser())
                    <li class="nav-item">
                        <span>
                        <svg class="icon-20 me-1">
                                <use xlink:href="#ic_person"></use>
                        </svg>
                        <x-utils.link :href="route('frontend.user.dashboard')" :active="activeClass(Route::is('frontend.user.dashboard'))" :text="__('Dashboard')" class="nav-link d-inline" />
                        </span>
                    </li>
                    @endif


                    @if ($logged_in_user->isAdmin())
                    <li class="nav-item">
                        <span>
                        <svg class="icon-20 me-1">
                                <use xlink:href="#ic_person"></use>
                        </svg>
                        <x-utils.link :href="route('admin.dashboard')" :text="__('Administration')" class="nav-link d-inline" />
                        </span>
                    </li>
                    @endif




                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void()"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg class="icon-20 me-1">
                                <use xlink:href="#ic_person"></use>
                            </svg>
                            <span>
                          {{ __('Logout') }}
                        </span>
                        </a>
                        <form id="logout-form" action="{{ route('frontend.auth.logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                    
                @endauth
            </ul>
        </div>
    </div>
</div>
<div class="overlay"></div>

@push('js')
    <script>
        $(".btn-check").click(function(){
            const csrf = "{{ csrf_token() }}";
            const lang = $(this).val();
            $.ajax({
                url: "{{ route('locale.change') }}",
                data: {_token:csrf,lang:lang},
                type: "POST"
            }).done(function(){
                location.reload();
            })
        })
    </script>
@endpush
