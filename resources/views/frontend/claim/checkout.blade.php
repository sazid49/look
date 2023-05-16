@extends('frontend.layouts.claim')

@section('title', __('labels.claim.checkout_tab_title'))

@section('style')
@stop

@section('content')
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="listing-overview" class="card mb-4">
                    <div class="card-header subtitle border-bottom pb-3 d-flex align-items-center">
                        <h5>{{__('labels.claim.step_40_title')}}</h5>
                    </div>
                    <div class="card-body">
                        <p>{{__('labels.claim.step_41_title')}}</p>
                        <p>
                            <a href="{{$transaction_url}}" id="submit_form_button1" class="payrexx-modal-window btn btn-primary btn-sm" href="#">{{__('labels.claim.step_43_title')}}</a>
                        </p>
                    </div>
                    <div class="card-header subtitle pb-3 d-flex align-items-center" style="border-bottom: 0px;">
                        <h5>{{__('labels.claim.step_42_title')}}</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">{{__('labels.claim.step_44_title')}}</th>
                                    <th scope="col">{{__('labels.claim.step_45_title')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{__('labels.claim.step_10_title')}}</td>
                                    <td>{{$claim_page['company_name']}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('labels.claim.step_21_title')}}</td>
                                    <td>{{$claim_page['firstname'] ?? Auth()->user()->name}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('labels.claim.step_23_title')}}</td>
                                    <td>{{$claim_page['lastname'] ?? ""}}</td>
                                </tr>
								
                                <tr>
                                    <td>{{__('labels.claim.step_18_title')}}</td>
                                    <td>{{$claim_page['phone']}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('labels.claim.step_14_title')}}</td>
                                    <td>{{$claim_page['address']}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('labels.claim.step_13_title')}}</td>
                                    <td>{{$claim_page['postcode']}} {{$claim_page['city']}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('labels.claim.step_19_title')}}</td>
                                    <td>{{$claim_page['website']}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <p class="text-center"><a class="" href="{{route('frontend.index')}}" role="button">Zurück zur Hauptseite</a></p>
            </div>
        </div>`
    </div>
@stop

@section('script')
    <script src="https://pay.sandbox.datatrans.com/upp/payment/js/datatrans-2.0.0.js"></script>
    <script>
        $(document).ready(function() {
        	// $('#submit_form_button').click(function() {
            //     Datatrans.startPayment({
            //         transactionId: "<?php //echo $datatrans_transaction_id; ?>",
            //         autosettle: true,
            //         'opened': function() {
            //             console.log('payment-form opened')
            //         },
            //         'loaded': function() {
            //             console.log('payment-form loaded')
            //         },
            //         'closed': function() {
            //             console.log('payment-page closed')
            //         },
            //         'error': function() {
            //             console.log('error')
            //         }
            //     })
            // })
        })
    </script>
@stop
