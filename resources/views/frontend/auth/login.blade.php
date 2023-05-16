@extends('frontend.layouts.legacy.app')

@section('title', __('Login'))

@section('content')
   <main class="login p-0">
      <div class="container-fluid px-0">
         <div class="row g-0">
            <div class="order-2 order-sm-1 col-sm col-12 login-left">
               <div class="text-start py-3 py-md-3 py-xl-5 h-100 login-top">
                  <div class="row login-row h-100 g-0">
                     <div class="login-bg col">
                        <img src="img/home-hero-1a.jpg" alt="" class="img-fluid">
                     </div>
                     <div class="login-bg2 col align-self-lg-end">
                        <img src="img/home-hero-1b.jpg" alt="" class="img-fluid me-n5">
                     </div>

                  </div>
                  <ul class="list-unstyled checklist gray-clr">
                     <li class="li1 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                        <svg class="icon me-2 gray-clr">
                           <use xlink:href="#ic_circle_check"></use>
                        </svg>
                        Write a Review
                     </li>
                     <li class="li2 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                        <svg class="icon me-2 gray-clr">
                           <use xlink:href="#ic_circle_check"></use>
                        </svg>
                        Obtain tailor-made offers
                     </li>
                     <li class="li3 bg-white radius-4 d-flex align-items-center text-nowrap py-2 px-3 position-absolute">
                        <svg class="icon me-2 gray-clr">
                           <use xlink:href="#ic_circle_check"></use>
                        </svg>
                        Apply to different companies
                     </li>
                  </ul>

               </div>
            </div>

			@if(config('boilerplate.access.captcha.login'))
				<div class="row">
					<div class="col">
						@captcha
						<input type="hidden" name="captcha_status" value="true"/>
					</div><!--col-->
				</div><!--row-->
			@endif

            <div class="order-1 order-sm-2 col-sm col-12 d-flex align-items-center justify-content-center bg-white">
               <div class="login-form py-5">
                  <div class="px-3">
                     <a href="{{ url('/') }}"><img src="img/logo.png" alt="Lookon" /></a>
                     <h2 class="fw-600 sxl-font mb-3 mt-4 pt-2">{{__('labels.login.title')}}</h2>
                     <p class="mb-4 pb-2">{{ __('labels.login.log_to_continou') }}</p>
                        <form action="{{route('frontend.auth.login')}}" method="POST">
                        @csrf
                            <div class="form-body">
                            <div class="form-group">
                                <input type="email" class="form-control email" name="email" placeholder="{{__('labels.login.email')}}" />
                            </div>
                            <div class="form-group pwd">
                                <input type="password" id="loggedpassword" class="form-control" placeholder="{{__('labels.login.password')}}" aria-describedby="password-addon" name="password" />
                                <span toggle="#loggedpassword" class="toggle-password img-eye"></span>
                            </div>
                            <div class="text-center pb-4 mb-2 d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-theme flex-fill">{{__('labels.login.title')}} </button>
                                <a href="{{route('frontend.auth.password.request')}}" class="flex-fill blue-clr">{{__('labels.login.forgot_your_password')}}</a>
                            </div>
                            <div class="alert text-center">
                                {{ __('labels.login.dont_have_an_account') }} <a class="font-semibold text-underline" href="{{ url('register') }}">{{__('labels.register.title')}}</a>
                            </div>
                            </div>
                        </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>

@endsection

@push('after-scripts')

    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
