@extends('frontend.pages.company')

@section('title', __('labels.company.information_tab_title'))

@section('tabcontent')
    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="about-tab">
        <div class="row">
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="rest-detail-head">
                            <h2 class="d-flex mb-3 align-items-center body-font">
                                {{ $company->company_name }}
                            </h2>
                        </div>
                        <div class="list-desc">
                            <p>{!! htmlspecialchars_decode($company->text->content??'') !!}<p>
                        </div>
                    </div>
                </div>
                <!-- description end -->

                <!-- Here should come if gallery is not empty -->
                {{-- @if ($company->companytabs->show_gallery) --}}
                    <div class="card mb-4">
                        <div class="card-header bg-white">
                            <h5 class="s-font mb-0 ">
                                {{ __('Photos') }}
                            </h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="gallerySlider car-slider">
                                <div class="slider-for slider-single">
                                    @foreach($company->galleries as $gallery)
                                        <div>
                                            @if($gallery->show_on_frontside == 1)
                                            <img class="item-slick" src="{{ asset('storage') }}/{{ $gallery->image }}">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <div class="slider-nav">
                                    @foreach($company->galleries as $gallery)
                                        <div>
                                        @if($gallery->show_on_frontside == 1)
                                            <img class="item-slick"
                                                 src="{{ url('storage/' . $gallery->image) }}"
                                                 alt="Alt"
                                                 onclick="currentSlide(0)">
                                        @endif
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                {{-- @endif --}}


                <!-- Tags -->
                @if ($company->tags)
                    <div class="card mb-4 mt-4">
                        <div class="card-header bg-white">
                            <h5 class="s-font mb-0">
                                {{ __('labels.company.tags') }}
                            </h5>
                        </div>
                        <div class="card-body pt-0">
                            <ul class="outlined-list details-list tags-nav list-unstyled d-flex flex-wrap mb-0">
                                @foreach ($company->tags as $item)
                                    @if (!empty($item->tag->image))
                                    @if (Storage::disk('public')->exists('tags_image/'.$item->tag->image))
{{--                                        {{ $item->tag->value }}--}}
                                            <img alt="no data" src="{{ asset('storage/tags_image/' . $item->tag->image) }}" class='rounded-circle' height="30px" title="{{ $item->tag->value }}">
                                        @else
                                            <img src="https://via.placeholder.com/110/cbe2f3/00c8fa"
                                                 class="rounded-circle" height="30px">
                                        @endif
                                    @else
                                        <img src="https://via.placeholder.com/110/cbe2f3/00c8fa"
                                             class="rounded-circle" height="30px">
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if($company->youtube_video)
                {{-- @if (!empty($company->socialmedia) && $company->socialmedia->youtube_video != '') --}}
                    <div class="card mb-4">
                        <div class="card-header bg-white">
                            <h5 class="s-font mb-0">
                                Youtube Videos
                            </h5>
                        </div>
                        <div class="card-body pt-0">
                            <div id="listing-video" class="listing-section">
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ str_replace('watch?v=', 'embed/', $company->youtube_video) }}"
                                            width="100%"
                                            height="250px"
                                            allowfullscreen="true">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                 @endif

            </div>

            @include('frontend.includes.company.include.right')

        </div>
    </div>
@endsection

