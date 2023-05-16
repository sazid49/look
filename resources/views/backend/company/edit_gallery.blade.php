<!-- This is no longer needed since we -->
<!-- update the Show/Hide from the list and -->
<!-- modify the image inline from the list. -->

<x-forms.patch :action="route('admin.company.gallery.update',[$company,$gallery])" enctype="multipart/form-data" class="custom-validation" novalidate>
    <div class="modal-header">
        <h5 class="title-h2 lg-font pb-2 mb-4 border-bottom">{{ __('labels.company.galerie') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group mb-3 row">
                <div class="col-md-4 form-group mb-3">
                    <label class="control-label">{{ __('labels.company.image') }}</label>
                    <img src="{{ asset('storage') }}/{{ $gallery->image }}" width="100" alt="">
                    <div class="slim"
                         data-force-size="968,500"
                         data-ratio="2:1"
                         data-label="Image 7"
                         data-download="true"
                         data-will-transform="addImageWatermark"
                         data-did-remove="setImageDeleted"
                         data-instant-edit="true"
                         data-meta='{"type":"company_photo","field":"gallery_image"}'>
                        <input type="file" name="gallery_image">
                    </div>
                    <input type="hidden" name="gallery_image_hidden" >
                </div>
                <div class="form-group mb-3 col-md-5 mt-5 pt-5">
                    <label class="control-label">
                        <input type="hidden" name="show_on_frontside" class="" value="0">
                        <input type="checkbox" name="show_on_frontside" class="" value="1" {{ $gallery->show_on_frontside == 1 ? 'checked' : '' }}>
                        <b>{{ __('labels.company.show_on_frontside') }}</b>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="{{__('labels.general.buttons.save')}}">
    </div>
</x-forms.patch>

@section('after-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // get a reference to the remove button
            var button = document.querySelector('#remove-button');

            // listen to clicks on the remove button
            button.addEventListener('click', function() {

                // get the element with id 'my-cropper'
                var element = document.querySelector('#my-cropper');

                // find the cropper attached to the element
                var cropper = Slim.find(element);

                // call the remove method on the cropper
                cropper.remove();

            });

        });
    </script>
@stop
