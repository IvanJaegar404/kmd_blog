<div id="recommended-topics-box">
    <h3 class="text-lg font-semibold text-gray-900 mb-3">Select Category to View</h3>
    <div class="topics flex flex-wrap justify-start gap-2">
        @foreach ($categories as $category)
            <x-button wire:navigate href="{{ route('posts.index', ['category' => $category->category_slug]) }}">
                {{ $category->category_name }}
            </x-button>
        @endforeach
    </div>
</div>
