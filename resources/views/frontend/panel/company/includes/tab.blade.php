<!-- Nav tabs -->
<ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.information'), 'active')}}" href="{{ route('frontend.panel.company.information', $company) }}"
			role="tab">
			<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.informationen') }}</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.register'), 'active')}} {{($company->payer != '1') ? 'disabled' : ''}}" href="{{ route('frontend.panel.company.register', $company) }}" role="tab">
			<span class="d-block d-sm-none"><i class="far fa-user"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.register') }}</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.interaction'), 'active')}} {{($company->payer != '1') ? 'disabled' : ''}}" href="{{ route('frontend.panel.company.interaction', $company) }}" role="tab">
			<span class="d-block d-sm-none"><i class="far fa-user"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.interraktion') }}</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.review'), 'active')}} {{($company->payer != '1') ? 'disabled' : ''}}" href="{{ route('frontend.panel.company.review', $company) }}" role="tab">
			<span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.bewertung') }}</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.contact_form'), 'active')}} {{($company->payer != '1') ? 'disabled' : ''}}" href="{{ route('frontend.panel.company.contact_form', $company) }}" role="tab">
			<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.kontaktformular') }}</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.recommendations'), 'active')}} {{($company->payer != '1') ? 'disabled' : ''}}" href="{{ route('frontend.panel.company.recommendations', $company) }}"
			role="tab">
			<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.empfehlungen') }}</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.pricelist'), 'active')}} {{($company->payer != '1') ? 'disabled' : ''}}" href="{{ route('frontend.panel.company.pricelist', $company) }}" role="tab">
			<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.preisliste') }}</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.team.*'), 'active')}} {{($company->payer != '1') ? 'disabled' : ''}}" href="{{ route('frontend.panel.company.team.index', $company) }}" role="tab">
			<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.team') }}</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.news.*'), 'active')}} {{($company->payer != '1') ? 'disabled' : ''}}" href="{{ route('frontend.panel.company.news.index', $company) }}" role="tab">
			<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.news') }}</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.gallery.*'), 'active')}} {{($company->payer != '1') ? 'disabled' : ''}}" href="{{ route('frontend.panel.company.gallery.index', $company) }}" role="tab">
			<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.galerie') }}</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.job_application.*'), 'active')}} {{($company->payer != '1') ? 'disabled' : ''}}" href="{{ route('frontend.panel.company.job_application.index', $company) }}">
			<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.bewerbung') }}</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{activeClass(Route::is('frontend.panel.company.seo'), 'active')}} {{($company->payer != '1') ? 'disabled' : ''}}" href="{{ route('frontend.panel.company.seo', $company) }}">
			<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
			<span class="d-none d-sm-block">{{ __('labels.company.seo') }}</span>
		</a>
	</li>
</ul>