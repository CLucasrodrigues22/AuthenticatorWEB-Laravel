@component('mail::message')
# {{ $taskModel }}

Limite date for conclusion: {{ $date_conclusion }}

@component('mail::button', ['url' => $url])
See task
@endcomponent

Thanks for use App Task Controller,<br>
{{ config('app.name') }}
@endcomponent
