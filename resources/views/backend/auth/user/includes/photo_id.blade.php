@if (Storage::disk('public')->exists($user->id_image))
    <img class="rounded-circle1 mb-2" style="max-height: 100px"
        src="{{ url('storage/' . $user->id_image) }}" />
	<a target="_black" class="btn btn-sm btn-primary" href="{{ url('storage/' . $user->id_image) }}">{{__('labels.general.preview')}}</a>
	@if($user->id_image_approve == 0)
	<a data-method="cancel" data-trans-button-cancel="Cancel" data-trans-button-confirm="Yes"
            data-trans-title="Warning" data-trans-text="{{__('alerts.id_approve')}}"
            href="{{ route('admin.auth.user.id_approve', $row) }}"
            class="btn btn-warning btn-sm btn-icon ml-auto1 waves-effect waves-light" data-toggle="tooltip"
            data-placement="top" title="Approve ID">
		{{__("labels.general.approve_id")}}
	</a>
	@endif
@endif
