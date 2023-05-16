@extends('frontend.layouts.legacy.app')

@section('title', __('Register'))

@section('content')

<main class="login p-0" style="margin-bottom: 70px">
    <div class="container-fluid px-0">
       <div class="row g-0">
          <div class="order-2 order-sm-1 col-sm col-12 login-left">
             <div class="text-start py-3 py-md-3 py-xl-5 h-100 login-top">
                <div class="row login-row h-100 g-0">
                   <div class="login-bg col">
                      <img src="{{ asset('img/home-hero-1a.jpg') }}" alt="" class="img-fluid">
                   </div>
                   <div class="login-bg2 col align-self-lg-end">
                      <img src="{{ asset('img/home-hero-1b.jpg') }}" alt="" class="img-fluid me-n5">
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
          <div class="order-1 order-sm-2 col-sm col-12 d-flex align-items-center justify-content-center bg-white">
             <div class="login-form py-5" >
                <div class="px-3">
                   <a href="{{ url('/') }}"><img src="img/logo.png" alt="Lookon" /></a>
                   <h2 class="fw-600 md-font mb-3 mt-4 pt-2">{{ __('labels.register.create_account') }}</h2>
                   <form  action="{{route('frontend.auth.register')}}" method="POST">
                    @csrf
                      <div class="form-body">

                         <div class="form-group" id="notprivateperson" >
                            <div class="form-check form-switch mb-3 ps-0">
                               <label class="form-check-label me-2" for="private_or_company_yes">{{ __('labels.register.private_person') }}</label>
                               <input class="form-check-input float-none ms-0"  name="private_or_company_yes" id="private_or_company_yes" type="checkbox" role="switch">
                            </div>
                            <input type="text" name="company_name"  id="company_name" class="form-control" placeholder="{{ __('labels.register.company_name') }}" />
                         </div>
                         <div class="row" >
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <input type="text" class="form-control" name="firstname" id="firstname" placeholder="{{ __('labels.register.firstname') }}" value="{{old('firstname')}}" required/>
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <input type="text" class="form-control" name="lastname" id="lastname" value="{{old('lastname')}}" placeholder="{{ __('labels.register.lastname') }}" required />
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <input type="number" class="form-control" name="company_postcode" id="company_postcode" value="{{old('company_postcode')}}" placeholder="{{ __('labels.register.postcode') }}" required />
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <input type="text" class="form-control" name="company_city" id="company_city" value="{{old('company_city')}}" placeholder="{{ __('labels.register.city') }}" required />
                               </div>
                            </div>
                            <div class="col-sm-12">
                               <div class="form-group">
                                  <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control email" placeholder="{{ __('labels.register.email') }}" required />
                               </div>
                            </div>
                            <div class="col-sm-12">
                               <div class="form-group">
                                  <input  type="number" name="phone" id="phone" value="{{old('phone')}}" class="form-control" placeholder="{{ __('labels.register.phone') }}" required />
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group pwd">
                                  <input type="password" id="password" class="form-control" placeholder="{{ __('labels.register.password') }}" aria-describedby="password-addon" name="password" required/>
                                  <span toggle="#password" class="toggle-password img-eye"></span>
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group pwd">
                                  <input type="password" id="password_confirmation" class="form-control" placeholder="{{ __('labels.register.password_confirmation') }}" aria-describedby="password-addon" name="password_confirmation" required />
                                  <span toggle="#password_confirmation" class="toggle-password img-eye"></span>
                               </div>
                            </div>
                         </div>

                         <div class="text-center pb-4 mb-2 d-flex justify-content-between align-items-center">
                            <button  class="btn btn-theme flex-fill w-100">{{ __('labels.register.sign_up') }}</button>
                         </div>
                         <div class="alert text-center">
                            {{__('labels.register.already_have_an_account')}} <a class="font-semibold text-underline" href="{{ url('login') }}">{{ __('labels.register.login') }}</a>
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
    <?php
    if ( isset( $_GET ) && count ( $_GET ) > 0 && isset( $_GET[ 'sidebarform' ] ) )
    {
        ?>
    {{-- <script>
        jQuery(document).ready(function () {
            jQuery(".resgisetrformclick").trigger("click");
            jQuery("#private_or_company_no").attr('checked', true);
            showNotPrivatePerson();
        });
    </script> --}}
        <?php
    }
    ?>
            <!-- Show input field "Company Name", if its a company
    ================================================== -->
    <script>
      //   function showNotPrivatePerson() {
      //       $("#notprivateperson").fadeIn('slow', function () {
      //           $("#notprivateperson").show();
      //       });
      //   }

      //   function hideNotPrivatePerson() {
      //       $("#notprivateperson").fadeOut('slow', function () {
      //           $("#notprivateperson").hide();
      //       });
      //   }

      //    function hideNotPrivatePerson() {
      //       $("#company_name").fadeOut('slow', function () {
      //           $("#company_name").hide();
      //       });
      //   }


   $(document).ready(function(){
      $('#private_or_company_yes').click(function(){
      if($(this).prop('checked')){
      // show something
      $("#company_name").fadeOut('slow', function () {
                $("#company_name").hide();
            });
      } else {
      // hide something
      $("#company_name").fadeIn('slow', function () {
                $("#company_name").show();
            });
      }
      });
      });

    </script>

    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    {{-- <script type="text/javascript" src="{{ asset('frontend/assets/js/app/register.js') }}"></script> --}}
@endpush
