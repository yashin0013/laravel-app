@component('mail::message')
# Welcome to Our Application

Hi {{ $userData['name'] }},

Thank you for joining our community! We're excited to have you on board.

@component('mail::button', ['url' => 'https://example.com'])
Visit Our Website
@endcomponent

Thanks,<br>
Your Application Team
@endcomponent