<div class="modal-header">
	<h5 class="modal-title" id="myLargeModalLabel">{{ __('labels.company.news_detail') }}</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
	<div class="news_div">
		<div class="row">
			<div class="col-md-6 col-xl-6">
				@if (!empty($news['image']))
					@if (Storage::disk('public')->exists($news['image']))
						<img class="personal_logo user-profile-image" alt="no data" src="{{url('storage/' . $news['image'])}}" width="80px" height="auto">
					@else
						<img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
					@endif
				@else
					<img src="{{ URL::asset('/assets/images/no_image.png') }}" alt="" class="personal_logo" height="60px">
				@endif
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-12 ">
				<div class="row">
					<div class="form-group mb-3 col-md-4">
						<label class="control-label"><b>{{ __('labels.company.title') }}:</b></label>
						<label class="control-label">{{ $news->title }}</label>
					</div>
					<div class="form-group mb-3 col-md-4">
						<label class="control-label"><b>{{ __('labels.company.author') }}:</b></label>
						<label class="control-label">{{ $news->author }}</label>
					</div>
					<div class="form-group mb-3 col-md-4">
						<label class="control-label"><b>{{ __('labels.company.published') }} ?:</b></label>
						<label class="control-label">{{ ($news->published == 1) ? __('labels.company.ja') : __('labels.company.nein') }}</label>
					</div>
				</div>
			</div>
			<div class="row news_description">
				<div class="col-md-12" >
					<div class="form-group mb-3 col-md-12 ">
						<label class="control-label"><b>{{ __('labels.company.description') }}:</b></label><br>
						<label class="control-label">{!! $news->description !!}</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">{{__('labels.general.close')}}</button>
</div>
