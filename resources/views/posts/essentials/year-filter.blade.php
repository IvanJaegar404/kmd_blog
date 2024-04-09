<div>
    <x-dropdown alignment="right">
        <x-slot name="trigger">
            <x-button>
                Select Year
            </x-button>
        </x-slot>
        @foreach ($years as $year)
            <x-dropdown-link class="flex items-center" wire:navigate
                href="{{ route('posts.index', ['year' => $year]) }}">{{ $year }}</x-dropdown-item>
        @endforeach
    </x-dropdown>
</div>
<hr>
