<div class="section-title d-sm-flex align-items-center justify-content-between">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0">
            <li class="breadcrumb-item">
				<a href="#"><i class="fa fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">
				<a href="#">{{ __('labels.general.listing') }}</a>
			</li>
            <li class="breadcrumb-item">
				<a href="{{route('frontend.companies.list')}}">{{ __('labels.general.company') }}</a>
			</li>
            @if(!empty($company->category))
            <li class="breadcrumb-item">
				{{-- <a href="/company/<?php echo str_replace(' ', '_', $company->category->value); ?>"><?php echo $company->category->value; ?></a> --}}
				{{-- <a href="{{route('frontend.companies.category.index',str_replace(' ', '_', $company->category->value))}}"><?php echo $company->category->value; ?></a> --}}
				<a href="{{route('frontend.companies.list','categories[]='.$company->category_id)}}"><?php echo $company->category->value; ?></a>
			</li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">
				<a href="#">{{ $company->company_name }}</a>
			</li>
        </ol>
    </nav>
    <div class="page-date">
            <!-- 
            <div class="d-flex justify-content-md-end">
                <div class="mb-2 mb-md-2 mt-md-0">
                    <span class="badge bg-secondary">Auto</span>
                    <span class="badge bg-secondary">Garage</span>
                    <span class="badge bg-secondary">Reperatur</span>
                </div>
            </div>
            -->
        </div>
</div>
