<x-mail::message>

![image]({{$image_url}} "poster image")

# Subscription: new post mail
# Post title: {{$post_title}}

There is new post has been added to our platform.

Don't miss it!

@component('mail::button', ['url' => route('news.show', $post_slug)])
Visit The Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
