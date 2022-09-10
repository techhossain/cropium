@component('mail::message')
# Contact Request from - <b>{{$name}}</b>

Hi, I'm {{$name}}, Email {{$email}}, <br />
I'm Willing to know details about: {{$subject}} 
 - - -
{{$message}}

@component('mail::button', ['url' => '/'])
Contact
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent