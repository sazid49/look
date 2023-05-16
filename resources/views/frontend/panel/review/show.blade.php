@extends('frontend.layouts.legacy.panel')

@section('title', __('labels.review.detail'))

@section('page-title', __('labels.review.detail'))

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-20">@lang(__('labels.review.detail'))</h4>
                    <x-utils.link class="card-header-action" :href="route('frontend.panel.reviews.index')" :text="'Back'" />
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12 mt-3">
            <x-backend.card>
                <x-slot name="body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
								@foreach ($review->ReviewRating as $item)
									<tr>
										<th>{{ $item->ReviewCriteria->title }}</th>
										<td>
											@for ($i = 1; $i <= $item->rating; $i++)
												<i class="bx bxs-star"></i>
											@endfor
											@for ($j = $i; $j <= 5; $j++)
												<i class="bx bx-star"></i>
											@endfor
										</td>
									</tr>
								@endforeach
                                <tr>
                                    <th>{{ __('labels.review.company_name') }}</th>
                                    <td>{{ $review->company->company_name }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.review.firstname') }}</th>
                                    <td>{{ $review->firstname }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.review.lastname') }}</th>
                                    <td>{{ $review->lastname }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.review.email') }}</th>
                                    <td>{{ $review->email }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.review.postcode') }}</th>
                                    <td>{{ $review->postcode }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.review.city') }}</th>
                                    <td>{{ $review->city }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.review.message') }}</th>
                                    <td>{{ $review->review }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.review.upload_image') }}</th>
                                    <td>
                                        @if (!empty($review->image))
                                            @if (Storage::disk('public')->exists($review->image))
                                                <br>
                                                <img alt="no data" src="{{ url('storage/' . $review->image) }}"
                                                    class='myImg' height="80px" width="80px">
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
						<hr>
						@if($review->ReviewReply)
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label class="control-label"><b>{{ __('labels.review.replay_message') }}</b></label><br>
									<label class="control-label">{{$review->ReviewReply->replay_message}}</label><br>
								</div>
							</div>
						@else
							<x-forms.post :action="route('frontend.panel.reviews.replay', [$review])" enctype="multipart/form-data" class="custom-validation" novalidate>
								<div class="col-md-6">

									<div class="form-group mb-3">
										<label class="control-label"><b>{{ __('labels.review.replay_message') }}</b></label><br>
										<textarea name="replay_message" id="replay_message" class="form-control" rows="5"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<input type="submit" class="btn btn-primary" value="{{ __('labels.general.replay') }}">
								</div>
							</x-forms.post>
						@endif
                    </div>
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection
