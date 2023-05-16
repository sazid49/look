<x-forms.patch :action="route('admin.company.job_application.update', [$company, $job])" enctype="multipart/form-data" class="custom-validation" novalidate>
    <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">{{ __('labels.company.edit_job') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group mb-3 col-md-4">
                <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                <input type="text" id="job_title" name="job_title" class="form-control" value="{{ $job->title }}">
            </div>
            <div class="form-group mb-3 col-md-4">
                <label class="control-label"><b>{{ __('labels.company.location') }}</b></label>
                <input type="text" name="job_location" class="form-control" value="{{ $job->location }}">
            </div>
            <div class="form-group mb-3 col-md-4">
                <label class="control-label"><b>{{ __('labels.company.skill') }}</b></label><br>
                <input type="text" name="job_skill" id="job_skill" class="form-control" data-role="tagsinput"
                       value="{{ $job->skill }}">
            </div>
            <div class="form-group mb-3 col-md-4">
                <label class="control-label"><b>{{ __('labels.company.label') }}</b></label><br>
                <select name="job_position" id="label" class="form-control">
                    <option value="Intermediate" {{ $job->position == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="Mid Label" {{ $job->position == 'Mid Label' ? 'selected' : '' }}>Mid Label</option>
                    <option value="Expert" {{ $job->position == 'Expert' ? 'selected' : '' }}>Expert</option>
                </select>
            </div>
            <div class="form-group mb-3 col-md-4">
                <label class="control-label"><b>{{ __('labels.company.start_date') }}</b></label>
                <input type="date" name="job_start_date" class="form-control" value="{{ $job->start_date->format('Y-m-d') }}">
            </div>
            <div class="form-group mb-3 col-md-4">
                <label class="control-label"><b>{{ __('labels.company.expire_date') }}</b></label>
                <input type="date" name="job_expire_date" class="form-control" value="{{ $job->expire_date->format('Y-m-d') }}">
            </div>
            <div class="form-group mb-3 col-md-6">
                <label class="control-label"><b>{{ __('labels.company.job_type') }}</b></label>
                <input type="radio" class="switch-input" id="job_type_yes" name="job_type" value="PartTime"
                    {{ old('job_type', $job->type) == 'PartTime' ? 'checked' : '' }}>
                <label class="control-label"><b>{{ __('labels.company.parttime') }}</b></label>
                <input type="radio" class="switch-input" id="job_type_no" name="job_type" value="FullTime"
                    {{ old('job_type', $job->type) == '' || old('job_type', $job->type) == 'FullTime' ? 'checked' : '' }}>
                <label class="control-label"><b>{{ __('labels.company.fulltime') }}</b></label>
            </div>
            <div class="form-group mb-3 col-md-6">
                <label class="control-label"><b>{{ __('labels.company.published') }} ?</b></label>
                <input type="radio" class="switch-input" id="show_job_yes" name="active" value="1"
                    {{ old('active', $job->active) == 1 ? 'checked' : '' }}>
                <label class="control-label"><b>{{ __('labels.company.ja') }}</b></label>
                <input type="radio" class="switch-input" id="show_job_no" name="active" value="0"
                    {{ old('active', $job->active) == '' || old('active', $job->active) == 0 ? 'checked' : '' }}>
                <label class="control-label"><b>{{ __('labels.company.nein') }}</b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-3 col-md-12 ">
                    <label class="control-label"><b>{{ __('labels.company.description') }}</b></label><br>
                    <textarea name="job_description" id="edit_job_description" class="form-control" rows="5">{{ $job->description }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="{{ __('labels.general.buttons.update') }}">
    </div>
</x-forms.patch>

<!--tinymce js-->
<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
<script>
    $(function() {
		0 < $("#edit_job_description").length && tinymce.init({
            selector: "textarea#edit_job_description",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [{
                title: "Bold text",
                inline: "b"
            }, {
                title: "Red text",
                inline: "span",
                styles: {
                    color: "#ff0000"
                }
            }, {
                title: "Red header",
                block: "h1",
                styles: {
                    color: "#ff0000"
                }
            }, {
                title: "Example 1",
                inline: "span",
                classes: "example1"
            }, {
                title: "Example 2",
                inline: "span",
                classes: "example2"
            }, {
                title: "Table styles"
            }, {
                title: "Table row 1",
                selector: "tr",
                classes: "tablerow1"
            }]
        });

        $("#job_skill").tagsinput();
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
