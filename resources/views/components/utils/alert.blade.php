@props(['dismissable' => true, 'type' => 'success', 'ariaLabel' => __('Close')])

<div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }} role="alert">
    @if ($dismissable)
        <button type="button" class="close float-end" onclick="closeAlert(this)" data-dismiss="alert" aria-label="{{ $ariaLabel }}">
            <span aria-hidden="true">&times;</span>
        </button>
    @endif

    {{ $slot }}
</div>
