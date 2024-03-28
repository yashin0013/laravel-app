<x-mail::message>

Hi {{ $user->name }},

Someone checked your profile check on our website.

<x-mail::button :url="'/'">
Go to Profile
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
