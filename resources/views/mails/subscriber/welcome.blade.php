<x-mail::message>
# Subscription: welcome mail

You subscribed to our news channel successfully.

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
