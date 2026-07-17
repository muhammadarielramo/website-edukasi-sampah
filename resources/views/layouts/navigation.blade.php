<nav x-data="{ open: false }" class="bg-white border-r border-gray-100 w-64 shrink-0 flex flex-col hidden sm:flex">
    <!-- Logo -->
    <div class="h-20 flex items-center justify-center border-b border-gray-100 px-4">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <x-application-logo class="block h-10 w-auto" />
            <div class="flex flex-col">
                <span class="font-bold text-lg text-green-700 leading-tight">DigiHejo</span>
                <span class="text-[10px] text-gray-500 font-medium">SDN Kondangjaya II</span>
            </div>
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="flex-1 overflow-y-auto py-4 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="mx-2 rounded-md">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.*')" class="mx-2 rounded-md">
            {{ __('Kelola Artikel') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('videos.index')" :active="request()->routeIs('videos.*')" class="mx-2 rounded-md">
            {{ __('Kelola Video') }}
        </x-responsive-nav-link>
    </div>


</nav>

<!-- Mobile Navigation (Hamburger Only) -->
<div class="sm:hidden bg-white border-b border-gray-100 p-4 flex justify-between items-center" x-data="{ open: false }">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
        <x-application-logo class="block h-8 w-auto" />
        <span class="font-bold text-green-700 text-lg">DigiHejo</span>
    </a>

    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Mobile Dropdown -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden absolute top-16 left-0 w-full bg-white border-b border-gray-200 shadow-lg z-50">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.*')">
                {{ __('Kelola Artikel') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('videos.index')" :active="request()->routeIs('videos.*')">
                {{ __('Kelola Video') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</div>
