@extends('frontend.pages.company')

@section('title', __('labels.company.gallery_tab_title'))

@section('tabcontent')
    {{--    {{ dd($company->galleries) }}--}}
    <div class="tab-pane-defeated" id="galerie" role="tabpanel" aria-labelledby="galerie-tab">
        <div class="row">
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-header bg-white pb-0">
                        <h4 class="s-font mb-0">
                            {{ __('labels.company.galerie') }}
                        </h4>
                    </div>
                    <div class="card-body px-2">
                        <h5 class="xs-font gray-clr card-subtitle">{{__('labels.company.photos_by_lookon')}}</h5>
                        <ul class="list-unstyled gallery-photos mb-4 lookon-gallery">
                            @foreach($company->galleries as $gallery)
                                <li><a class="gallery-item lookon-item" data-fancybox="gallery" href="{{ asset('storage') }}/{{ $gallery->image }}"><img src="{{ asset('storage') }}/{{ $gallery->image }}" alt="{{ asset('storage') }}/{{ $gallery->image }}" class="radius-10"></a></li>
                            @endforeach
                        </ul>
                        <!-- photos by user -->
                        <h5 class="xs-font gray-clr card-subtitle">{{ __('labels.company.from_users') }}</h5>
                        <ul class="list-unstyled gallery-photos mb-0 user-gallery ">
                            @foreach($company->CompanyReview as $review)
                                @if(!empty($review->image))
                                    @foreach(json_decode($review->image) as $image)
                                        <li><a class="gallery-item user-item" data-fancybox="gallery" href="{{ asset('storage') }}/{{ $image }}"><img src="{{ asset('storage') }}/{{ $image }}" alt="company1" class="radius-10"></a></li>
                                    @endforeach
                                @endif
                            @endforeach
                            {{--                            <li><a class="gallery-item user-item" data-fancybox="gallery" href="img/cmp1.jpg"><img src="img/cmp1.jpg" alt="company1" class="radius-10"></a></li>--}}
                            {{--                            <li><a class="gallery-item user-item" data-fancybox="gallery" href="img/cmp2.jpg"><img src="img/cmp2.jpg" alt="company2" class="radius-10"></a></li>--}}
                            {{--                            <li><a class="gallery-item user-item" data-fancybox="gallery" href="img/cmp3.jpg"><img src="img/cmp3.jpg" alt="company3" class="radius-10"></a></li>--}}
                            {{--                            <li><a class="gallery-item user-item" data-fancybox="gallery" href="img/cmp4.jpg"><img src="img/cmp4.jpg" alt="company4" class="radius-10"></a></li>--}}
                            {{--                            <li><a class="gallery-item user-item" data-fancybox="gallery" href="img/cmp1.jpg"><img src="img/cmp1.jpg" alt="company5" class="radius-10"></a></li>--}}
                            {{--                            <li><a class="gallery-item user-item" data-fancybox="gallery" href="img/cmp2.jpg"><img src="img/cmp2.jpg" alt="company6" class="radius-10"><span class="font-17 text-white item-more">+5 More</span></a></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            @include('frontend.includes.company.include.right')
        </div>
    </div>
@endsection
