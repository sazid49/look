<div class="section-title d-sm-flex align-items-center justify-content-between">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent" style="margin-bottom: 0px;">
            <li class="breadcrumb-item">
				<a href="{{ route('frontend.index') }}"><i class="fa fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">
				<a href="{{ route('frontend.list.index') }}">{{ __('labels.general.listing') }}</a>
			</li>
            <li class="breadcrumb-item">
				<a href="javascript:void(0)">{{ __('labels.general.place') }}</a>
			</li>
            @if(!empty($place->category))
            <li class="breadcrumb-item">
				{{-- <a href="/company/<?php echo str_replace(' ', '_', $place->category->value); ?>"><?php echo $place->category->value; ?></a> --}}
				{{-- <a href="{{route('frontend.companies.category.index',str_replace(' ', '_', $place->category->value))}}"><?php echo $place->category->value; ?></a> --}}
				<a href="{{route('frontend.companies.category.index',$place->category->id)}}"><?php echo $place->category->value; ?></a>
			</li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">
				<a href="{{ route('frontend.company.information', [$place,$place->slug]) }}"><?php echo $place->company_name; ?></a>
			</li>
        </ol>
    </nav>
    <div class="page-date">
        <i data-feather="calendar"></i>{{ date('l') . ', ' . date('d M Y') }}
    </div>
</div>
