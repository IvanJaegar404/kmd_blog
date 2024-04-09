{{-- navigation --}}
<nav class="flex items-center justify-between bg-blue-600 py-3 px-6 border-b border-gray-100">
    <div id="navigation-left" class="flex items-center">
        <a href="{{ route('home') }}">
            <x-application-mark />
        </a>
    </div>
    <div id="navigation-right" class="flex items-center md:space-x-6">
        <div class="top-menu ml-10">
            <div class="flex space-x-4">
                <x-nav-link href="#" :active="request()->routeIs('posts.index')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link href="#" :active="request()->routeIs('posts.index')">
                    {{ __('Company') }}
                </x-nav-link>
                <x-nav-link href="#" :active="request()->routeIs('posts.index')">
                    {{ __('Line of Business') }}
                </x-nav-link>
                <x-nav-link href="#" :active="request()->routeIs('posts.index')">
                    {{ __('Jon Openings') }}
                </x-nav-link>
                <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('News') }}
                </x-nav-link>
                <x-nav-link href="#" :active="request()->routeIs('posts.index')">
                    {{ __('Contact Us') }}
                </x-nav-link>
            </div>
        </div>
        {{-- @auth
            @include('layouts.essentials.header-auth')
        @else
            @include('layouts.essentials.header-guest')
        @endauth --}}
    </div>
</nav>
