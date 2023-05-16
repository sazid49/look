@component('mail::message')
# {{ __('Hello') }}

{{ __('There is new job application request for your company') }}
<br><br>
{{ __('Below is applicant person details') }} <br>
<b>{{ __('Job Title') }}:</b> {{$job['title']}} <br>
<b>{{ __('Name') }}:</b> {{$body['title'] ?? ""}} {{$body['firstname']}} {{$body['lastname']}} <br>
<b>{{ __('Email') }}:</b> {{$body['email']}} <br>
<b>{{ __('Phone') }}:</b> {{$body['phone']}} <br>

@component('mail::button', ['url' => $body['url']])
{{ __('View Detail') }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
