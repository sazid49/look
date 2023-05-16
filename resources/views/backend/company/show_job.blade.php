<div class="modal-header">
	<h5 class="modal-title" id="myLargeModalLabel">{{ __('labels.company.job_detail') }}</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
	<div class="row">
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.title') }}:</b></label>
			<label class="control-label">{{ $job->title }}</label>
		</div>
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.location') }}:</b></label>
			<label class="control-label">{{ $job->location }}</label>
		</div>
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.start_date') }}:</b></label>
			<label class="control-label">{{ date('d M Y',strtotime($job->start_date)) }}</label>
		</div>
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.skill') }}:</b></label>
			<label class="control-label">{{ $job->skill }}</label>
		</div>
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.job_type') }}:</b></label>
			<label class="control-label">{{ ($job->type == 'PartTime') ? __('labels.company.parttime') : __('labels.company.fulltime') }}</label>
		</div>
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.published') }} ?:</b></label>
			<label class="control-label">{{ ($job->active == 1) ? __('labels.company.ja') : __('labels.company.nein') }}</label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group mb-3 col-md-12 ">
				<label class="control-label"><b>{{ __('labels.company.description') }}:</b></label><br>
				<label class="control-label">{!! $job->description !!}</label>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">{{__('labels.general.cancel')}}</button>
</div>