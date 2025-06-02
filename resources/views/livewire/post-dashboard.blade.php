@section('header', 'Dashboard')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($posts as $post)
        <div class="bg-white dark:bg-gray-800 rounded shadow p-4 flex flex-col">
            <div class="flex items-center gap-4 mb-2">
                <img src="{{ asset('storage/' . ($post->image_path ?? 'placeholder.jpg')) }}" alt="Post image" class="w-20 h-20 object-cover rounded">
                <div class="flex-1">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $post->title }}</h2>
                    <p class="text-md text-gray-600 dark:text-gray-300">By {{ $post->user->name }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Category: {{ $post->category->name }}</p>
                </div>
                @if($post->user_id === auth()->id())
                    <button wire:click="deletePost({{ $post->id }})"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm h-fit self-start">
                        Delete
                    </button>
                @endif
            </div>
        </div>
    @empty
        <div class="col-span-full flex justify-center items-center py-12">
            <div class="bg-white dark:bg-gray-800 rounded shadow p-8 text-center w-full max-w-md">
                <p class="text-gray-500 dark:text-gray-300 text-lg font-semibold">
                    No posts available. Create your first post!
                </p>
            </div>
        </div>
    @endforelse
</div>
