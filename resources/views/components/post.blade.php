@props(['item' => $item])

<div class="mb-4">
    <a href="{{ route('users.posts', $item->user) }}" class="font-bold text-gray-600">{{ $item->user->name }}</a>
    <span class="ml-2 text-gray-300">
        {{ $item->created_at->diffForHumans() }}
        {{-- {{ $item->created_at }} --}}
    </span>
    <p class="mb-2">{{ $item->body }}</p>

    <div class="flex items-center justify-between">
        <div class="flex">
            @auth
                @if (!$item->likedBy(auth()->user()))
                    <form action="{{ route('posts.likes', $item) }}" method="post" class="mr-1">
                        @csrf
                        <button type="submit" class="text-blue-500">Like</button>
                    </form>
                @else
                    <form action="{{ route('posts.likes', $item) }}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500">Unlike</button>
                    </form>
                @endif
            @endauth
            <span class="font-bold text-green-500">{{ $item->likes->count() }}
                {{ Str::plural('like', $item->likes->count()) }}
            </span>
        </div>
        {{-- @if ($item->ownedBy(auth()->user())) --}}
        @can('delete', $item)
            <div>
                <form action="{{ route('posts.destroy', $item) }}" method="post" class="ml-2 mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded font-medium w-full">Delete</button>
                </form>
            </div>
        @endcan
        {{-- @endif --}}
    </div>
</div>
