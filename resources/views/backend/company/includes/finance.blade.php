<div class="row">

    @if(Session::has('success'))
        <div class="col-12 alert-div"><p class="text-success">{{ Session::get('success') }}</p></div>
    @endif

    <x-forms.patch :action="route('admin.company.update_payment', $company)" id="update_payment" enctype="multipart/form-data" class="custom-validation" novalidate>
        <div class="row">

            <div class="col-lg-3">
                <div class="mb-3 row">
                    <label for="name" class="form-label col-md-4">{{ __('labels.company.counter') }}</label>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="payer" id="payer_yes" value="1" {{ old('payer', $company->payment ? $company->payment->payer : '') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="payer_yes">
                                    {{ __('labels.general.yes') }}
                                </label>
                            </div>

                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="payer" id="payer_no" value="0" {{ old('payer', $company->payment ? $company->payment->payer : '') == '0' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="payer_no">
                                    {{ __('labels.general.no') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('labels.company.state_reason') }}</label>
                    <input type="text" name="not_payer_reason" class="form-control" placeholder="{{ __('labels.company.state_reason') }}" value="{{ old('not_payer_reason', $company->payment->not_payer_reason ?? '') }}"/>
                    @error('not_payer_reason')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="price_contract" class="form-label">{{ __('labels.company.contract_price') }}</label>
                    <input type="text" name="price_contract" class="form-control" value="{{ old('price_contract', $company->payment->price_contract ?? 0) }}"/>
                    @error('price_contract')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('labels.company.current_price') }}</label>
                    <input type="text" name="price_actual" class="form-control" value="{{ old('price_actual', $company->payment->price_actual ?? 0) }}"/>
                    @error('price_actual')<small class="text-danger">{{ $message }}</small>@enderror    </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary submit-button">
                        {{ __('SAVE') }}
                    </button>
                    <button class="btn btn-primary loader-button d-none">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        {{ __('SAVING....') }}
                    </button>
                </div>
            </div>
        </div>
    </x-forms.patch>
</div>

@push('after-scripts')
    <script>
        updatePayment();

        function updatePayment(){
            $("#update_payment").on('submit',function(e){

                e.preventDefault();

                $(".submit-button").hide();
                $(".loader-button").removeClass('d-none');
                $(".alert-div").addClass('d-none');

                $.ajax({
                    url : $(this).attr('action'),
                    data: $(this).serializeArray(),
                    type: 'POST'
                }).done(function(e){
                    updatePayment();
                    $("#finance").html(e);
                    console.log(e);
                });
            })
        }
    </script>
@endpush
