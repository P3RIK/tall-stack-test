@section('header', 'Create Post')

<div class="flex items-center justify-center p-4">
    <form wire:submit="createPost" class="flex flex-col gap-4 p-8 rounded bg-blue-300">
        <div class="flex flex-col gap-1 px-4 pt-2">
            <label for="title" class="text-white">Post title</label>
            <input type="text" id="title" wire:model="title" class="border rounded px-3 py-2 bg-gray-800 text-white">
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="flex flex-col gap-1 px-4">
            <label for="content" class="text-white mb-2">Content</label>
            <textarea name="content" wire:model="content" class="border rounded px-3 py-2 bg-gray-800 text-white"></textarea>
            @error('content')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="flex flex-col gap-1 px-4">
            <label for="category" class="text-white">Category</label>
            <select name="category" wire:model="category_id" class="border rounded px-2 py-2 bg-gray-800 text-white">
                <option value="">Select a category</option>
                @foreach ($categorien as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <label class="flex items-center gap-4 text-white px-4">
            <input type="checkbox" wire:model="is_published" class="mx-4 bg-gray-800">
            Make public
        </label>
        
        <input type="file" wire:model="image" class="text-white px-4">
        @error('image')
            <span class="text-red-500 text-sm px-4">{{ $message }}</span>
        @enderror
        
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white rounded px-2 py-2 border border-gray-300">Submit</button>
        
        @if($showSuccessMessage)
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 3000)" 
            x-show="show"
            class="bg-green-500 text-white px-4 py-2 rounded mb-2 text-center mt-4 transition-opacity duration-500"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            Post was created successfully!
        </div>
        @endif
    </form>
</div>
