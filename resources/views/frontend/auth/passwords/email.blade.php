@extends('frontend.layouts.legacy.app')

@section('title', __('labels.forgot_password.title'))

@section('content')

    <!-- Forgot Password Form -->
    <div class="form-wrapper1" id="forgot">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="listing-overview" class="listing-section p-0 p-md-2 card">
                    <div class="card-header subtitle border-bottom pb-3">
                        <h5><?= __ ( 'labels.forgot_password.title' ) ?></h5>
                    </div>

                    <div class=" card-body">
                        <form action="{{route('frontend.auth.password.email')}}" method="POST" id="forgot-pass-form">
                            @csrf
                            <div class="form-group">
                                <label>
                                    <?= __ ( 'labels.forgot_password.your_email' ) ?>
                                </label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <button id="btn-forgot-password" type="submit"
                                    class="button btn btn-theme btn-rounded mt-3 mt-md-4 d-flex align-items-center justify-content-center">
                                <i data-feather="key" class="mr-2"></i>
                                <span><?= __ ( 'labels.forgot_password.reset_password' ) ?></span>
                            </button>
                        </form>
                        <a href="{{ url('login') }}" class="mt-1">{{ __( 'labels.general.back' ) }}</a>
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
