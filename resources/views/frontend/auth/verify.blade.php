@extends('frontend.layouts.legacy.app')

@section('title', __('Verify Your E-mail Address'))

@section('content')

    <!-- Forgot Password Form -->
    <div class="form-wrapper1" id="forgot">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="listing-overview" class="listing-section p-0 p-md-2 card">
                    <div class="card-header subtitle border-bottom pb-3">
                        <h5>@lang('Verify Your E-mail Address')</h5>
                    </div>

                    <div class=" card-body">
                        @lang('Before proceeding, please check your email for a verification link.')
                        @lang('If you did not receive the email')

                        <x-forms.post :action="route('frontend.auth.verification.resend')" class="d-inline">
                            <button class="btn btn-link p-0 m-0 align-baseline"
                                    type="submit">@lang('click here to request another').
                            </button>
                        </x-forms.post>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <br><br>
@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(function () {
        })
    </script>
@endpush
