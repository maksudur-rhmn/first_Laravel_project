

@component('mail::message')
# Did you change your password?

Your Password has been changed!


 If you did not change your password click the button below to recover your password !!!
@component('mail::button', ['url' => 'http://127.0.0.1:8000/password/reset'])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
