@component('mail::message')
# Welcome {{ $User->username }},

Thanks for registering with us.

@component('mail::panel')
	The email address that you registered with is: {{ $User->email }}
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
	Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
