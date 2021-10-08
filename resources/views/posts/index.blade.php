@extends('layouts.app')


@section('content')
    <div class="md:flex justify-center px-4">
        <div class="w-full md:w-4/12 mb-4 md:mb-0 rounded-lg">
            <form action="{{ route('posts') }}" method="post"
                class="">
                    @csrf
                    <div class=" mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Votre article" cols="30" rows="2"></textarea>
                @error('body')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Creer
                article</button>
        </div>
        </form>
    </div>
    <div class="w-full md:w-8/12 bg-white p-6 mb-4 md:mb-0 rounded-lg md:ml-4">
        @if ($posts->count())
            @foreach ($posts as $item)
                <x-post :item="$item" />
            @endforeach
            {{ $posts->links() }}
        @else
            <div>
                Il n'y a pas d'article disponible.
            </div>
        @endif
    </div>
    </div>

@endsection
