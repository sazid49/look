@extends('frontend.pages.company')

@section('title', __('labels.company.job_tab_title'))

@section('content')
    <main>
        <section class="d-flex align-items-center job-detail">
            <div class="container-fluid container-xl">
                <h1 class="lg-font font-semibold mb-4">{{ $job['title'] }}</h1>
                <div class="row">
                    <div class="col-md-7 position-sticky top-0">
                        <div class="card mb-4">
                            <div class="card-body box white job-list d-flex flex-column">

                                <div class="row">
                                    @if (!empty($job))
                                        <div class="col-xl-12">
                                            <h2 class="s-font">{{ __('Job Brief') }}</h2>
                                            <p>
                                                {!! $job->description !!}
                                            </p>
                                        </div>
                                        <div class="col-xl-12 d-flex flex-column">
                                            <div class="row tags pt-2">
                                                <p class="col-auto mb-2">
                                                    <svg class="icon-20 me-1 gray-clr">
                                                        <use xlink:href="#ic_map_pin"></use>
                                                    </svg> {{ $job['location'] }}
                                                </p>
                                                <p class="col-auto mb-2">
                                                    <svg class="icon-20 me-1 gray-clr">
                                                        <use xlink:href="#ic_building"></use>
                                                    </svg>
                                                    {{ $job->company->company_name }}
                                                </p>
                                                <p class="col-auto mb-2">
                                                    <svg class="icon-20 me-1 gray-clr">
                                                        <use xlink:href="#ic_briefcase"></use>
                                                    </svg>
                                                    {{ $job['type'] }}
                                                </p>
                                                <p class="col-auto mb-2">
                                                    <svg class="icon-20 me-1 gray-clr">
                                                        <use xlink:href="#ic_bookmark"></use>
                                                    </svg>
                                                    {{ $job['label'] }}
                                                </p>
                                            </div>
                                            <div class="chips d-flex align-items-center flex-wrap mt-auto mb-2">
                                                @foreach(explode(',',$job->skill) as $skill)
                                                    <span class="em-chip">{{ $skill }}</span>
                                                @endforeach
                                            </div>
                                            <div>
                                                <h4 class="s-font mt-4"> Key responsibilities will include:</h4>
                                                <ul class="style-icon list-unstyled">
                                                    <li>{{ ucfirst($job['skill']) }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card mb-4">
                            <div class="card-header bg-white">
                                <h5 class="s-font mb-0 ">
                                    {{ __('Apply for this position') }}
                                </h5>
                                @if($errors->any())
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="card-body pt-0">
                                @if($errors->any())
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <form action="{{route('frontend.company.create_apply_job',[$company,$job])}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Title</label>
                                                    <input type="Text" name="title" id="title" class="form-control email" required/>
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" name="firstname" id="firstname" class="form-control" required/>
                                                    @error('firstname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" name="lastname" id="lastname" class="form-control" required/>
                                                    @error('lastname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control email" required/>
                                                    @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="number" name="phone" class="form-control" id="phone" required/>
                                                    @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Post Code</label>
                                                    <input type="text" name="postcode" class="form-control" id="postcode"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">City</label>
                                                    <input type="text" name="city" class="form-control" id="city"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Date Of Birth</label>
                                                    <input type="date" class="form-control datepick" name="date_of_birth" id="date_of_birth" required>
                                                    @error('date_of_birth')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Civil Status</label>
                                                    <input type="text" class="form-control" name="civil_status" id="civil_status">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="border-bottom mb-3 mt-2">
                                                    <h5 class="s-font mb-2">{{ __('Upload Documents') }}</h5>
                                                </div>
                                                <p class="gray-clr xs-font mb-3">Allowed Type(s): .pdf, .doc, .docx</p>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label me-2">{{ __('Motivation letter') }}</label>
                                                    <div class="position-relative form-file">
                                                        <label for="motivation-letter"
                                                               class="form-control file-input text-truncate">
                                                            <span class="text-muted">{{ __('Browse') }}</span>
                                                        </label>
                                                        <input type="file" id="motivation-letter"
                                                               accept="application/pdf, image/*" name="motivation_letter" required>
                                                        @error('motivation_letter')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label me-2">{{ __('CV') }}</label>
                                                    <div class="position-relative form-file">
                                                        <label for="cv"
                                                               class="form-control file-input text-truncate">
                                                            <span class="text-muted">{{ __('Browse') }}</span>
                                                        </label>
                                                        <input type="file" id="cv" accept="application/pdf, image/*" name="CV" required>
                                                        @error('CV')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label me-2">{{ __('Certificate of Employment') }}</label>
                                                    <div class="position-relative form-file">
                                                        <label for="certificate_of_employment"
                                                            class="form-control file-input text-truncate">
                                                            <span class="text-muted">{{ __('Browse') }}</span>
                                                        </label>
                                                        <input type="file" id="certificate_of_employment"
                                                         name="certificate_of_employment" required>
                                                        @error('certificate_of_employment')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label me-2">{{ __('Diplomas and Certificates') }}</label>
                                                    <div class="position-relative form-file">
                                                        <label for="diplomas_and_certificates"
                                                               class="form-control file-input text-truncate">
                                                            <span class="text-muted">{{ __('Browse') }}</span>
                                                        </label>
                                                        <input type="file" id="diplomas_and_certificates"
                                                               accept="application/pdf, image/*" name="diplomas_and_certificates" required>
                                                        @error('diplomas_and_certificates')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Message</label>
                                                <textarea name="message" id="message" rows="5" class="form-control" data-gramm="false"
                                                          wt-ignore-input="true" required></textarea>
                                                @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="term_condition"
                                                           id="term_condition" required>
                                                    <label class="form-check-label" for="terms">
                                                        I have read the <a
                                                            href="https://lookon.ch/pages/datenschutzerklarung"
                                                            target="_blank" class="text-underline theme-hover">data
                                                            protection</a> conditions and the <a
                                                            href="https://lookon.ch/pages/allgemeine-geschaftsbedingungen"
                                                            target="_blank" class="text-underline theme-hover">terms and
                                                            conditions</a> and I agree.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-theme">{{ __('Apply Now') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@stop
@section('script')
    <!-- javascript -->
    <script src="{{ asset('/frontend/vendor/OwlCarousel/docs/assets/owlcarousel/owl.carousel.js') }}"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
    <script>
        $(".myImg").click(function() {
            var myImg = $(this).attr('src');
            $("#img01").attr('src', myImg)
            $("#myModal").show();
        });

        // Get the modal
        var modal = document.getElementById("myModal");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        $(document).ready(function() {
            $("#share").click(function() {
                $("#share_div").toggle();
            })
        });
    </script>

@stop
