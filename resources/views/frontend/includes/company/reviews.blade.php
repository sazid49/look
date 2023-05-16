@extends('frontend.pages.company')

@section('title', __('labels.review.tab_title'))

@section('tabcontent')
    <div class="tab-pane-defeated" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        <div class="row ">
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-header bg-white pb-0">
                        <h4 class="s-font mb-0">
                            {{ __('labels.company.reviews') }}
                        </h4>
                        @error('review')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-md-between mb-10">
                            <div class="col-sm-auto ">
                                <div class="rating-block pr-sm-4 mb-10 mb-4">
                                    <div class="d-flex list-unstyled mb-10">
                                        @for ($i = 0; $i < $rating; $i++)
                                            <svg class="star-fill icon me-1">
                                                <use xlink:href="#ic_star"></use>
                                            </svg>
                                        @endfor
                                        @for ($i = 0; $i < 5 - $rating; $i++)
                                            <svg class="star icon me-1">
                                                <use xlink:href="#ic_star"></use>
                                            </svg>
                                        @endfor
                                    </div>
                                    <p class="mb-3 pb-2">{{ $rating }} out of 5 | {{ $reviews->count() }} {{ __('labels.company.reviews') }}</p>
                                    <a href="#addReview" class="btn btn-border-theme mb-3 mb-md-0 addReviewbtn">{{ __('labels.review.submit_btn') }}</a>
                                </div>
                            </div>
                            <div class="col-sm-7 col-md-10 col-lg-7 col-xxl-7 rating-progress gray-clr">
                                @if (!empty($reviewCriterias))
                                    @foreach ($reviewCriterias as $item)
                                        <div class="d-flex align-items-center mb-10 text-nowrap">
                                            <div class="rating-title">
                                                {{ $item->title ?? '' }}
                                                <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                   data-bs-title="{{ $item->description_de }}"
                                                   class="ms-auto">
                                                    <svg class="icon ms-1">
                                                        <use xlink:href="#ic_info"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="progress" style="height:7px;">
                                                <div class="progress-bar" role="progressbar" style="width: {{criteriaPercent($item->id,$company->id,'company')}};" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            {{ $item->ratings->where('listing_type','company')->where('listing_id',$company->id)->count() ?? 0 }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="review-card-list">
                            @foreach ($reviews as $review)
                                <!-- review card start -->
                                <div class="card-body border-bottom bg-white px-0">
                                    <div class="d-flex flex-wrap ">
                                        <div class="media align-items-center mb-10 me-auto">
                                            @if(Storage::disk('public')->exists($review->User->avatar ?? '') ? 1 : 0)
                                                <img src="{{ asset('storage') }}/{{ $review->User->avatar ?? '' }}" alt="{{ $review->firstname }}" class="me-2 rounded-corner" style="width:40px;height:40px">
                                            @else
                                                <img src="{{ asset('img/favicon.png') }}" alt="{{ $review->firstname }}" class="me-2 rounded-corner" style="width:40px;height:40px">
                                            @endif
                                            <div class="media-body ms-2">
                                                <p class="font-semibold xs2-font mb-0">
                                                    {{ $review->firstname }}&nbsp;{{ $review->lastname }}</p>
                                                <p class="gray-clr mb-0 ">
                                                    <small>{{ $review->created_at->format('d M Y') }}</small></p>
                                            </div>
                                        </div>
                                        <div class="d-inline-block mb-10">
                                            @if($review->reviewRating->count())
                                                @for ($i = 0; $i < round($review->ReviewRating->sum('rating')/$review->reviewRating->count()); $i++)
                                                    <span>
                                                        <svg class="icon-18">
                                                            <use xlink:href="#ic_star_fill"></use>
                                                        </svg>
                                                    </span>
                                                @endfor
                                                @for ($i = 0; $i < 5 - round($review->ReviewRating->sum('rating')/$review->reviewRating->count()); $i++)
                                                    <span>
                                                        <svg class="icon-18">
                                                            <use xlink:href="#ic_star_gray"></use>
                                                        </svg>
                                                    </span>
                                                @endfor
                                            @endif
                                        </div>
                                    </div>
                                    <p class="mb-0 xs2-font">{{ $review->review }}</p>
                                    <div class="d-flex review-uploaded-image">
                                        @if (!empty($review->image))
                                        @foreach (json_decode($review->image) as $image)
                                            <a href="{{ asset('storage') }}/{{ $image }}" data-fancybox="gallery" class="review-img">
                                                <img src="{{ asset('storage') }}/{{ $image }}" alt="">
                                            </a>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <!-- review card end -->
                            @endforeach
                        </div>

                        {{ $reviews->links() }}

{{--                        <nav aria-label="Page navigation example">--}}
{{--                            <ul class="pagination justify-content-center mt-3 mb-2">--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                        <span aria-hidden="true">&laquo;</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="#" aria-label="Next">--}}
{{--                                        <span aria-hidden="true">&raquo;</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
                    </div>
                </div>
                <div class="card" id="addReview">
                    <div class="card-header bg-white pb-0">
                        <h4 class="s-font mb-1">
                            {{__('labels.review.submit_review')}}
                        </h4>
                        <p class="mb-0 gray-clr">{{__('labels.review.email_warning')}}</p>
                    </div>
                    <div class="card-body">
                        <form id="add-comment" action="{{ route('frontend.company.store_reviews', $company) }}"
                              class="add-comment needs-validation form-custom-responsive" method="post"
                              enctype="multipart/form-data" novalidate="">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    @if (!empty($reviewCriterias))
                                        @foreach ($reviewCriterias as $key => $item)
                                            <div class="col-sm-6">
                                                <div class="add-sub-rating form-group d-flex">
                                                    <div>
                                                        <div class="sub-rating-title mb-1">
                                                            {{ $item->title}}
                                                            <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                               data-bs-title="{{ $item->description_de }}"
                                                               class="ms-auto">
                                                                <svg class="icon-18 ms-1">
                                                                    <use xlink:href="#ic_info"></use>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="sub-rating-stars">
                                                            <!-- Leave Rating -->
                                                            <div class="clearfix"></div>
                                                            <div class="leave-rating">
                                                                <input type="radio" name="review[{{$item->id}}]" id="review-5-{{ $item->id }}"
                                                                       value="5" />
                                                                <label for="review-5-{{ $item->id }}">
                                                                    <svg class="icon-18">
                                                                        <use xlink:href="#ic_star"></use>
                                                                    </svg>
                                                                </label>
                                                                <input type="radio" name="review[{{$item->id}}]" id="review-4-{{ $item->id }}"
                                                                       value="4" />
                                                                <label for="review-4-{{ $item->id }}">
                                                                    <svg class="icon-18">
                                                                        <use xlink:href="#ic_star"></use>
                                                                    </svg>
                                                                </label>
                                                                <input type="radio" name="review[{{$item->id}}]" id="review-3-{{ $item->id }}"
                                                                       value="3" />
                                                                <label for="review-3-{{ $item->id }}">
                                                                    <svg class="icon-18">
                                                                        <use xlink:href="#ic_star"></use>
                                                                    </svg></label>
                                                                <input type="radio" name="review[{{$item->id}}]" id="review-2-{{ $item->id }}"
                                                                       value="2" />
                                                                <label for="review-2-{{ $item->id }}">
                                                                    <svg class="icon-18">
                                                                        <use xlink:href="#ic_star"></use>
                                                                    </svg></label>
                                                                <input type="radio" name="review[{{$item->id}}]" id="review-1-{{ $item->id }}"
                                                                       value="1" />
                                                                <label for="review-1-{{ $item->id }}">
                                                                    <svg class="icon-18">
                                                                        <use xlink:href="#ic_star"></use>
                                                                    </svg></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="col-sm-12">
                                        <div class="form-group mt-3">
                                            <label class="form-group mb-3">
                                                <input type="file" id="fileUpload"
                                                       class="position-absolute invisible custom-file-input cursor-pointer"
                                                       name="images[]" multiple="multiple">
                                                <span
                                                    class="rlrr_image_upload_btn gray-clr d-inline-flex align-items-center">
                                                    <svg class="icon me-2">
                                                        <use xlink:href="#ic_upload"></use>
                                                    </svg>
                                                    {{ __('Upload Photos') }}
                                                </span>
                                            </label>
                                            <div id="rlrr-rating-image-field" class="d-flex rlrr_img_list">
                                                <span>
{{--                                                    <img src="{{ asset('frontend/image/plc2.jpg') }}" alt="" class="imageThumb">--}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.review.firstname')</label>
                                            @auth()
                                                <br>
                                                {{auth()->user()->userdetails->firstname ?? ""}}
                                            @else
                                                <input type="text" class="form-control" name="firstname" id="firstname" value="{{ old('firstname',auth()->user()->userdetails->firstname ?? "") }}">
                                            @endauth
                                            @error('firstname')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.review.lastname')</label>
                                            @auth()
                                                <br>
                                                {{auth()->user()->userdetails->lastname ?? ""}}
                                            @else
                                                <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname',auth()->user()->userdetails->lastname ?? "") }}">
                                            @endauth
                                            @error('lastname')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.review.postcode')</label>
                                            @auth()
                                                {{auth()->user()->userdetails->postcode ?? ""}}
                                            @else
                                                <input type="text" name="postcode" class="form-control"
                                                       id="postcode"
                                                       value="{{ old('postcode',auth()->user()->userdetails->postcode ?? "") }}">
                                                @error('postcode')<small class="text-danger">{{ $message }}</small>@enderror
                                            @endauth
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.review.city')</label>
                                            @auth()
                                                <br>
                                                {{auth()->user()->userdetails->city ?? ""}}
                                            @else
                                                <input type="text" name="city" class="form-control"
                                                       id="city"
                                                       value="{{ old('city',auth()->user()->userdetails->city ?? "") }}">
                                                @error('city')<small class="text-danger">{{ $message }}</small>@enderror
                                            @endauth
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.review.email')</label>
                                            @auth()
                                                <br>
                                                {{auth()->user()->email ?? ""}}
                                            @else
                                                <input type="email" class="form-control email" name="email" id="email" value="{{ old('email',auth()->user()->email ?? "") }}">
                                            @endauth
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">@lang('labels.review.message')</label>
                                            <textarea class="form-control" name="review_message" id="review_message" rows="3" maxlength="10000" required="" data-gramm="false" wt-ignore-input="true">{{ old('review_message') }}</textarea>
                                            @error('review_message')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="term_condition"
                                                       id="terms2">
                                                <label class="form-check-label" for="terms2">
                                                    @lang('labels.general.term_&_condition_note_1')
                                                    <a href="/pages/datenschutzerklarung" target="_blank" class="text-underline theme-hover">@lang('labels.general.term_&_condition_note_2')</a>
                                                    @lang('labels.general.term_&_condition_note_3')
                                                    <a href="/pages/allgemeine-geschaftsbedingungen" target="_blank" class="text-underline theme-hover">@lang('labels.general.term_&_condition_note_4')</a>
                                                    @lang('labels.general.term_&_condition_note_5')
                                                </label>
                                                @error('term_condition')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-theme">{{ __('labels.review.submit_btn') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @include('frontend.includes.company.include.right')

        </div>
    </div>
@endsection
