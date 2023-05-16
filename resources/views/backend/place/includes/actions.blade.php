<x-utils.edit-button :href="route('admin.places.edit', $row)" />
<x-utils.view-button :href="route('admin.places.show', $row)" />
<a data-method="delete" 
	data-trans-button-cancel="Cancel" 
	data-trans-button-confirm="Delete" 
	data-trans-title="Warning" 
	data-trans-text="Are you sure you want to delete this item?" 
	 href="{{ route('admin.places.destroy', $row) }}" class="btn btn-danger btn-sm btn-icon ml-auto1 waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
    <i class="fas fa-trash"></i> Delete
</a>&nbsp;