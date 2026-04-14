<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - SMK Wikrama</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F8F9FA] text-gray-800 antialiased font-sans flex min-h-screen" x-data="{ sidebarOpen: true }">

    <!-- Sidebar Component Wrapper -->
    <div x-show="sidebarOpen" x-transition.opacity.duration.200ms class="shrink-0 w-64 z-40 bg-[#2143A3]">
        <div class="sticky top-0 h-screen overflow-y-auto overflow-x-hidden custom-scrollbar">
            <x-admin.sidebar />
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col relative w-full h-full min-h-screen">

        <!-- Header Section with Background -->
        <header class="relative w-full h-80 bg-gray-900">
            <!-- Background Image Container -->
            <div class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('assets/images/admin_bg.png') }}" alt="Mountain Background" class="absolute inset-0 w-full h-full object-cover opacity-80" />
            </div>

            <!-- Navbar Content -->
            <div class="relative z-10 flex justify-between items-center px-8 py-6">
                <div class="flex items-center space-x-4">
                    <!-- Hamburger / Menu Icon -->
                    <button @click="sidebarOpen = !sidebarOpen" class="text-white hover:text-gray-200 focus:outline-none transition-opacity">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>

                    <!-- Logo and Title -->
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="SMK Wikrama Logo" class="h-10 w-10 rounded-full object-cover border-2 border-white/20">
                        <h1 class="text-white text-xl font-semibold">Welcome Back, {{ auth()->user()->name ?? (request()->is('operator/*') ? 'Operator' : 'Admin') }}</h1>
                    </div>
                </div>

                <!-- Date -->
                <div class="text-white font-medium">
                    {{ \Carbon\Carbon::now()->format('d F, Y') }}
                </div>
            </div>

            <!-- White Strip inside Header -->
            <div class="absolute bottom-0 left-0 right-0 px-8 pb-4">
                <div class="bg-white shadow-sm flex justify-between items-center h-[72px] px-6 relative z-20">
                    <div class="text-[#03346E] font-semibold text-[15px]">
                        Check menu in sidebar
                    </div>

                    <!-- Profile Menu Dropdown using Alpine.js -->
                    <div class="relative flex items-center h-full" x-data="{ open: false }">
                        <button @click="open = !open" @click.away="open = false" class="flex items-center space-x-3 focus:outline-none h-full px-2">
                            <!-- User Circle Icon -->
                            <div class="w-9 h-9 rounded-full border-2 border-gray-900 flex items-center justify-center text-gray-900">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <span class="text-[#03346E] text-[15px] font-medium pr-1">{{ auth()->user()->name ?? (request()->is('operator/*') ? 'Operator' : 'Admin') }}</span>
                            <svg class="w-4 h-4 text-[#03346E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" x-transition.opacity.duration.200ms class="absolute right-0 top-full mt-0 w-48 bg-white shadow-[0_8px_30px_rgb(0,0,0,0.12)] border-t border-gray-100 py-2 z-50">
                            <form method="POST" action="{{ url('/logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-5 py-3 text-[15px] text-[#03346E] hover:bg-gray-50 transition-colors text-left focus:outline-none">
                                    <svg class="w-5 h-5 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dynamic Content -->
        <div class="p-8 mt-2 h-full">
            @yield('content')
        </div>

    </main>

</body>
</html>
