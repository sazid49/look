<x-forms.patch :action="route('admin.company.news.update',[$company,$news])" enctype="multipart/form-data" class="custom-validation" novalidate>
	<div class="modal-header">
		<h5 class="modal-title" id="myLargeModalLabel">{{ __('labels.company.edit_news') }}</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<div class="modal-body">
		<div class="news_div">
			<div class="row">
                <div class="col-md-4">
                    <div class="slim"
                         data-did-remove="setImageDeleted"
                         data-ratio="1:1">
                        <input type="file" name="slim[]">
                        <img src="{{ asset('storage') }}/{{ $news->image }}" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group mb-3 col-md-12">
                        <label class="control-label"><b>{{ __('labels.company.published') }}</b></label>
                        <input type="date" id="published" name="published_at" class="form-control" value="{{ old('published_at') ?? $news->published_at->format('Y-m-d') }}">
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
                        <input type="text" id="news_title" name="title" class="form-control" value="{{old('title',$news->title)}}">
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="control-label"><b>{{ __('labels.company.author') }}</b></label>
                        <input type="text" name="author" class="form-control" value="{{old('author',$news->author)}}">
                    </div>
                </div>
			</div>
			<div class="row news_title">
				<div class="row news_description">
					<div class="col-md-12" >
						<div class="form-group mb-3 col-md-12 ">
							<label class="control-label"><b>{{ __('labels.company.description') }}</b></label><br>
							<textarea name="description" id="edit_news_description" style="width:100%;" rows="5" height="200%">{{old('description',$news->description)}}</textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="submit" class="btn btn-primary" value="{{__('labels.general.buttons.update')}}">
	</div>
</x-forms.patch>

<script src="{{ asset('assets/slim-cropping-plugin/example/js/slim.kickstart.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

<!--tinymce js-->
<script>

    $(function() {
		0 < $("#edit_news_description").length && tinymce.init({
            selector: "textarea#edit_news_description",
            height: 300,
            // plugins: [
            //     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            //     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            //     "save table contextmenu directionality emoticons template paste textcolor"
            // ],
            // toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            // style_formats: [{
            //     title: "Bold text",
            //     inline: "b"
            // }, {
            //     title: "Red text",
            //     inline: "span",
            //     styles: {
            //         color: "#ff0000"
            //     }
            // }, {
            //     title: "Red header",
            //     block: "h1",
            //     styles: {
            //         color: "#ff0000"
            //     }
            // }, {
            //     title: "Example 1",
            //     inline: "span",
            //     classes: "example1"
            // }, {
            //     title: "Example 2",
            //     inline: "span",
            //     classes: "example2"
            // }, {
            //     title: "Table styles"
            // }, {
            //     title: "Table row 1",
            //     selector: "tr",
            //     classes: "tablerow1"
            // }]
        });
    });
</script>
