@extends('frontend.pages.company')

@section('title', __('labels.company.news_tab_title'))

@section('tabcontent')


        <section class="news-detail section-padding">
            <div class="container-fluid container-xl">
                <div class="">
                    <div class="col-md-8">
                        <h1 class="font-28 font-semibold mb-3">{{ $news->title }}</h1>
                        <div class="mb-4 d-flex text-uppercase font-13 fw-500 gray-clr">
              <span class="d-flex align-items-center me-3">
                <svg class="icon-18 me-1">
                  <use xlink:href="#ic_person"></use>
                </svg>{{ $news->author }}
              </span>
                            <span class="d-flex align-items-center">
                <svg class="icon-18 me-1">
                  <use xlink:href="#ic_calender"></use>
                </svg>{{ $news->published_at->format('d.m.Y') }}
              </span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <img src="{{ url('storage/' . $news->image) }}" alt="" class="img-fluid radius-6 mb-4">
                        <div class="blog-detail">
                            <p>{!! $news->description !!}</p>
                        </div>
                    </div>

                    @php
                        $latestNews = $news->latest()->take(5)->get();
                        $moreNews = $news->inRandomOrder()
                                          ->limit(4)
                                          ->get();

          @endphp

        <div class="col-md-4">
          <h2 class="md-font mb-3 topnews-title">Latest News</h2>
          @foreach ($latestNews as $lnews)
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-4">
                  <a href="{{ route('frontend.company.news_detail',[$company,$lnews['id'],$company->slug]) }}">
                  <img src="{{ url('storage/' . $lnews->image) }}" class="img-fluid rounded-start h-100 article-thumb" alt="...">
                </a>
                </div>
                <div class="col-8">
                  <div class="card-body p-3">
                    <a href="{{ route('frontend.company.news_detail',[$company,$lnews['id'],$company->slug]) }}">
                    <h5 class="card-title truncate-2 body-font">{{ $lnews->title }}</h5>
                  </a>
                    <div class="d-flex text-uppercase font-13 fw-500 gray-clr">
                      <span class="d-flex align-items-center">
                        <svg class="icon-18 me-1">
                          <use xlink:href="#ic_calender"></use>
                        </svg>{{ date("M-d,Y", strtotime($lnews->published_at)) }}
                      </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
        <!-- relevant news-->
        <section>
            <div class="container-fluid container-xl">
                <div class="row justify-content-center mb-4">
                    <div class="col-md-12">
                        <h2 class="lg-font font-semibold mb-4">{{ __('labels.company.more_news_article') }}</h2>
                        <div class="row">
                            @foreach ($moreNews as $mNews)
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                                    <div class="lo-card news-card">
                                        <div class="lo-card-body card">
                                            <div class="top-card position-relative">
                                                <a href="{{ route('frontend.company.news_detail',[$company,$mNews['id'],$company->slug]) }}">
                                                    <img src="{{ url('storage/' . $mNews->image) }}" class="card-img-top" alt="...">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between lo-head">
                                                    <a href="{{ route('frontend.company.news_detail',[$company,$mNews['id'],$company->slug]) }}">
                                                        <h5 class="lo-name body-font font-bold mb-1">{{ $mNews->title }}</h5>
                                                    </a>
                                                </div>  
                                                <div class="news-item-text d-flex flex-column">
                                                    <div class="dates d-flex xs-font mb-2 pb-1">
                                                        <span class="date">{{ date("d.m.Y", strtotime($mNews->published_at)) }} &nbsp;</span>
                                                    </div>
                                                    <div class="news-item-descr big-news">
                                                        <p>{!! $mNews->description !!}</p>
                                                    </div>
                                                    <div class="news-item-bottom mt-auto d-flex justify-content-between">
                                                        <a href="{{ route('frontend.company.news_detail',[$company,$mNews['id'],$company->slug]) }}" class="news-link theme-clr xs-font text-uppercase font-medium view-all mb-0">{{ __('Read more') }}</a>
                                                        <div class="admin gray-clr">
                                                            <p class="font-14 mb-0">{{ $mNews->author }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card body end -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!--col-end-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
  

@stop

