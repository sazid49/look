<!-- Nav tabs -->
<ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ isActive('admin.company.information') }}" href="{{ route('admin.company.information', $company) }}"
           role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
            <span class="d-none d-sm-block">{{ __('labels.company.informationen') }}</span>
        </a>
    </li>
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{ route('admin.company.register', $company) }}" role="tab">--}}
{{--            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>--}}
{{--            <span class="d-none d-sm-block">{{ __('labels.company.register') }}</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link {{ isActive('admin.company.information') }}" href="{{ route('admin.company.interaction', $company) }}" role="tab">--}}
{{--            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>--}}
{{--            <span class="d-none d-sm-block">{{ __('labels.company.interraktion') }}</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{ route('admin.company.review', $company) }}" role="tab">--}}
{{--            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>--}}
{{--            <span class="d-none d-sm-block">{{ __('labels.company.bewertung') }}</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link {{ isActive('admin.company.information') }}" href="{{ route('admin.company.contact_form', $company) }}" role="tab">--}}
{{--            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>--}}
{{--            <span class="d-none d-sm-block">{{ __('labels.company.kontaktformular') }}</span>--}}
{{--        </a>--}}
{{--    </li>--}}
    <li class="nav-item">
        <a class="nav-link {{ isActive('admin.company.recommendations') }}" href="{{ route('admin.company.recommendations', $company) }}"
           role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
            <span class="d-none d-sm-block">{{ __('labels.company.empfehlungen') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('admin.company.pricelist') }}" href="{{ route('admin.company.pricelist', $company) }}" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
            <span class="d-none d-sm-block">{{ __('labels.company.preisliste') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('admin.company.team.index') }}" href="{{ route('admin.company.team.index', $company) }}" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
            <span class="d-none d-sm-block">{{ __('labels.company.team') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('admin.company.news.index') }}" href="{{ route('admin.company.news.index', $company) }}" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
            <span class="d-none d-sm-block">{{ __('labels.company.news') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('admin.company.gallery.index') }}" href="{{ route('admin.company.gallery.index', $company) }}" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
            <span class="d-none d-sm-block">{{ __('labels.company.galerie') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('admin.company.job_application.index') }}" href="{{ route('admin.company.job_application.index', $company) }}">
            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
            <span class="d-none d-sm-block">{{ __('labels.company.bewerbung') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive('admin.company.seo') }}" href="{{ route('admin.company.seo', $company) }}">
            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
            <span class="d-none d-sm-block">{{ __('labels.company.seo') }}</span>
        </a>
    </li>
</ul>
