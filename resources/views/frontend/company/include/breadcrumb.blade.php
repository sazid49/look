<div class="section-title d-sm-flex align-items-center justify-content-between">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0">
            <li class="breadcrumb-item">
				<a href="{{ route('frontend.index') }}"><i class="fa fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">
				<a href="{{ route('frontend.list.index') }}">{{ __('labels.general.listing') }}</a>
			</li>
            <li class="breadcrumb-item">
				<a href="javascript:void(0)">{{ __('labels.general.company') }}</a>
			</li>
            @if(!empty($company->category))
            <li class="breadcrumb-item">
				{{-- <a href="/company/<?php echo str_replace(' ', '_', $company->category->value); ?>"><?php echo $company->category->value; ?></a> --}}
				{{-- <a href="{{route('frontend.companies.category.index',str_replace(' ', '_', $company->category->value))}}"><?php echo $company->category->value; ?></a> --}}
				<a href="#">{{ $company->category->value }}</a>
			</li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">
				<a href="{{ route('frontend.company.information', [$company,$company->slug]) }}">{{ $company->company_name }}</a>
			</li>
        </ol>
    </nav>
    <div class="page-date">
        <i data-feather="calendar"></i>{{ date('l') . ', ' . date('d.m.Y') }}
    </div>
</div>
