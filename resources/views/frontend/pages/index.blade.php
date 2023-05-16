@extends('frontend.layouts.master')


@section('title', $cms->title)

@section('meta_description', $cms->description)

@section('style')
@stop

@section('content')

    {{-- <div class="container">
        <div class="row sticky-wrapper mt-4">
            <div class="col-md-8">


                <div id="listing-overview" class=" card mb-4">
                    <div class="card-header subtitle border-bottom pb-3 d-flex align-items-center">
                        <h5>{{ $cms->title }}</h5>
                    </div>

                    <div class=" card-body">
                        {!! $cms->content !!}
                    </div>
                </div>

            </div>


            <div class="col-lg-4 col-md-4 margin-top-0 sticky">
                <div class="card mb-4">
                    <div class="card-header subtitle border-bottom pb-3 d-flex align-items-center">
                        <h5> Deine Vorteile</h5>
                    </div>


                    <div class="boxed-widget booking-widget margin-top-0 card-body">
                        <ul class="liste-okey form-sidebar-list pl-0 list-unstyled mb-0 offer-sidelist">
                            <li>Bewertungen abgeben</li>
                            <li>Massgeschneiderte Offerten einholen</li>
                            <li>Auf verschiedene Unternehmen bewerben</li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-4" style="padding-top:5%;">

                    <div class="card-header subtitle border-bottom pb-3 d-flex align-items-center">
                        <h5> Deine Vorteile</h5>
                    </div>

                    <div class="boxed-widget booking-widget margin-top-0 card-body">
                        <form method="GET" action="/registration">

                            <input type="hidden" name="sidebarform" id="sidebarform" value="1">

                            <div class="row">
                                <div class="col col-md-12 col-sm-12">
                                    <div class="form-group" id="company_name">
                                        <label for="company_name">Unternehmen / Organisation / Verein</label>
                                        <input type="text" name="company_name" value=""
                                               pattern="^[_A-zöäüàéèÖÄÜ0-9]*((-|\s)*[_A-zöäüàéèÖÄÜ0-9])*$"
                                               class="form-control"
                                               id="company_name" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="company_contactformular_postcode"><span
                                                    class="bt_bb_required">PLZ</span>
                                        </label>
                                        <input type="number" name="company_contactformular_postcode" value=""
                                               class="form-control" id="company_contactformular_postcode" required="">
                                        <div class="invalid-feedback">Bitte PLZ eingeben</div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-12 col-sm-12">

                                    <div class="form-group">
                                        <label for="company_contactformular_city"><span
                                                    class="bt_bb_required">Ort</span>
                                        </label>
                                        <input type="text" name="company_contactformular_city" value=""
                                               pattern="^[_A-zöäüàéèÖÄÜ]*((-|\s)*[_A-zöäüàéèÖÄÜ])*$"
                                               class="form-control"
                                               id="company_contactformular_city" required="">
                                        <div class="invalid-feedback">Bitte den Wohnort eingeben</div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-12 col-sm-12">

                                    <div class="form-group">
                                        <label for="email">
                                            <span class="bt_bb_required">E-Mail</span>
                                        </label>
                                        <input type="text" name="email" value="" class="form-control"
                                               id="email" required="">
                                        <div class="invalid-feedback">Bitte korrekte E-Mail eingeben</div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="phone">Telefon</label>
                                        <input type="number" name="phone" value="" class="form-control"
                                               id="phone">

                                    </div>

                                </div>
                            </div>
                            <button id="btn-register" type="submit"
                                    class="button book-now fullwidth margin-top-5 d-flex justify-content-center align-items-center"
                                    data-loading-text="    Absenden">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-send mr-2">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                                <span>
                                    Absenden </span>
                            </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}

    <main>
        <section class="section-padding">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <h5 class="lg-font mb-4 pb-1 font-bold">
                  {{ $cms->title }}
                </h5>
                <div class="row">
                  <div class="col-md-8">
                    <div class="terms-condition">
                      <p>{!! $cms->content !!}</p>
                    </div>
                  </div>
                  <div class="col-md-1 text-center d-none d-md-block">
                    <div class="h-100 vr"></div>
                  </div>
                  <div class="col-md-3 sticky-top align-self-start top-100px">
                    <div class="mt-4 mt-md-0">
                      <h4 class="mb-4 font-bold text-capitalize  border-bottom pb-3">Your advantages</h4>
                      <ul class="list-unstyled sm-font feature mb-4 ">
                        <li class="mb-3">Write a Review</li>
                        <li class="mb-3">Obtain tailor-made offers</li>
                        <li class="mb-3">Apply to different companies</li>
                      </ul>
                      <a href="{{ route('frontend.auth.company.register') }}" class="btn btn-theme mb-5">Register</a>
                      <h4 class=" mb-4 font-bold text-capitalize border-bottom pb-3">Quick Links</h4>
                      <ul class="list-unstyled body-font links mb-0">
                        <li class="mb-3">
                          <a href="javascript:void(0)" class="theme-hover">Anmelden</a>
                        </li>
                        <li class="mb-3">
                          <a href="javascript:void(0)" class="theme-hover">Datenschutz</a>
                        </li>
                        <li class="mb-3">
                          <a href="javascript:void(0)" class="theme-hover">Impressum</a>
                        </li>
                        <li class="mb-3">
                          <a href="javascript:void(0)" class="theme-hover">Nutzungsbedingungen</a>
                        </li>
                        <li class="mb-3">
                          <a href="javascript:void(0)" class="theme-hover">AGB</a>
                        </li>
                        <li class="mb-3">
                          <a href="javascript:void(0)" class="theme-hover">Inhaltsrichtlinien</a>
                        </li>
                        <li class="mb-3">
                          <a href="javascript:void(0)" class="theme-hover">sitemap</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
@endsection

@section('script')
@stop
