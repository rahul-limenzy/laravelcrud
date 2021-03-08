@component('mail::message')
# Congratulations!
staff account created successfully! <br> Welcome to SampleApp {{$staff->first_name . ' ' . $staff->last_name}}!

@component('mail::button', ['url' => 'http://www.sample.cj'])
login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
