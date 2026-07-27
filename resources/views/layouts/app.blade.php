<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin - SDN Kondangjaya II</title>
        <link rel="icon" type="image/png" href="{{ asset('images/logosdnkondangjaya2.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Alpine.js CDN (Fallback interaktivitas Dropdown) -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col sm:flex-row h-screen overflow-hidden bg-gray-100">
            @include('layouts.navigation')

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col overflow-y-auto">
                <!-- Top Navbar (Desktop Profile) -->
                <div class="hidden sm:flex bg-white border-b border-gray-100 h-16 shrink-0 items-center justify-end px-4 sm:px-6 lg:px-8">
                    <!-- Settings Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow shrink-0">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <!-- SweetAlert2 Pop-up Confirmation -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmDelete(event, itemName) {
                event.preventDefault();
                const form = event.target.closest('form');
                Swal.fire({
                    title: 'Hapus ' + itemName + '?',
                    text: 'Data ' + itemName.toLowerCase() + ' yang sudah dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    customClass: {
                        popup: 'rounded-2xl shadow-2xl border border-gray-100 p-6',
                        confirmButton: 'px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl text-sm transition focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2',
                        cancelButton: 'px-5 py-2.5 bg-gray-500 hover:bg-gray-600 text-white font-bold rounded-xl text-sm transition mr-3 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        </script>
    </body>
</html>
