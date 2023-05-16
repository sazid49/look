<div class="row text-center">
    <div class="col">
        <label for="name" class="form-label">{{ __('labels.company.listing_active') }}</label>
        <div class="form-check form-switch text-center">
            <input name="active_yes" class="form-check-input float-none" type="checkbox" role="switch" id="company_active" value="1" {{ old('active', $company->active) == '1' ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <label for="name" class="form-label">{{ __('labels.company.published') }}</label>
        <div class="form-check form-switch text-center">
            <input name="published" class="form-check-input float-none" type="checkbox" role="switch" id="company_publish" value="1" {{ old('published', $company->published) == '1' ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <label for="name" class="form-label">{{ __('labels.company.taken_over') }}</label>
        <select name="claimed_by" id="claimed_by" class="form-control">
            <option value="">{{ __('NO') }}</option>
            @foreach ($allUsers1 as $row)
                <option value="{{ $row->id }}" {{ old('claimed_by', $company->claimed_by) == $row->id ? 'selected' : '' }}>
                    {{ $row->id . ' - ' . $row->userdetails->firstname . $row->userdetails->lastname }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <label for="name" class="form-label">{{ __('Show in Frontend') }}</label>
        <div class="form-check form-switch text-center">
            <input name="show_frontpage" class="form-check-input float-none" type="checkbox" role="switch" id="company_show_frontpage" value="1" {{ old('show_frontpage', $company->show_frontpage) == '1' ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col">
        <label for="name" class="form-label">{{ __('labels.company.show_tabs') }}</label>
        <div class="form-check form-switch text-center">
            <input name="show_tabs" class="form-check-input float-none" type="checkbox" role="switch" id="company_show_tabs" value="1" {{ old('show_tabs', $company->show_tabs) == '1' ? 'checked' : '' }}>
        </div>
    </div>
</div>

@push('after-scripts')
    <script>
        $("#company_active").change(function(){
            var field = 'active'
            var csrf = "{{ csrf_token() }}"
            var v = $(this).is(":checked")
            $.ajax({
                url : "{{ route('admin.company.update_listing_settings',$company) }}",
                data: {_token:csrf,field:field,v:v},
                type: 'POST'
            }).done(function(e){
                $(".listing-alert").text(e.msg);
                console.log(e);
            });
        })
        $("#company_publish").change(function(){
            var field = 'published'
            var csrf = "{{ csrf_token() }}"
            var v = $(this).is(":checked")
            $.ajax({
                url : "{{ route('admin.company.update_listing_settings',$company) }}",
                data: {_token:csrf,field:field,v:v},
                type: 'POST'
            }).done(function(e){
                $(".listing-alert").text(e.msg);
                console.log(e);
            });
        })
        $("#company_show_frontpage").change(function(){
            var field = 'show_frontpage'
            var csrf = "{{ csrf_token() }}"
            var v = $(this).is(":checked")
            $.ajax({
                url : "{{ route('admin.company.update_listing_settings',$company) }}",
                data: {_token:csrf,field:field,v:v},
                type: 'POST'
            }).done(function(e){
                $(".listing-alert").text(e.msg);
                console.log(e);
            });
        })
        $("#company_show_tabs").change(function(){
            var field = 'show_tabs'
            var csrf = "{{ csrf_token() }}"
            var v = $(this).is(":checked")
            $.ajax({
                url : "{{ route('admin.company.update_listing_settings',$company) }}",
                data: {_token:csrf,field:field,v:v},
                type: 'POST'
            }).done(function(e){
                $(".listing-alert").text(e.msg);
                console.log(e);
            });
        })
        $("#claimed_by").change(function(){
            var field = 'claimed_by';
            var csrf = "{{ csrf_token() }}";
            var claimedBy = $(this).val();
            $.ajax({
                url : "{{ route('admin.company.update_claim_settings',$company) }}",
                data: {_token:csrf,field:field,claimedBy:claimedBy},
                type: 'POST'
            }).done(function(e){
                $(".listing-alert").text(e.msg);
                console.log(e);
            });
        })


    </script>
@endpush
