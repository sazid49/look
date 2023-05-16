<x-forms.patch :action="route('frontend.panel.company.news.update',[$company,$news])" enctype="multipart/form-data" class="custom-validation" novalidate>
	<div class="modal-header">
		<h5 class="modal-title" id="myLargeModalLabel">{{ __('labels.company.edit_news') }}</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<div class="modal-body">
		<div class="news_div">
			<div class="row news_chcekbox">
				<div class="col-md-11 col-xl-11">
					<div class="form-group mb-3">
						<label class="control-label"><b>{{ __('labels.company.published') }} ?</b></label>
						<input type="radio" class="switch-input" id="show_news_yes" name="show_news" value="1" {{(old('show_news',$news->published)==1) ? "checked" : ""}}>
						<label class="control-label"><b>{{ __('labels.company.ja') }}</b></label>
						<input type="radio" class="switch-input" id="show_news_no" name="show_news" value="0"  {{(old('show_news',$news->published)== "" || old('show_news',$news->published)==0) ? "checked" : ""}}>
						<label class="control-label"><b>{{ __('labels.company.nein') }}</b></label>
					</div>
				</div>
			</div>
			<div class="row news_title">
				<div class="col-md-12 ">
					<div class="row">
						<div class="form-group mb-3 col-md-4">
							<label class="control-label"><b>{{ __('labels.company.image') }}</b></label>
							<input type="file" name="news_image" class="form-control" value="">
						</div>
						<div class="form-group mb-3 col-md-4">
							<label class="control-label"><b>{{ __('labels.company.title') }}</b></label>
							<input type="text" id="news_title" name="news_title" class="form-control" value="{{old('news_title',$news->title)}}">
						</div>
						<div class="form-group mb-3 col-md-4">
							<label class="control-label"><b>{{ __('labels.company.author') }}</b></label>
							<input type="text" name="news_author" class="form-control" value="{{old('news_author',$news->author)}}">
						</div>
					</div>
				</div>
				<div class="row news_description">
					<div class="col-md-12" >
						<div class="form-group mb-3 col-md-12 ">
							<label class="control-label"><b>{{ __('labels.company.description') }}</b></label><br>
							<textarea name="news_description" id="edit_news_description" style="width:100%;" rows="5" height="200%">{{old('news_description',$news->description)}}</textarea>
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

<!--tinymce js-->
<script>
    $(function() {
		0 < $("#edit_news_description").length && tinymce.init({
            selector: "textarea#edit_news_description",
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
    });
</script>