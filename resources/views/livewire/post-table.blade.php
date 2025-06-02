@section('header', 'Posts Table')

<div class="p-4">
    <div class="mb-4 flex justify-between items-center">
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Search posts..."
            class="border rounded px-4 py-2 w-full max-w-xs bg-gray-800 text-white placeholder-gray-400"
        >
    </div>
    <div class="overflow-x-auto w-full">
        <table class="w-full bg-white dark:bg-gray-800 rounded shadow">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700">
                    <th class="px-4 py-4 text-left align-middle text-lg font-bold text-gray-800 dark:text-gray-100">Title</th>
                    <th class="px-4 py-4 text-left align-middle text-lg font-bold text-gray-800 dark:text-gray-100">Author</th>
                    <th class="px-4 py-4 text-left align-middle text-lg font-bold text-gray-800 dark:text-gray-100">Category</th>
                    <th class="px-4 py-4 text-left align-middle text-lg font-bold text-gray-800 dark:text-gray-100">Image</th>
                    <th class="px-4 py-4 text-left align-middle text-lg font-bold text-gray-800 dark:text-gray-100">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr class="border-t border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-3 align-middle text-center text-gray-900 dark:text-gray-100">{{ $post->title }}</td>
                        <td class="px-4 py-3 align-middle text-center text-gray-900 dark:text-gray-100">{{ $post->user->name }}</td>
                        <td class="px-4 py-3 align-middle text-center text-gray-900 dark:text-gray-100">{{ $post->category->name }}</td>
                        <td class="px-4 py-3 align-middle">
                            <img src="{{ asset('storage/' . ($post->image_path ?? 'placeholder.jpg')) }}"
                                 alt="Post image"
                                 class="w-16 h-16 object-cover rounded mx-auto">
                        </td>
                        <td class="px-4 py-3 align-middle text-center">
                            <button wire:click="deletePost({{ $post->id }})"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                            No posts found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
