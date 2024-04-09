<x-app-layout>
    @section('hero')
        <div class="mb-10 w-full">
            <div class="mb-16">
                <h2 class="mt-16 mb-5 text-3xl text-blue-500 font-bold">Featured Posts</h2>
                <div class="w-full">
                    <div class="grid grid-cols-3 gap-10 w-full">
                        @foreach ($featuredPosts as $post)
                            <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endsection
    <div class="w-full grid grid-cols-4 gap-10">
        <div class="md:col-span-3 col-span-4">
            <livewire:post-list />
            {{-- @livewire('post-list') //you can write like this too --}}
        </div>
        <div id="side-bar"
            class="border-none col-span-4 md:col-span-1 px-3 md:px-6 space-y-10 py-6 pt-10 h-screen sticky top-0">
            @include('posts.essentials.search-box')
            @include('posts.essentials.year-filter')
            @include('posts.essentials.category-box')
        </div>
    </div>
</x-app-layout>
