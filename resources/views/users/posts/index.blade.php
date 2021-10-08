@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="pb-4">
                <h1 class="m-0 p-0 text-blue-500 normal font-bold text-lg">
                    {{ $user->name }}
                </h1>
                <p class="m-0 p-0">Posted: {{ $posts->count() }}
                    {{ Str::plural('article', $posts->count()) }} and received {{ $user->receveidLikes->count() }} likes
                </p>
            </div>
            @if ($posts->count())
                @foreach ($posts as $item)
                    <x-post :item="$item" />
                @endforeach
                {{ $posts->links() }}
            @else
                <div>
                    {{ $user->name }} n'a pas d'article.
                </div>
            @endif
        </div>
    </div>
@endsection
