@extends('frontend.layouts.legacy.app')

@section('title', __('labels.company.register_tab_title'))

@section('style')
@stop
@section('content')
    <div class="content">
        <div class="container1">
            @include('frontend.company.include.breadcrumb')
            <div class="row">
                <div class="col-md-12">
                    <div class="company-headerbar">
                        @php
                            $address_encode = urlencode($company->address);
                            $full_address_encoded = $address_encode . '%2C' . $company->postcode . '%20' . $company->city . '%2C' . 'Schweiz';
                        @endphp
                        @include('frontend.company.include.head')
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>{{ __('labels.register.heading_title') . ' ' . $company->company_name }}</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class='alert alert-info' role="alert">
                                                    {{ __('labels.register.heading_sub_title') }}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class='alert alert-warning' role="alert">
                                                    {{ __('labels.register.note', ['company' => $company->company_name]) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4>{{ __('labels.register.publications_header')}}</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="handleregister_publication_container container">
                                                @isset($company->publications)
                                                    @foreach($company->publications as $publication)
                                                        <div class="row">
                                                            <div class="card mt-3">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-2">SOGC</div>
                                                                        <div class="col">NO {{$publication->sogcId}}
                                                                            from {{$publication->sogcDate}}</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-2">DAILY</div>
                                                                        <div class="col">
                                                                            NO <?php echo $publication->registryOfCommerceJournalId; ?>
                                                                            from <?php echo $publication->registryOfCommerceJournalDate; ?></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-2">Mutation Types</div>
                                                                        <div class="col">
                                                                                <?php
                                                                                foreach ( $publication->mutationTypes as $index => $mutation ) :
                                                                                    echo $mutation->key;
                                                                                    if ( $index < sizeof ( $publication->mutationTypes ) - 1 )
                                                                                        echo ",";
                                                                                endforeach;
                                                                                ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12 border"><?php echo $publication->message; ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    @endforeach
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                @include('frontend.company.include.right')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
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
