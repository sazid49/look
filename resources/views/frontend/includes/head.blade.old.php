<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="UTF-8">
<title>Needle</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Theme Style -->
<link rel="stylesheet" href="{{ asset('frontend/css/faceted.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" />
<!-- jQuery UI -->
<link rel="stylesheet" href="{{ asset('frontend/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.css') }}">
<!-- ion range slider -->
<link rel="stylesheet" href="{{ asset('frontend/vendor/ion.rangeSlider-master/css/ion.rangeSlider.min.css') }}">

<!-- Favicon -->
<link rel="icon" href="{{ URL::asset('img/favicon.png') }}" type="image/png" sizes="16x16">

<!-- meta tags, search engine, submit -->
<meta property="og:description"
    content="Needle is faceted search build with Laravel. Needle perform all searches by ajax.">

<meta name="copyright" content="smartrahat">
<meta name="author" content="smartrahat">
<meta name="web_content_type" content="Faceted Search">
<meta name="author" content="smartrahat">
<meta name="country" content="International">
<meta name="web_author" content="smartrahat">

<meta name="reply-to" content="smartrahat@gmail.com">
<meta name="robots" content="index, follow">
<meta name="resource-type" content="search">
<meta name="classification" content="internet">
<meta name="distribution" content="global">
<meta name="rating" content="safe for kids">
<meta name="doc-type" content="public">
<meta name="Identifier-URL" content="https://needle.smartrahat.com/">
<meta name="subject" content="faceted search engine by laravel">

<meta name="contactName" content="smartrahat">
<meta name="contactOrganization" content="smartrahat">
<meta name="contactStreetAddress1" content="318, Asian Housing Society, Bahaddar Hat">
<meta name="contactZipcode" content="4212">
<meta name="contactCity" content="Chittagong">
<meta name="contactCountry" content="Bangladesh">
<meta name="contactPhoneNumber" content="+880 171 1306359">
<meta name="contactNetworkAddress" content="smartrahat@gmail.com">
<meta name="linkage" content="https://needle.smartrahat.com">
<header id="header-container">
    <div class="alert alert-warning alert-dismissible fade show top_msg border-0 rounded-0 mb-0  d-none" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- cust -->
    <div class="container">
        <div class="header-row position-relative d-flex">
            <div class="header-left">
                <div class="logo zoomIn animated">
                    <a href="{{ route('frontend.index') }}"><img src="{{ asset('img/logo.png') }}" alt="" /></a>
                </div>
            </div>
            <div class="s_box zoomIn animated ml-auto1" style="width: 55%;">
                <form action="{{route('frontend.list.index')}}" method="GET">
                    <div class="s_field">
                        <input type="text" name="q" style="width: 100% !important" placeholder="<?= __('labels.search.search_something') ?>"
                            required />
                        <button type="submit">
                            <img src="{{ asset('frontend/assets/images/header-images/search.svg') }}" />
                        </button>
                    </div>
                </form>
            </div>
            <button class="toggle-menu zoomIn animated ml-3">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="dropdown l-dropdown zoomIn animated">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    @if (strtolower(app()->getLocale()) == 'en')
                        <span class="icon"><img
                                src="{{ asset('frontend/assets/images/header-images/english.png') }}" /></span>
                    @elseif(strtolower(app()->getLocale()) == 'fr')
                        <span class="icon"><img
                                src="{{ asset('frontend/assets/images/header-images/france.svg') }}" /></span>
                    @else
                        <span class="icon"><img
                                src="{{ asset('frontend/assets/images/header-images/germany.svg') }}" /></span>
                    @endif
                    {{-- <span class="d-inline-block d-xs-none lang-text">Language</span> --}}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item <?= strtolower(app()->getLocale()) == 'en' ? 'active' : '' ?>"
                        href="{{ url('lang/en') }}">
                        <span class="icon"><img
                                src="{{ asset('frontend/assets/images/header-images/english.png') }}" /></span>English
                    </a>
                    <a class="dropdown-item <?= strtolower(app()->getLocale()) == 'de' ? 'active' : '' ?>"
                        href="{{ url('lang/de') }}">
                        <span class="icon"><img
                                src="{{ asset('frontend/assets/images/header-images/germany.svg') }}" /></span>German
                    </a>
                    <a class="dropdown-item <?= strtolower(app()->getLocale()) == 'fr' ? 'active' : '' ?>"
                        href="{{ url('lang/fr') }}">
                        <span class="icon"><img
                                src="{{ asset('frontend/assets/images/header-images/france.svg') }}" /></span>French
                    </a>
                </div>
            </div>
            <div class="header-right">&nbsp;&nbsp;
                <a class="right-menu h4" href="javascript:void(0)">
                    <i class="fa fa-list"></i>
                </a>
                <!-- new listing menu -->
                <div class="nav-menu align-items-md-center">
                    <div class="m-menu">
                        <a href="mailto:info@lookon.ch"
                            class="btn btn-blue d-flex align-items-center mr-md-2 zoomIn animated">
                            <svg class="ic mr-2 mr-md-1">
                                <use xlink:href="#mail-opened"></use>
                            </svg>
                            Mail us
                        </a>
                    </div>
                    <div class="m-menu">
                        <a href="javascript:void(0)"
                            class="btn btn-blue d-flex align-items-center mr-md-2 zoomIn animated">
                            <svg class="ic mr-2 mr-md-1">
                                <use xlink:href="#apps"></use>
                            </svg>
                            <?php echo __('add_listing'); ?>
                        </a>
                    </div>

                    @if ($logged_in_user)
                        <div class="dropdown l-dropdown zoomIn animated">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon">
                                    <img src="{{ $logged_in_user->avatar }}" />
                                </span>

                                <span class="d-inline-block d-xs-none lang-text">{{ $logged_in_user->name }}</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if ($logged_in_user->isAdmin())
                                    <x-utils.link :href="route('admin.dashboard')" :text="__('Administration')" class="dropdown-item" />
                                @endif

                                @if ($logged_in_user->isUser())
                                    <x-utils.link :href="route('frontend.user.dashboard')" :active="activeClass(Route::is('frontend.user.dashboard'))" :text="__('Dashboard')"
                                        class="dropdown-item" />
                                @endif

                                {{-- <x-utils.link :href="route('frontend.user.account')" :active="activeClass(Route::is('frontend.user.account'))" :text="__('My Account')"
                                    class="dropdown-item" /> --}}

                                <x-utils.link :text="__('Logout')" class="dropdown-item"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <x-slot name="text">
                                        @lang('Logout')
                                        <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                                    </x-slot>
                                </x-utils.link>
                            </div>
                        </div>
                    @else
                        <div class="m-menu">
                            <a href="{{ route('frontend.auth.login') }}"
                                class="btn btn-blue d-flex align-items-center zoomIn animated">
                                {{ __('Login') }}</span></a>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- end cust -->
    <!-- Header / End -->

    <svg width="0" height="0" class="d-none">
        <symbol xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" id="apps">
            <desc>Download more icon variants from https://tabler-icons.io/i/apps</desc>
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
            <line x1="14" y1="7" x2="20" y2="7"></line>
            <line x1="17" y1="4" x2="17" y2="10"></line>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" id="user">
            <desc>Download more icon variants from https://tabler-icons.io/i/user</desc>
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="12" cy="7" r="4"></circle>
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" id="mail-opened">
            <desc>Download more icon variants from https://tabler-icons.io/i/mail-opened</desc>
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <polyline points="3 9 12 15 21 9 12 3 3 9"></polyline>
            <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10"></path>
            <line x1="3" y1="19" x2="9" y2="13"></line>
            <line x1="15" y1="13" x2="21" y2="19"></line>
        </symbol>
    </svg>

</header>
