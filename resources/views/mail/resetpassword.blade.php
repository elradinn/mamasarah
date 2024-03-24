<x-mail::message>
# Reset Password Request
Dear {{ $user }},

You recently requested to reset the password for your account.
Please tap the button below to start the process.
<br>
<br>
<br>
<a class="resetPasswordButton" href="{{ env('APP_URL') }}/change-password/{{ $token }}">Reset Password</a>

<br>
<br>
If that doesn't work, click this link:
<br>
<a href="{{ env('APP_URL') }}/change-password/{{ $token }}">{{ env('APP_URL') }}/change-password/{{ $token }}</a>
<br>

<br>Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
