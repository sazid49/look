@component('mail::message')
# Hello

There is new review submited for your company {{$body['company_name']}}
<br>
Below is reviewed person details

<b>Name:</b> {{$body['title'] ?? ""}} {{$body['firstname']}} {{$body['lastname']}} <br>
<b>Email:</b> {{$body['email']}}

@component('mail::button', ['url' => $body['url']])
View Reviews
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent