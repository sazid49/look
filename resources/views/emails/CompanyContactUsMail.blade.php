@component('mail::message')
# Hello

There is new contact us request for your company
<br><br>
Below is person details <br>

<b>Name:</b> {{$body['title'] ?? ""}} {{$body['firstname']}} {{$body['lastname']}} <br>
<b>Email:</b> {{$body['email']}} <br>
<b>Phone:</b> {{$body['phone']}} <br>

@component('mail::button', ['url' => $body['url']])
View Detail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
