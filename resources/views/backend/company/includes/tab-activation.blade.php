<div class="row text-center">
    <div class="col">
        <label for="offer_tab" class="form-label">{{ __('labels.company.offer') }}</label>
        <div class="form-check form-switch text-center">
            <input name="show_interraction" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_interraction" value="1" {{ $company->companytabs->show_interraction ?? 0 == '1' ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <label for="show_contactform" class="form-label">{{ __('labels.company.kontaktformular') }}</label>
        <div class="form-check form-switch text-center">
            <input name="show_contactform" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_contactform" value="1" {{ $company->companytabs->show_contactform ?? 0 == '1' ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <label for="show_pricelist" class="form-label">{{ __('labels.company.pricelist') }}</label>
        <div class="form-check form-switch text-center">
            <input name="show_pricelist" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_pricelist" value="1" {{ $company->companytabs->show_pricelist ?? 0 == '1' ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <label for="show_review" class="form-label">{{ __('labels.company.review') }}</label>
        <div class="form-check form-switch text-center">
            <input name="show_review" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_review" value="1" {{ $company->companytabs->show_review ?? 0 == '1' ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <label for="show_team" class="form-label">{{ __('labels.company.team') }}</label>
        <div class="form-check form-switch text-center">
            <input name="show_team" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_team" value="1" {{ $company->companytabs->show_team ?? 0 == '1' ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <label for="show_news" class="form-label">{{ __('labels.company.news') }}</label>
        <div class="form-check form-switch text-center">
            <input name="show_news" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_news" value="1" {{ $company->companytabs->show_news ?? 0 == '1' ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <label for="show_gallery" class="form-label">{{ __('labels.company.galerie') }}</label>
        <div class="form-check form-switch text-center">
            <input name="show_gallery" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_gallery" value="1" {{ $company->companytabs->show_gallery ?? 0 == '1' ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <label for="show_jobs" class="form-label">{{ __('labels.company.job') }}</label>
        <div class="form-check form-switch text-center">
            <input name="show_jobs" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_jobs" value="1" {{ $company->companytabs->show_jobs ?? 0 == '1' ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <label for="show_register" class="form-label">{{ __('labels.company.register') }}</label>
        <div class="form-check form-switch text-center">
            <input name="show_jobs" class="switch-tab form-check-input float-none" type="checkbox" role="switch" id="show_register" value="1" {{ $company->companytabs->show_register ?? 0 == '1' ? 'checked' : '' }}>
        </div>
    </div>
</div>

@push('after-scripts')
    <script>
        $(".switch-tab").on('click',function(){
            swal({
                title: "Do you want to show/hide this tab?",
                //text: "You can change the status later anytime!",
                //icon: "success",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var field = $(this).attr('name');
                    var csrf = "{{ csrf_token() }}";
                    var v = $(this).is(":checked");
                    $.ajax({
                        url : "{{ route('admin.company.update_show_tab',$company) }}",
                        data: {_token:csrf,field:field,v:v},
                        type: 'POST'
                    }).done(function(e){
                        swal({
                            title: e,
                            icon: "success"
                        });
                        console.log(e);
                    });
                }else {
                    $(this).click();
                    swal({
                        title: "So, you have decided to keep it like this!"
                    });
                }
            });
        })

    </script>
@endpush
