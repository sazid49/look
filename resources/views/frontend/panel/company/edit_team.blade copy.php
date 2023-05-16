<x-forms.patch :action="route('frontend.panel.company.team.update',[$company,$team])" enctype="multipart/form-data" class="custom-validation" novalidate>
	<div class="modal-header">
		<h5 class="modal-title" id="myLargeModalLabel">{{ __('labels.company.edit_news') }}</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12 ">
				<div class="row">
					<div class="form-group mb-3 col-md-2">
						@if (!empty($team['profile_photo']))
							@if (Storage::disk('public')->exists($team['profile_photo']))
								<img class="personal_logo" alt="no data" src="{{url('storage/' . $team['profile_photo'])}}" width="80px" height="auto" class="user-profile-image">
							@else
								<img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
							@endif
						@else
							<img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
						@endif
					</div>
					<div class="form-group mb-3 col-md-5">
						<label class="control-label"><b>{{ __('labels.company.image') }}</b></label>
						<input type="file" name="profile_photo" class="form-control" value="">
						{{-- <div class="slim" data-did-remove="setImageDeleted" data-meta='{"type":"company_logo","field":"image"}'>
							<input type="file" name="profile_photo">
						</div> --}}
					</div>
					<div class="form-group mb-3 col-md-6">
						<label class="control-label"><b>{{ __('labels.company.name') }}</b></label>
						<input type="text" id="name" name="name" class="form-control" value="{{old('name',$team->name)}}">
					</div>
					<div class="form-group mb-3 col-md-6">
						<label class="control-label"><b>{{ __('labels.company.designation') }}</b></label>
						<input type="text" name="designation" class="form-control" value="{{old('designation',$team->designation)}}">
					</div>
				</div>
				<div class="row">
					<div class="form-group mb-3 col-md-4">
						<label class="control-label"><b>{{ __('labels.company.email') }}</b></label>
						<input type="text" id="email" name="email" class="form-control" value="{{old('email',$team->email)}}">
					</div>
					<div class="form-group mb-3 col-md-4">
						<label class="control-label"><b>{{ __('labels.company.telephone') }}</b></label>
						<input type="text" name="phone" class="form-control" value="{{old('phone',$team->phone)}}">
					</div>
					<div class="form-group mb-3 col-md-4">
						<label class="control-label"><b>{{ __('labels.company.twitter') }}</b></label>
						<input type="text" name="twitter" class="form-control" value="{{old('twitter',$team->twitter)}}">
					</div>
					<div class="form-group mb-3 col-md-4">
						<label class="control-label"><b>{{ __('labels.company.linkedin') }}</b></label>
						<input type="text" name="linkedin" class="form-control" value="{{old('linkedin',$team->linkedin)}}">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="submit" class="btn btn-primary" value="{{__('labels.general.buttons.update')}}">
	</div>
</x-forms.patch>