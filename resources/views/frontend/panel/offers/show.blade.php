@extends('frontend.layouts.legacy.panel')

@section('title', __('labels.offers.detail'))

@section('page-title', __('labels.offers.detail'))

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-20">{{ __('labels.offers.detail') }}</h4>
                    <x-utils.link class="card-header-action" :href="route('frontend.panel.offers.index')" :text="'Back'" />
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12 mt-3">
            <x-backend.card>
                <x-slot name="body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 align="center">{{ __('labels.offers.offer_person_detail') }}</h5>
                            <hr>
                            <table class="table table-hover">
                                <tr>
                                    <th>{{ __('labels.offer.company_name') }}</th>
                                    <td>{{ $offer->company->company_name }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.offer.offer_company_name') }}</th>
                                    <td>{{ $offer->gen_company_name }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.offer.title') }}</th>
                                    <td>{{ $offer->gen_salutation }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.offer.firstname') }}</th>
                                    <td>{{ $offer->gen_firstname }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.offer.lastname') }}</th>
                                    <td>{{ $offer->gen_lastname }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.offer.email') }}</th>
                                    <td>{{ $offer->gen_email }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.offer.phone') }}</th>
                                    <td>{{ $offer->gen_phone }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.offer.postcode') }}</th>
                                    <td>{{ $offer->gen_postcode }}</td>
                                </tr>

                                <tr>
                                    <th>{{ __('labels.offer.city') }}</th>
                                    <td>{{ $offer->gen_city }}</td>
                                </tr>

                            </table>
                        </div>

                        <div class="col-md-6">
                            <h5 align="center">{{ __('labels.offers.offer_service_detail') }}</h5>
                            <hr>
                            <table class="table table-hover">
                                @foreach ($offer->offerfieldanswer as $item)
                                    {{--                                    @php--}}
                                    {{--                                        if ($item->questionGroup->type == 'text' || $item->questionGroup->type == 'textarea' || $item->questionGroup->type == 'dropdown') {--}}
                                    {{--                                            $answer = $item->answer;--}}
                                    {{--                                        } else {--}}
                                    {{--                                            $answer = implode(',',unserialize($item->answer));--}}
                                    {{--                                        }--}}
                                    {{--                                    @endphp--}}
                                    <tr>
                                        <th>{{ $item->questionGroup->field->label }}</th>
                                        <td>
                                            @if(in_array($item->questionGroup->type,['text','textarea','dropdown']))
                                                {{ $item->answer }}
                                            @else
                                                {{ implode(',',unserialize($item->answer)) }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <th>{{ __('labels.offer.message') }}</th>
                                    <td>{{ $offer->message }}</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection
