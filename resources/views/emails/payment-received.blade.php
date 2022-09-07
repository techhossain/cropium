@component('mail::message')
# Payment Received

We've received {{$amount}} BDT

@component('mail::button', ['url' => $url])
Visit Us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
