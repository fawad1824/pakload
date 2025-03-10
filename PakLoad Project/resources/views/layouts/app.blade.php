<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Courier System') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />

</head>

<body class="flex bg-gray-100 min-h-screen" x-data="{ panel: false, menu: true }">
    <livewire:layout.sidebar />
    <div class="flex-grow text-gray-800">
        <header class="flex items-center h-20 px-6 sm:px-10 bg-white">

            <div class="flex flex-shrink-0 items-center ml-auto">
                <button class="relative inline-flex items-center p-2 hover:bg-gray-100 focus:bg-gray-100 rounded-lg"
                    @click="panel = !panel" @click.away="panel = false">
                    <span class="sr-only">User Menu</span>
                    @if (Auth::check())
                        <div class="hidden md:flex md:flex-col md:items-end md:leading-tight">
                            <span class="font-semibold">{{ Auth::user()->name }}</span>
                            @php
                                $active = DB::table('users')
                                    ->where('id', auth()->user()->id)
                                    ->first();
                            @endphp
                            <span class="text-sm text-gray-600">{{ $active->role }}</span>
                        </div>
                        <span class="h-12 w-12 ml-2 sm:ml-3 mr-2 bg-gray-100 rounded-full overflow-hidden">
                            <img src="{{ Storage::url(Auth::user()->profile_image) }}" alt="user profile photo"
                                class="h-full w-full object-cover">
                        </span>
                        <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                            class="hidden sm:block h-6 w-6 text-gray-300">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    @endif

                </button>
                <div class="absolute top-20 bg-white border rounded-md p-2 w-56" x-show="panel" style="display:none">
                    <div class="p-2 hover:bg-blue-100 cursor-pointer">
                        <a href="/profile" wire:navigate>Profile</a>
                    </div>
                </div>

            </div>
        </header>
        <main class="p-6" style="width: 100%; max-width: 1300px;">
            {{ $slot }}
        </main>


    </div>
</body>

</html>
