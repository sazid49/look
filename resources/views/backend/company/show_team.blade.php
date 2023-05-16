<div class="modal-header">
	<h5 class="modal-title" id="myLargeModalLabel">{{ __('labels.company.team_detail') }}</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
	<div class="row">
		<div class="form-group mb-3 col-md-12">
			@if (!empty($team->profile_photo))
				@if (Storage::disk('public')->exists($team->profile_photo))
					<img class="personal_logo img-thumbnail" alt="no data"
						src="{{ url('storage/' . $team->profile_photo) }}">
				@endif
			@endif
		</div>
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.name') }}:</b></label>
			<label class="control-label">{{$team->name}}</label>
		</div>
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.designation') }}:</b></label>
			<label class="control-label">{{$team->designation}}</label>
		</div>
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.email') }}:</b></label>
			<label class="control-label">{{$team->email}}</label>
		</div>
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.telephone') }}:</b></label>
			<label class="control-label">{{$team->phone}}</label>
		</div>
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.twitter') }}:</b></label>
			<label class="control-label">{{$team->twitter}}</label>
		</div>
		<div class="form-group mb-3 col-md-6">
			<label class="control-label"><b>{{ __('labels.company.linkedin') }}:</b></label>
			<label class="control-label">{{$team->linkedin}}</label>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">{{__('labels.general.cancel')}}</button>
</div>
