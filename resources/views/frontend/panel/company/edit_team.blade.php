@extends('frontend.layouts.panel')

@section('title', __('labels.company.update_company'))

@push('after-styles')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('assets/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box1 mb-2 d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <h4 class="mb-sm-0 font-size-18">{{ __('labels.company.update_company') }}</h4>
                    <x-utils.link class="card-header-action" :href="route('admin.company.index')" :text="'Back'" />&nbsp;|&nbsp;
                    <a href="{{ route('frontend.company.information', [$company,$company->slug]) }}"
                        target="_blank">{{ __('labels.company.view_previw') }}</a>
                </div>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="javascript: void(0);">{{ __('labels.company.company_managements') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('labels.company.update_company') }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <x-forms.patch :action="route('frontend.panel.company.team.update',[$company,$team])" enctype="multipart/form-data" class="custom-validation" novalidate>
        <x-backend.card>
            <x-slot name="body">
                @if (Auth()->user()->roles[0]->name == 'Administrator' ||
                    Auth()->user()->roles[0]->name == 'user_private' ||
                    Auth()->user()->roles[0]->name == 'user_company')
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-6">
                                    <h4>{{ __('labels.company.finance') }}</h4>
                                </div>
                                <div class="col-6">
                                    <!-- Large modal button -->
                                    <a href="{{ route('frontend.panel.company.team.index', $company) }}"
                                        class="btn btn-primary waves-effect float-end">{{ __('labels.general.back') }}</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 row">
                                <label for="name"
                                    class="form-label col-md-4">{{ __('labels.company.counter') }}</label>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="radio" name="payer" id="payer_yes"
                                                value="yes"
                                                {{ old('payer', $company->payer) == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="payer_yes">
                                                {{ __('labels.general.yes') }}
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="radio" name="payer" id="payer_no"
                                                value="no"
                                                {{ old('payer', $company->payer) == 'no' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="payer_no">
                                                {{ __('labels.general.no') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="text" name="not_payer_reason" class="form-control"
                                    placeholder="{{ __('labels.company.state_reason') }}"
                                    value="{{ old('not_payer_reason', $company->not_payer_reason) }}" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('labels.company.contract_price') }}</label>
                                <input type="text" name="price_contract" class="form-control"
                                    value="{{ old('price_contract', $company->price_contract) }}" />
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('labels.company.current_price') }}</label>
                                <input type="text" name="price_actual" class="form-control"
                                    value="{{ old('price_actual', $company->price_actual) }}" />
                            </div>
                        </div>
                    </div>
                @endif
            </x-slot>
        </x-backend.card>

        <x-backend.card>
            <x-slot name="body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <label for="name"
                                class="form-label col-md-6">{{ __('labels.company.listing_active') }}</label>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" name="active" id="active_yes"
                                            value="1" {{ old('active', $company->active) == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="active_yes">
                                            {{ __('labels.general.yes') }}
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6 ">
                                        <input class="form-check-input" type="radio" name="active" id="active_no"
                                            value="0"
                                            {{ old('active', $company->active) == '0' || old('active', $company->active) == '' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="active_no">
                                            {{ __('labels.general.no') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <label for="name"
                                class="form-label col-md-6">{{ __('labels.company.published') }}</label>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" name="published"
                                            id="published_yes" value="1"
                                            {{ old('published', $company->published) == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="published_yes">
                                            {{ __('labels.general.yes') }}
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6 ">
                                        <input class="form-check-input" type="radio" name="published"
                                            id="published_no" value="0"
                                            {{ old('published', $company->published) == '0' || old('published', $company->published) == '' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="published_no">
                                            {{ __('labels.general.no') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <label for="name"
                                class="form-label col-md-6">{{ __('labels.company.taken_over') }}</label>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" name="claimed" id="claimed_yes"
                                            value="1"
                                            {{ old('claimed', $company->claimed) == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="claimed_yes">
                                            {{ __('labels.general.yes') }}
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6 ">
                                        <input class="form-check-input" type="radio" name="claimed" id="claimed_no"
                                            value="0"
                                            {{ old('claimed', $company->claimed) == '0' || old('claimed', $company->claimed) == '' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="claimed_no">
                                            {{ __('labels.general.no') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">&nbsp;</div>
                        </div>
                        <div class="row claimed_by {{ old('claimed', $company->claimed) != '1' ? 'd-none' : '' }}">
                            <label for="name"
                                class="form-label col-md-6">{{ __('labels.company.select_user') }}</label>
                            <div class="col-md-5">
                                <select name="claimed_by" id="claimed_by" class="form-control">
                                    <option value=""><?php echo __('labels.general.choose'); ?></option>
                                    @foreach ($allUsers1 as $row)
                                        <option value="{{ $row->id }}"
                                            {{ old('claimed_by', $company->claimed_by) == $row->id ? 'selected' : '' }}>
                                            {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-backend.card>

        <x-backend.card>
            <x-slot name="body">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.information', $company) }}" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.informationen') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.register', $company) }}" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.register') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.interaction', $company) }}" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.interraktion') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.review', $company) }}" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.bewertung') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.contact_form', $company) }}" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.kontaktformular') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.recommendations', $company) }}"
                            role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.empfehlungen') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.pricelist', $company) }}" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.preisliste') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.company.team.index', $company) }}"
                            role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.team') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.news.index', $company) }}" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.news') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.gallery.index', $company) }}" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.galerie') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.job_application.index', $company) }}">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.bewerbung') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company.seo', $company) }}">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">{{ __('labels.company.seo') }}</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="team" role="tabpanel">
                        <section>
                            <div class="card card-body ">
                                <div class="row">
                                    <div class="col-6">
                                        <h2 class="title-h2 lg-font pb-2 mb-4 border-bottom">
                                            {{ __('labels.company.edit_team') }}</h2>
                                    </div>
                                    <div class="col-6">
                                        <!-- Large modal button -->
                                        {{-- <a href="{{ route('admin.company.team.index', $company) }}"
                                            class="btn btn-primary waves-effect float-end">{{ __('labels.general.back') }}</a> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-md-3">
                                        <label class="control-label"><b>{{ __('labels.company.image') }}</b></label>
                                        {{-- <input type="file" name="profile_photo" class="form-control" value=""> --}}
                                        {{-- <div class="slim" data-did-remove="setImageDeleted" data-meta='{"type":"company_logo","field":"image"}'>
												<input type="file" name="profile_photo">
											</div> --}}
                                        <div class="slim" data-did-remove="setImageDeleted"
                                            data-meta='{"type":"profile_photo","field":"profile_photo"}'>
                                            <input type="file" name="profile_photo">
                                            @if (!empty($team->profile_photo))
                                                @if (Storage::disk('public')->exists($team->profile_photo))
                                                    <img class="personal_logo" alt="no data"
                                                        src="{{ url('storage/' . $team->profile_photo) }}">
                                                @endif
                                            @endif
                                        </div>
                                        <input type="hidden" name="profile_photo_deleted">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.name') }}</b></label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ old('name', $team->name) }}">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="control-label"><b>{{ __('labels.company.designation') }}</b></label>
                                        <input type="text" name="designation" class="form-control"
                                            value="{{ old('designation', $team->designation) }}">
                                    </div>
                                </div>
								<div class="row">
									<div class="form-group mb-3 col-md-4">
										<label class="control-label"><b>{{ __('labels.company.email') }}</b></label>
										<input type="text" id="email" name="email" class="form-control" value="{{old('email',$team->email)}}">
									</div>
									<div class="form-group mb-3 col-md-4">
										<label class="control-label"><b>{{ __('labels.company.telephone') }}</b></label>
										<input type="text" name="phone" class="form-control" value="{{old('phone',$team->phone)}}">
									</div>
									<div class="form-group mb-3 col-md-4">
										<label class="control-label"><b>{{ __('labels.company.twitter') }}</b></label>
										<input type="text" name="twitter" class="form-control" value="{{old('twitter',$team->twitter)}}">
									</div>
									<div class="form-group mb-3 col-md-4">
										<label class="control-label"><b>{{ __('labels.company.linkedin') }}</b></label>
										<input type="text" name="linkedin" class="form-control" value="{{old('linkedin',$team->linkedin)}}">
									</div>
								</div>
                            </div>
                        </section>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <input type="submit" class="btn btn-primary" value="{{ __('labels.general.buttons.update') }}">
            </x-slot>
        </x-backend.card>
    </x-forms.patch>

@endsection

@push('after-scripts')
    <script src="{{ URL::asset('assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scripts/forms/validation/form-validation.js') }}"></script>

    <!--tinymce js-->
    <script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-tagsinput.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".datatable").DataTable();
            $("input[name='claimed']").change(function() {
                if ($("input[name='claimed']:checked").val() == 1) {
                    $(".claimed_by").removeClass('d-none');
                } else {
                    $(".claimed_by").addClass('d-none');
                    $("#claimed_by").val('');
                }
            });

            $(".add-pricing-item").click(function() {
                var clone = $(".item_title:first").clone();
                var cat_count = $("#cat_count").val();

                $(clone).find('.title_txt').attr('name', 'title_' + cat_count);
                $(clone).find('.description_txt').attr('name', 'description_' + cat_count);
                $(clone).find('.price_txt').attr('name', 'price_' + cat_count);
                $(clone).find('.item_title_action').removeClass('d-none');
                $(".prising_div").append(clone);
                cat_count++;
                $("#cat_count").val(cat_count);
            });
            $(".add-pricing-category").click(function() {
                var cat_count = $("#cat_count").val();
                var clone = $(".category_title:first").clone();
                $(clone).find('.category_title_txt').attr('name', 'category_title_' + cat_count);

                $(clone).find('.category_title_action').removeClass('d-none');
                $(".prising_div").append(clone);
                cat_count++;
                $("#cat_count").val(cat_count);
            });

            $(".add-team-item").click(function() {
                var clone = $(".team_title:first").clone();
                $(clone).find('.team_title_action').removeClass('d-none');
                $(clone).find('input[name="profile_photo[]"]').val('');
                $(clone).find('.team_img').attr('src', '');
                $(clone).find('.team_img').addClass('d-none');
                $(clone).find('input[name="profile_photo_hidden[]"]').val('');
                $(clone).find('input[name="team_name[]"]').val('');
                $(clone).find('input[name="designation[]"]').val('');
                $(".team_div").append(clone);
            });

            $(".add-gallery-item").click(function() {
                var clone = $(".gallery:last").clone();
                $(clone).find('.gallery_action').removeClass('d-none');
                $(clone).find('input[name="image[]"]').val('');
                $(clone).find('input[name="image_hidden[]"]').val('');
                $(clone).find('input[name="show_on_frontside[]"]').prop('checked', false);
                $(".gallery_div").append(clone);
            });

            $(document).on('click', 'input[name="show_on_frontside[]"]', function() {
                //check "select all" if all checkbox items are checked
                if ($('input[name="show_on_frontside[]"]:checked').length >= 6) {
                    alert('You can not select more then 5 images')
                    $(this).prop('checked', false);
                }
            });

            $(document).on('click', ".rem_cat_title_row", function() {
                var row = $(this).closest('.row');
                row.remove();
            });

        });

        $(function() {
            $('input')
                .on('change', function(event) {
                    var $element = $(event.target);
                    var $container = $element.closest('.example');

                    if (!$element.data('tagsinput')) return;

                    var val = $element.val();
                    if (val === null) val = 'null';
                    var items = $element.tagsinput('items');

                    $('code', $('pre.val', $container)).html(
                        $.isArray(val) ?
                        JSON.stringify(val) :
                        '"' + val.replace('"', '\\"') + '"'
                    );
                    $('code', $('pre.items', $container)).html(
                        JSON.stringify($element.tagsinput('items'))
                    );
                })
                .trigger('change');
        });
    </script>

    <script>
        //@ sourceURL=listings/listing/company/openHours.js
        $(function() {
            function conditionNotMatch(e, m) {
                isValid = false;
                let miac = 'bounceInUp';
                e.addClass('input-error');
                e.after('<span class="errors animated ' + miac + '">' + m + ' </span>');
            }

            function conditionMatch(e) {
                e.removeClass('input-error');
                e.parent().find('.errors').remove();
            }

            /* document.querySelector("#admin_listing_form").addEventListener("submit", function(e){
                if(!checkopenhours()){
                    e.preventDefault();    //stop form from submitting
                    alert("Not valid!");
                }
            }); */

            $('.open_hours_row').each(function() {
                let container = this;

                $(container).find('.switch.open_close input').each(function() {

                    $(this).on('change', function(event) {

                        //toggle enabled on split_hours
                        $(container).find('.switch.split_hours input').prop('disabled',
                            function(i, v) {
                                return !v;
                            });


                        $(container).find('select').each(function() {
                            let is_disabled = $(this).attr('disabled');

                            if (is_disabled)
                                $(this).removeAttr('disabled');
                            else {
                                $(this).attr('disabled', true);
                            }
                        });

                    });
                });

                $(container).find('.switch.split_hours input').each(function() {
                    $(this).on('change', function(event) {
                        $(container).find('.time_selector_group_afternoon').toggle();
                        conditionMatch($(container).find('.time_selector_group_afternoon'));
                    });
                });

                $(container).find('.time_selector_group_afternoon').find('select').each(function() {
                    $(this).on('change', function(event) {
                        conditionMatch($(container).find('.time_selector_group_afternoon'));
                    });
                })
            });
        });

        function checkopenhours() {

            var isValid = true;

            $('.open_hours_row').each(function() {
                let container = this;
                let is_open = $(this).find('.switch.open_close input').first().prop('checked');
                let split_hours = $(this).find('.switch.split_hours input').first().prop('checked');

                let time_selector_group_morning = $(this).find('.time_selector_group_morning').first();
                let time_selector_morning_open = $(this).find('.time_selector_morning_open select ').first();
                let time_selector_morning_close = $(this).find('.time_selector_morning_close select ').first();

                let time_selector_group_afternoon_valid = true;

                let time_selector_group_afternoon = $(this).find('.time_selector_group_afternoon').first();
                let time_selector_afternoon_open = $(this).find('.time_selector_afternoon_open select ').first();
                let time_selector_afternoon_close = $(this).find('.time_selector_afternoon_close select ').first();

                function conditionNotMatch(e, m) {
                    isValid = false;
                    let miac = 'bounceInUp';
                    e.addClass('input-error');
                    e.after('<span class="errors animated ' + miac + '">' + m + ' </span>');
                }

                function conditionMatch(e) {
                    e.removeClass('input-error');
                    e.parent().find('.errors').remove();
                }

                if (is_open) {

                    //var selm = $("#"+ oelm +' '+ cws +'.time_selector_morning');
                    //console.log(selm);
                    if (
                        !(time_selector_morning_open.val()) ||
                        !(time_selector_morning_close.val())
                        //||
                        //(
                        //!( parseInt( time_selector_morning_open.val() ) < parseInt( time_selector_morning_close.val() ) )
                        //&&
                        //!( parseInt( time_selector_morning_close.val() ) == 0 )
                        //)
                    ) {
                        //show error
                        let m = 'open must come before close on same day';
                        conditionNotMatch(time_selector_group_morning, m);
                    } else {
                        //clear field
                        conditionMatch(time_selector_group_morning);
                    }

                    //var selm = $("#"+ oelm +' '+ cws +'.time_selector_morning');

                    if (split_hours) {
                        if (!(parseFloat(time_selector_morning_close.val()) < parseFloat(
                                time_selector_afternoon_open.val()))) {
                            //show error
                            let m = 'afternoon open must come after morning close';
                            conditionNotMatch(time_selector_group_afternoon, m);
                            time_selector_group_afternoon_valid = false;
                        } else {
                            //clear field
                            conditionMatch(time_selector_group_afternoon);
                        }

                        if (0 && (!(parseFloat(time_selector_afternoon_open.val()) < parseFloat(
                                time_selector_afternoon_close.val()))) && (0 != parseFloat(
                                time_selector_afternoon_close.val()))) {
                            //show error
                            let m = 'afternoon open must be before afternoon close';
                            conditionNotMatch(time_selector_group_afternoon, m);
                        } else {
                            if (time_selector_group_afternoon_valid)
                                //clear field
                                conditionMatch(time_selector_group_afternoon);
                        }
                    } else { //clear afternoon values before sending

                        time_selector_afternoon_open.val(null);
                        conditionMatch(time_selector_afternoon_open);

                        time_selector_afternoon_close.val(null);
                        conditionMatch(time_selector_afternoon_close);
                    }
                } else {
                    let time_selector_group_morning = $(this).find('.time_selector_group_morning').first();
                    conditionMatch(time_selector_group_morning);

                    let time_selector_morning_open = $(this).find('.time_selector_morning_open select ').first();
                    time_selector_morning_open.val('');
                    conditionMatch(time_selector_morning_open);

                    let time_selector_morning_close = $(this).find('.time_selector_morning_close select ').first();
                    time_selector_morning_close.val('');
                    conditionMatch(time_selector_morning_close);

                    let time_selector_group_afternoon = $(this).find('.time_selector_group_afternoon').first();
                    conditionMatch(time_selector_group_afternoon);

                    let time_selector_afternoon_open = $(this).find('.time_selector_afternoon_open select ').first()
                        .val('');
                    time_selector_afternoon_open.val('');
                    conditionMatch(time_selector_afternoon_open);

                    let time_selector_afternoon_close = $(this).find('.time_selector_afternoon_close select ')
                        .first().val('');
                    time_selector_afternoon_close.val('');
                    conditionMatch(time_selector_afternoon_close);
                }
            });

            return isValid;
        }
    </script>
@endpush
