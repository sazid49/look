@component('mail::message')
# {{ __('Hello') }}

{{ __('There is new offer enquiry for your company') }}
<br>
{{ __('Below is offer person details') }}

<b>{{ __('Name') }}:</b> {{$body['title'] ?? ""}} {{$body['firstname']}} {{$body['lastname']}} <br>
<b>{{ __('Company') }}:</b> {{$body['company_name']}}

@component('mail::button', ['url' => $body['url']])
{{ __('View Offer') }}
@endcomponent

{{ __('Thanks') }},<br>
{{ config('app.name') }}
@endcomponent
