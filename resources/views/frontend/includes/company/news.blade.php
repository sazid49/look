@extends('frontend.pages.company')

@section('title', __('labels.company.news_tab_title'))

@section('tabcontent')

    <div class="tab-pane-defeated" id="news" role="tabpanel" aria-labelledby="news-tab"><div class="tab-pane-defeated" id="news" role="tabpanel" aria-labelledby="news-tab">
            <div class="row">
                <div class="col-md-7">
                    <div class="card-header bg-white pb-20 px-0 pt-0">
                        <h4 class="s-font mb-0">
                            News
                        </h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="card-body position-relative p-0">
                        <div class="col-12">
                            <div class="row">
                                @if (!empty($company->news))
                                    @foreach ($company->news as $key => $news)
                                        @if ($news->published_at <= now())
                                            <div class="col-md-6 col-lg-6 col-xl-6 mb-4">
                                                <div class="lo-card news-card">
                                                    <div class="lo-card-body card">
                                                        <div class="top-card position-relative">
                                                            <a href="{{ route('frontend.company.news_detail',[$company,$news['id'],$company->slug]) }}" target="_self">
                                                                <img src="{{ url('storage/' . $news->image) }}" class="card-img-top" alt="{{ $news->title }}">
                                                            </a>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between lo-head">
                                                                <a href="{{ route('frontend.company.news_detail',[$company,$news['id'],$company->slug]) }}" target="_self">
                                                                    <h5 class="lo-name body-font font-bold mb-1">{{ $news->title }}</h5>
                                                                </a>
                                                            </div>
                                                            <div class="news-item-text d-flex flex-column">
                                                                <div class="dates d-flex xs-font mb-2 pb-1">
                                                                    <span class="date">{{ date("d.m.Y", strtotime($news->published_at)) }} &nbsp;</span>
                                                                </div>
                                                                <div class="news-item-descr big-news mb-3">
                                                                    <p><?php $story_desc = substr ( $news->description, 0, 150 );
                                                                           $story_desc = substr ( $story_desc, 0, strrpos ( $story_desc, ' ' ) );
                                                                           echo strip_tags ( htmlspecialchars_decode ( $story_desc ) ) . '...'; ?></p>
                                                                </div>
                                                                <div class="news-item-bottom mt-auto d-flex justify-content-between">
                                                                    <a href="{{ route('frontend.company.news_detail',[$company,$news['id'],$company->slug]) }}" 
                                                                    target="_self" class="news-link theme-clr xs-font text-uppercase font-medium view-all mb-0">{{__('labels.general.read_more')}}</a>
                                                                    <div class="admin gray-clr">
                                                                        <p class="font-14 mb-0">{{ $news->author }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- card body end -->
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @include('frontend.includes.company.include.right')
            </div>
        </div>

@endsection
