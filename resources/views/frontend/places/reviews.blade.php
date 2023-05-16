@extends('frontend.layouts.legacy.app')

@section('title', __('labels.review.tab_title'))

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/review.css') }}"/>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 68px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }

        .prev-btn {
            position: absolute;
            top: 50%;
            color: #FFF;
            left: 3%;
        }

        .next-btn {
            position: absolute;
            top: 50%;
            color: #FFF;
            right: 3%;
        }
    </style>
    <script type="application/ld+json">
		{
		  "@context": "https://schema.org/",
		  "@type": "Review",
		  "itemReviewed": {
			"@type": "Place",
			"image": "{{ url('storage/' . $place->image_logo) }}",
			"name": "{{$place->place_name}}",
			"servesCuisine": "{{ $place->keyword }}",
			"priceRange": "$$$",
			"telephone": "{{$place->phone_1 }}",
			"address" :{
			  "@type": "PostalAddress",
			  "streetAddress": "{{$place->address}}",
			  "addressLocality": "{{$place->city}}",
			  {{-- "addressRegion": "NY", --}}
        "postalCode": "{{$place->postcode}}",
			  {{-- "addressCountry": "US" --}}
        }
      },
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "{{ $place->average_rating }}"
		  },
		  "name": "{{ $place->description_en }}",
		  {{-- "author": {
			"@type": "Person",
			"name": "{{ $place->claimed_user->name }}"
		  } ,
		  "publisher": {
			"@type": "Organization",
			"name": "Washington Times"
		  } --}}
        }

    </script>
@stop
@section('content')

    <div class="content">
        <div class="container1">
            @include('frontend.places.include.breadcrumb')
            <div class="row">
                <div class="col-md-12">
                    <div class="company-headerbar">
                        @php
                            $address_encode = urlencode($place->address);
                            $full_address_encoded = $address_encode . '%2C' . $place->postcode . '%20' . $place->city . '%2C' . 'Schweiz';
                        @endphp
                        @include('frontend.places.include.head')
                        <br>
                    </div>
                </div>

                <div class="col-md-8">

                    <div id="listing-overview" class="listing-section">
                        <div class="card mb-4">
                            <div class="card-header subtitle border-bottom pb-3 d-flex align-items-center">
                                <h5> @lang('labels.review.heading_title', ['company' => $place->company_name])</h5>
                            </div>
                            <div id="listing-reviews">
                                <!-- Rating Overview -->
                                <div class="rating-overview">
                                    <div class="rating-overview-box">
                                        <span class="rating-overview-box-total">{{ $place->average_rating }}</span>
                                        <span class="rating-overview-box-percent"> von 5.0</span>
                                        <div class="star-rating" data-rating="0">
                                            @for ($i = 1; $i <= round($place->average_rating); $i++)
                                                @if ($i <= $place->average_rating)
                                                    <span class="star"></span>
                                                @else
                                                    <span class="star half"></span>
                                                @endif
                                            @endfor
                                            @for ($j = $i; $j <= 5; $j++)
                                                <span class="star empty"></span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="rating-bars">
                                        @if (!$place->category->reviewcategorycriteria->isEmpty())
                                            @foreach ($place->category->reviewcategorycriteria as $reviewcategorycriteria)
                                                @php
                                                    $category_review = $reviewcategorycriteria->review_criteria->allreview->where('listing_id', $place->id)->where('listing_type','place')->sum('rating');
                                                    $total_review = $reviewcategorycriteria->review_criteria->allreview->where('listing_id', $place->id)->where('listing_type','place')->count() * 5;
                                                    $per = 0;
                                                    if ($total_review != 0) {
                                                        $per = (100 * $category_review) / $total_review;
                                                    }
                                                    $class = '';
                                                    if ($per < 33) {
                                                        $class = 'low';
                                                    } elseif ($per >= 33 && $per < 66) {
                                                        $class = 'mid';
                                                    } else {
                                                        $class = 'high';
                                                    }
                                                @endphp
                                                <div class="rating-bars-item">
                                                    <span class="rating-bars-name">
                                                        {{ $reviewcategorycriteria->review_criteria->title }}
                                                        <i class="help-circle" data-toggle="tooltip" title=""
                                                           data-original-title="{{ $reviewcategorycriteria->review_criteria->description }}"></i>
                                                    </span>
                                                    <span class="rating-bars-inner">
                                                        <span class="rating-bars-rating {{ $class }}"
                                                              data-rating="{{ $category_review }}">
                                                            <span class="rating-bars-rating-inner"
                                                                  style="width: {{ $per }}%;"></span>
                                                        </span>
                                                        <strong>{{ $category_review }}</strong>
                                                    </span>
                                                </div>
                                            @endforeach
                                        @else
                                            @php
                                                $reviewcategorycriteriaObj = App\Models\ReviewCategoryCriteria::where('category_id', 0)
                                                    ->where('listing_type', 'company')
                                                    ->get();
                                            @endphp
                                            @foreach ($reviewcategorycriteriaObj as $reviewcategorycriteria)
                                                @php
                                                    $category_review = $reviewcategorycriteria->review_criteria->allreview->where('listing_id', $place->id)->where('listing_type','place')->sum('rating');
                                                    $total_review = $reviewcategorycriteria->review_criteria->allreview->where('listing_id', $place->id)->where('listing_type','place')->count() * 5;
                                                    $per = 0;
                                                    if ($total_review != 0) {
                                                        $per = (100 * $category_review) / $total_review;
                                                    }
                                                    $class = '';
                                                    if ($per < 33) {
                                                        $class = 'low';
                                                    } elseif ($per >= 33 && $per < 66) {
                                                        $class = 'mid';
                                                    } else {
                                                        $class = 'high';
                                                    }
                                                @endphp
                                                <div class="rating-bars-item">
                                                    <span class="rating-bars-name">
                                                        {{ $reviewcategorycriteria->review_criteria->title }}
                                                        <i class="help-circle" data-toggle="tooltip" title=""
                                                           data-original-title="{{ $reviewcategorycriteria->review_criteria->description }}"></i>
                                                    </span>
                                                    <span class="rating-bars-inner">
                                                        <span class="rating-bars-rating {{ $class }}"
                                                              data-rating="{{ $category_review }}">
                                                            <span class="rating-bars-rating-inner"
                                                                  style="width: {{ $per }}%;"></span>
                                                        </span>
                                                        <strong>{{ $category_review }}</strong>
                                                    </span>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                                <!-- Rating Overview / End -->

                                <div class="clearfix"></div>
                                @php
                                    $listing_reviews = $place->PlaceReview->sortByDesc('id');
                                @endphp
                                @if (count($listing_reviews))
                                    @php
                                        $range = 4;
                                        $rows_per_page = 5;
                                        $query_result_row_count = count($listing_reviews);
                                        $page_count = (int) ceil($query_result_row_count / $rows_per_page);
                                        if (isset($_GET['review_page']) && is_numeric($_GET['review_page'])) {
                                            // cast var as int
                                            $currentpage = (int) $_GET['review_page'];
                                        } else {
                                            // default page num
                                            $currentpage = 1;
                                        }
                                        if ($currentpage > 1) {
                                            $limit_start = ($currentpage - 1) * $rows_per_page;
                                        } else {
                                            $limit_start = 0;
                                        }

                                        $listing_reviews_shown = array_slice($listing_reviews->toArray(), $limit_start, $rows_per_page, TRUE);
                                    @endphp

                                            <!-- Reviews -->
                                    <section class="comments ">
                                        <ul class="mb-0 listing-reviews">
                                            @foreach ($listing_reviews_shown as $key_id => $listing_review)
                                                <li>
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">
                                                            <div class="avatar">
                                                                @if ($listing_review['user_id'] != "")
                                                                    <img src="{{ url('storage/' . $listing_reviews[$key_id]->User->avatar_location) }}?d=mm&amp;s=70"
                                                                         alt="{{ ucfirst($listing_reviews[$key_id]->User->name) }}"/>
                                                                @else
                                                                    <img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                                                                         alt=""/>
                                                                @endif
                                                            </div>
                                                            <div class="comment-content">
                                                                <div class="arrow-comment"></div>
                                                                <div class="comment-by">
                                                                    <span class="person-name text-capitalize">
																		@if ($listing_review['user_id'] != "")
                                                                            {{ $listing_reviews[$key_id]->User->name }}
                                                                        @else
                                                                            {{ $listing_review['firstname'] . ' ' . $listing_review['lastname'] }}
                                                                        @endif
																	</span>
                                                                    <i class="help-circle" data-toggle="tooltip"
                                                                       title="{{ __('labels.review.person_left_review') }}"></i>
                                                                    <div class="date d-flex">
                                                                        @if ($listing_review['user_id'] != "")
                                                                            <span>{{ $listing_reviews[$key_id]->User->userdetails->postcode }}</span>
                                                                            &nbsp;
                                                                            <span>{{ $listing_reviews[$key_id]->User->userdetails->city }}</span>
                                                                            &nbsp;
                                                                        @else
                                                                            <span>{{ !empty($listing_review['postcode']) ? $listing_review['postcode'] . ' ' : '' }}</span>
                                                                            &nbsp;
                                                                            <span>{{ !empty($listing_review['city']) ? $listing_review['city'] . ' ' : '' }}</span>
                                                                        @endif
                                                                        <span class="mx-2 text-secondary"
                                                                              style="opacity: 0.6">|</span>
                                                                        <span>{{ !empty($listing_review['created_at']) ? '' . date_format(date_create($listing_review['created_at']), 'd.m.Y') : '' }}</span>
                                                                    </div>
                                                                    @php
                                                                        $average_rating = 0;
                                                                        if (!empty($listing_review['review_rating'])) {
                                                                            $average_rating = array_sum(array_column($listing_review['review_rating'], 'rating')) / count($listing_review['review_rating']);
                                                                        }
                                                                    @endphp
                                                                    <div class="star-rating" data-rating="0">
                                                                        @for ($i = 1; $i <= round($average_rating); $i++)
                                                                            @if ($i <= $average_rating)
                                                                                <span class="star"></span>
                                                                            @else
                                                                                <span class="star half"></span>
                                                                            @endif
                                                                        @endfor
                                                                        @for ($j = $i; $j <= 5; $j++)
                                                                            <span class="star empty"></span>
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                                <p><?php echo $listing_review[ 'review' ]; ?></p>
                                                                @if (!empty($listing_review['image']))
                                                                    @if (Storage::disk('public')->exists($listing_review['image']))
                                                                        <br>
                                                                        <img alt="no data"
                                                                             src="{{ url('storage/' . $listing_review['image']) }}"
                                                                             class='myImg {{ 'img_' . $key_id }}'
                                                                             height="80px" width="80px">
                                                                    @endif
                                                                @endif

                                                                @if($listing_reviews[$key_id]->ReviewReply)

                                                                    <div class="col-md-12 mt-3">
                                                                        <div class="form-group row">
                                                                            <label class="control-label col-md-2">
                                                                                @if ($listing_reviews[$key_id]->place->image_logo != "")
                                                                                    <img class="rounded-circle"
                                                                                         src="{{ url('storage/' . $listing_reviews[$key_id]->place->image_logo) }}"
                                                                                         alt="{{ ucfirst($listing_reviews[$key_id]->place->place_name) }}"
                                                                                         height="70px" width="auto"/>
                                                                                @else
                                                                                    <img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                                                                                         alt=""/>
                                                                                @endif
                                                                            </label>
                                                                            <label class="control-label col-md-10 small">{{$listing_reviews[$key_id]->ReviewReply->replay_message}}</label><br>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div>
                                            @include('frontend.includes.place_pagination')
                                        </div>
                                    </section>
                                @else
                                    <section>
                                        <h4>&nbsp;&nbsp;@lang('labels.review.review_caption')</h4>
                                    </section>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">

                            <form id="add-comment" action="{{ route('frontend.places.store_reviews', $place) }}"
                                  class="add-comment needs-validation form-custom-responsive" method="post"
                                  enctype="multipart/form-data" novalidate="">
                                @csrf
                                <!-- Add Review Box -->
                                <div id="add-review" class="">
                                    <!-- Add Review -->
                                    <div class="card-header subtitle border-bottom pb-3 mx-0 pt-0">
                                        <h5 class="pb-1"> @lang('labels.review.submit_btn')</h5>
                                        <p class="comment-notes mb-0"> @lang('labels.review.email_warning')</p>
                                    </div>

                                    <!-- Subratings Container -->

                                    <div class="sub-ratings-container ">
                                        <div class="row">
                                            @if (!$place->category->reviewcategorycriteria->isEmpty())
                                                @foreach ($place->category->reviewcategorycriteria as $reviewcategorycriteria)
                                                    <!-- Subrating -->
                                                    <div class="col-6">

                                                        <div class="add-sub-rating d-flex">
                                                            <!-- <img src="/assets/images/recommend.svg" class="sub-rating-icon" height="36" width="36"/> -->
                                                            <div class="">
                                                                <div class="sub-rating-title">
                                                                    {{ $reviewcategorycriteria->review_criteria->title }}
                                                                    <i class="help-circle" data-toggle="tooltip"
                                                                       title=""
                                                                       data-original-title="Wie war die Bedienung, das Personal gegenüber dir als Kunde?"></i>
                                                                </div>
                                                                <div class="sub-rating-stars">
                                                                    <!-- Leave Rating -->
                                                                    <div class="clearfix"></div>

                                                                    <div class="leave-rating">
                                                                        <input type="radio"
                                                                               required
                                                                               name="review[{{ $reviewcategorycriteria->review_criteria->id }}]"
                                                                               id="rating-{{ $reviewcategorycriteria->review_criteria->id }}-5"
                                                                               value="5">
                                                                        <label
                                                                                for="rating-{{ $reviewcategorycriteria->review_criteria->id }}-5"
                                                                                class="fa fa-star"></label>
                                                                        <input type="radio"
                                                                               required
                                                                               name="review[{{ $reviewcategorycriteria->review_criteria->id }}]"
                                                                               id="rating-{{ $reviewcategorycriteria->review_criteria->id }}-4"
                                                                               value="4">
                                                                        <label
                                                                                for="rating-{{ $reviewcategorycriteria->review_criteria->id }}-4"
                                                                                class="fa fa-star"></label>
                                                                        <input type="radio"
                                                                               required
                                                                               name="review[{{ $reviewcategorycriteria->review_criteria->id }}]"
                                                                               id="rating-{{ $reviewcategorycriteria->review_criteria->id }}-3"
                                                                               value="3">
                                                                        <label
                                                                                for="rating-{{ $reviewcategorycriteria->review_criteria->id }}-3"
                                                                                class="fa fa-star"></label>
                                                                        <input type="radio"
                                                                               required
                                                                               name="review[{{ $reviewcategorycriteria->review_criteria->id }}]"
                                                                               id="rating-{{ $reviewcategorycriteria->review_criteria->id }}-2"
                                                                               value="2">
                                                                        <label
                                                                                for="rating-{{ $reviewcategorycriteria->review_criteria->id }}-2"
                                                                                class="fa fa-star"></label>
                                                                        <input type="radio"
                                                                               required
                                                                               name="review[{{ $reviewcategorycriteria->review_criteria->id }}]"
                                                                               id="rating-{{ $reviewcategorycriteria->review_criteria->id }}-1"
                                                                               value="1">
                                                                        <label
                                                                                for="rating-{{ $reviewcategorycriteria->review_criteria->id }}-1"
                                                                                class="fa fa-star"></label>
                                                                    </div>
                                                                    <span for="review[{{ $reviewcategorycriteria->review_criteria->id }}]"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                @php
                                                    $reviewcategorycriteriaObj = App\Models\ReviewCategoryCriteria::where('category_id', 0)
                                                        ->where('listing_type', 'company')
                                                        ->get();
                                                @endphp
                                                @foreach ($reviewcategorycriteriaObj as $reviewcategorycriteria)
                                                    <!-- Subrating -->
                                                    <div class="col-6">

                                                        <div class="add-sub-rating d-flex">
                                                            <!-- <img src="/assets/images/recommend.svg" class="sub-rating-icon" height="36" width="36"/> -->
                                                            <div class="">
                                                                <div class="sub-rating-title">
                                                                    {{ $reviewcategorycriteria->review_criteria->title }}
                                                                    <i class="help-circle" data-toggle="tooltip"
                                                                       title=""
                                                                       data-original-title="Wie war die Bedienung, das Personal gegenüber dir als Kunde?"></i>
                                                                </div>
                                                                <div class="sub-rating-stars">
                                                                    <!-- Leave Rating -->
                                                                    <div class="clearfix"></div>

                                                                    <div class="leave-rating">
                                                                        <input type="radio"
                                                                               name="review[{{ $reviewcategorycriteria->review_criteria->id }}]"
                                                                               id="rating-{{ $reviewcategorycriteria->review_criteria->id }}-5"
                                                                               value="5">
                                                                        <label
                                                                                for="rating-{{ $reviewcategorycriteria->review_criteria->id }}-5"
                                                                                class="fa fa-star"></label>
                                                                        <input type="radio"
                                                                               name="review[{{ $reviewcategorycriteria->review_criteria->id }}]"
                                                                               id="rating-{{ $reviewcategorycriteria->review_criteria->id }}-4"
                                                                               value="4">
                                                                        <label
                                                                                for="rating-{{ $reviewcategorycriteria->review_criteria->id }}-4"
                                                                                class="fa fa-star"></label>
                                                                        <input type="radio"
                                                                               name="review[{{ $reviewcategorycriteria->review_criteria->id }}]"
                                                                               id="rating-{{ $reviewcategorycriteria->review_criteria->id }}-3"
                                                                               value="3">
                                                                        <label
                                                                                for="rating-{{ $reviewcategorycriteria->review_criteria->id }}-3"
                                                                                class="fa fa-star"></label>
                                                                        <input type="radio"
                                                                               name="review[{{ $reviewcategorycriteria->review_criteria->id }}]"
                                                                               id="rating-{{ $reviewcategorycriteria->review_criteria->id }}-2"
                                                                               value="2">
                                                                        <label
                                                                                for="rating-{{ $reviewcategorycriteria->review_criteria->id }}-2"
                                                                                class="fa fa-star"></label>
                                                                        <input type="radio"
                                                                               name="review[{{ $reviewcategorycriteria->review_criteria->id }}]"
                                                                               id="rating-{{ $reviewcategorycriteria->review_criteria->id }}-1"
                                                                               value="1">
                                                                        <label
                                                                                for="rating-{{ $reviewcategorycriteria->review_criteria->id }}-1"
                                                                                class="fa fa-star"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- Subratings Container -->

                                    <!-- Review Form -->

                                    <fieldset>
                                        @if (!$logged_in_user)
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <!-- <label for="firstname"> Vorname</label> -->
                                                        <label for="firstname"
                                                               class="col-form-label">@lang('labels.review.firstname')</label>
                                                        <div class="input-group">
                                                            <input type="text" id="firstname" name="firstname"
                                                                   class="form-control"
                                                                   value="{{ old('firstname', $logged_in_user->userdetails->firstname ?? '') }}"
                                                                   required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <!-- <label for="last_name"> Nachname</label> -->
                                                        <label for="lastname"
                                                               class="col-form-label">@lang('labels.review.lastname')</label>
                                                        <div class="input-group">
                                                            <input type="text" id="lastname" name="lastname"
                                                                   class="form-control"
                                                                   value="{{ old('lastname', $logged_in_user->userdetails->lastname ?? '') }}"
                                                                   required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <!-- <label for="postcode"> PLZ</label> -->
                                                        <label for="postcode"
                                                               class="col-form-label">@lang('labels.review.your_age')</label>
                                                        <div class="input-group">
                                                            <input type="number" id="age" name="age"
                                                                   class="form-control"
                                                                   value=""
                                                                   required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <!-- <label for="city"> Ort</label> -->
                                                        <label for="city"
                                                               class="col-form-label">@lang('labels.review.city')</label>
                                                        <div class="input-group">
                                                            <input type="text" id="city" name="city"
                                                                   class="form-control"
                                                                   value="{{ old('city', $logged_in_user->userdetails->city ?? '') }}"
                                                                   required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <!-- <label for="email"> E-Mail</label> -->
                                                        <label for="email"
                                                               class="col-form-label">@lang('labels.review.email')</label>
                                                        <div class="input-group">
                                                            <input type="text" id="email" name="email"
                                                                   class="form-control error"
                                                                   value="{{ old('email', $logged_in_user->email ?? '') }}"
                                                                   required="">
                                                            <div data-lastpass-icon-root="true"
                                                                 style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-2">
                                                    @if (!empty($logged_in_user->avatar_location))
                                                        <img class="rounded-circle1 header-profile-user1" width="100px"
                                                             src="{{ url('storage/' . $logged_in_user->avatar_location) }}"
                                                             alt="{{ ucfirst(Auth::user()->userdetails->firstname) . ' ' . ucfirst(Auth::user()->userdetails->lastname) }}">
                                                    @else
                                                        <img class="rounded-circle1 header-profile-user1" width="100px"
                                                             src="{{ asset(Auth::user()->avatar) }}"
                                                             alt="{{ $logged_in_user->name }}">
                                                    @endif
                                                </div>
                                                <div class="col-md-8">
                                                    <span><strong>{{ ucfirst(Auth::user()->userdetails->firstname) . ' ' . ucfirst(Auth::user()->userdetails->lastname) }}</strong></span>
                                                    <br>
                                                    <span>{{ $logged_in_user->email }}</span>
                                                    @if($logged_in_user->email_verified_at !="")
                                                        &nbsp;<i class="fa fa-check-circle"
                                                                 style="color: GREEN; font-size: 18px !important"
                                                                 data-toggle="tooltip" title=""></i>
                                                    @else
                                                        &nbsp;<i class="fa fa-times-circle"
                                                                 style="color: RED; font-size: 18px !important"
                                                                 data-toggle="tooltip" title=""></i>
                                                    @endif
                                                    <br>
                                                    <span>@lang('labels.review.identified')</span>
                                                    @if($logged_in_user->id_image_approve == 1)
                                                        &nbsp;&nbsp;&nbsp;<i class="fa fa-check-circle"
                                                                             style="color: GREEN; font-size: 18px !important"
                                                                             data-toggle="tooltip" title=""></i>
                                                    @else
                                                        &nbsp;&nbsp;&nbsp;<i class="fa fa-times-circle"
                                                                             style="color: RED; font-size: 18px !important"
                                                                             data-toggle="tooltip" title=""></i>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                        <br>
                                        <span class="col-form-label">@lang('labels.review.when_were_you_in_this_place')</span>
                                        <div class="row">
                                            <div class="col">

                                                <div class="form-group">
                                                    <!-- <label for="postcode"> PLZ</label> -->
                                                    <label for="postcode"
                                                           class="col-form-label">@lang('labels.review.of')</label>
                                                    <div class="input-group">
                                                        <input type="date" id="start_date_of" name="start_date_of"
                                                               class="form-control"
                                                               required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <!-- <label for="city"> Ort</label> -->
                                                    <label for="city"
                                                           class="col-form-label">@lang('labels.review.until')</label>
                                                    <div class="input-group">
                                                        <input type="date" id="until_date" name="until_date"
                                                               class="form-control"
                                                               required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="review_message"
                                                           class="col-form-label">@lang('labels.review.how did you like it there')</label>
                                                    <textarea class="form-control" name="review_message"
                                                              id="review_message" rows="3" maxlength="10000"
                                                              required="">{{ old('review_message') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>


                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="image"
                                                       class="col-form-label">@lang('labels.review.upload_image')</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input cursor-pointer"
                                                           name="image" id="image" accept="image/*">
                                                    <label class="custom-file-label"
                                                           for="image">@lang('labels.review.upload_image')</label>
                                                    <div class="invalid-feedback">@lang('labels.review.upload_image_w')</div>
                                                </div>
                                                <img id="bild1" src="#" alt="    Bild hochladen"
                                                     style="display:none;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="term_condition" name="term_condition" required="true"
                                                            {{ old('term_condition') ? 'checked' : '' }}>
                                                    <!-- <label class="custom-control-label" for="agb">
                                                                                            Ich habe die <a href="https://lookon.ch/pages/datenschutzerklarung" target="_blank">Datenschutzbedingungen</a> und die <a href="https://lookon.ch/pages/allgemeine-geschaftsbedingungen" target="_blank">AGB</a> gelesen und bin damit einverstanden. </label> -->
                                                    <label class="custom-control-label" for="term_condition">
                                                        @lang('labels.review.term_&_condition_note') <a
                                                                href="https://lookon.ch/pages/datenschutzerklarung"
                                                                target="_blank"></a> <a
                                                                href="https://lookon.ch/pages/allgemeine-geschaftsbedingungen"
                                                                target="_blank"></a> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul type="none" class="errorMessages"></ul>
                                    <input type="hidden" name="submit" value="submit">
                                    <button class="button d-flex align-items-center justify-content-center"
                                            style="    background-color: #007bff; ">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-award mr-2">
                                            <circle cx="12" cy="8" r="7"></circle>
                                            <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                        </svg>
                                        <span>@lang('labels.review.submit_btn')</span>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
                <div class="col-md-4">
                    @include('frontend.places.include.right')
                </div>


            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content " style="max-width: 600px;" id="img01">
        <div id="caption"></div>
    </div>
@stop
@section('script')

    <script>
        var createAllErrors = function () {
            var form = $(this),
                errorList = $("ul.errorMessages", form);

            var showAllErrorMessages = function () {
                errorList.empty();

                // Find all invalid fields within the form.
                var invalidFields = form.find(":invalid").each(function (index, node) {

                    // Find the field's corresponding label
                    var label = $("label[for=" + node.id + "] "),
                        // Opera incorrectly does not fill the validationMessage property.
                        message = node.validationMessage || 'Invalid value.';

                    errorList
                        .show()
                        // .append( "<li><span>" + label.html() + "</span> " + message + "</li>" );
                        .html("<li style='color:#dc3545'><span>Error:</span> Please select start and enter comment</li>");
                });
            };

            // Support Safari
            form.on("submit", function (event) {
                if (this.checkValidity && !this.checkValidity()) {
                    $(this).find(":invalid").first().focus();
                    event.preventDefault();
                }
            });

            $("input[type=submit], button:not([type=button])", form)
                .on("click", showAllErrorMessages);

            $("input", form).on("keypress", function (event) {
                var type = $(this).attr("type");
                if (/date|email|month|number|search|tel|text|time|url|week/.test(type)
                    && event.keyCode == 13) {
                    showAllErrorMessages();
                }
            });
        };

        $("form").each(createAllErrors);
    </script>

    <!-- Validation von Feldern -->
    <script type="text/javascript">
        $(".myImg").click(function () {
            var myImg = $(this).attr('src');
            var key_id = $(this).attr('key');
            $("#img01").attr('src', myImg)
            $("#key_id").val(key_id)
            $("#myModal").show();
        });

        $('.close').click(function () {
            $("#myModal").hide();
        });

        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Hol alle Element mit dem Elternklasse needs-validation
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <!-- Infos bei den Feldern -->
    <script type="text/javascript">
        $(".test").click(function () {
            $(".explanation").toggle();
        });
    </script>
    <!-- /Review Form -->
    <script>
        $(document).ready(function () {
            $("#share").click(function () {
                $("#share_div").toggle();
            })

            $('input[name="private_person"]').change(function () {
                if ($(this).val() == 0) {
                    $(".company_name").css('display', 'block')
                } else {
                    $(".company_name").css('display', 'none')
                }
            });
        });
    </script>
@stop
