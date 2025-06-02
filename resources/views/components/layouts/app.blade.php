<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-800 flex">
            <!-- Sidebar -->
            <aside class="bg-white dark:bg-gray-900 shadow-md md:block">
                <div class="h-16 flex items-center justify-center border-b border-gray-200 dark:border-gray-700">
                    <span class="text-lg font-bold text-gray-800 dark:text-gray-100">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </div>
                <nav class="mt-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('posts.dashboard') }}"
                               class="block px-6 py-2 rounded
                                   {{ request()->routeIs('posts.dashboard') ? 'bg-red-600 text-white' : 'text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-800' }}">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts.table') }}"
                               class="block px-6 py-2 rounded
                                   {{ request()->routeIs('posts.table') ? 'bg-red-600 text-white' : 'text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-800' }}">
                                Table
                                <livewire:post-count :wire:key="'post-count-sidebar'" />
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts.create') }}"
                               class="block px-6 py-2 rounded
                                   {{ request()->routeIs('posts.create') ? 'bg-red-600 text-white' : 'text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-800' }}">
                                Form
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts.tableform') }}"
                               class="block px-6 py-2 rounded
                                   {{ request()->routeIs('posts.tableform') ? 'bg-red-600 text-white' : 'text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-800' }}">
                                Table Form
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
            <!-- Main content -->
            <div class="flex-1 flex flex-col min-h-screen">
                <!-- Header -->
                <header class="h-16 bg-white dark:bg-gray-900 shadow flex items-center px-6 justify-between">
                    <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                        @yield('header', 'Dashboard')
                    </h1>
                    <a href="{{ route('dashboard') }}"
                        class="ml-4 px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded shadow text-sm font-semibold transition">
                        Back to Laravel Dashboard
                    </a>
                </header>
                
                <!-- Page Content -->
                <main class="flex-1 p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
        @livewireScripts
    </body>
</html>
