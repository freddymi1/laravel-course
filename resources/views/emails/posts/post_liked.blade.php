@component('mail::message')
    # Your pos was liked

    {{ $liker->name }} liked one of your posts

    @component('mail::button', ['url' => route('posts.show', $post)])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
