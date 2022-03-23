@component('mail::message')
# New Message

Name : {{ $name }} <br>
Phone : {{ $phone }} <br>
Email : {{ $email }} <br>
Message : {{ $message }}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
