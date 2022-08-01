@component('mail::message')
# Hello, there

Book name: {{ $data['book_name'] }}

Author: {{ $data['author'] }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
