<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Management - SMK Wikrama</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased font-sans">
    <!-- Header -->
    <header class="bg-white px-8 py-4 flex items-center justify-between border-b shadow-sm sticky top-0 z-50">
        <div class="flex items-center space-x-3">
            <!-- Using generated logo -->
            <img src="{{ asset('assets/images/logo.png') }}" alt="SMK Wikrama Bogor Logo" class="h-12 w-12 rounded-full object-cover">
        </div>
        <div>
            <button type="button" onclick="toggleModal()" class="bg-[#1C64F2] hover:bg-blue-700 text-white font-medium py-2 px-8 rounded-md shadow-sm transition duration-150">Login</button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="max-w-6xl mx-auto px-6 py-20 text-center flex flex-col items-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">Inventory Management of<br>SMK Wikrama</h1>
        <p class="text-lg text-gray-500 mb-12">Management of incoming and outgoing items at SMK Wikrama Bogor.</p>
        <div class="w-full max-w-4xl flex justify-center">
            <!-- Using generated hero illustration -->
            <img src="{{ asset('assets/images/hero.png') }}" alt="Inventory Management Illustration" class="w-full max-w-3xl object-contain drop-shadow-sm rounded-lg">
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-white py-20 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Our system flow</h2>
            <p class="text-gray-500 mb-12">Our inventory system workflow</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Item 1 -->
                <div class="flex flex-col items-center group cursor-pointer">
                    <div class="w-full aspect-square bg-[#0B132C] rounded-none mb-6 flex items-center justify-center overflow-hidden transition-transform transform group-hover:scale-105 duration-300">
                        <!-- Using generated item data image -->
                        <img src="{{ asset('assets/images/items_data.png') }}" alt="Items Data" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-semibold text-gray-900 text-lg">Items Data</h3>
                </div>

                <!-- Item 2 -->
                <div class="flex flex-col items-center group cursor-pointer">
                    <div class="w-full aspect-square bg-[#FFB800] rounded-none mb-6 flex items-center justify-center overflow-hidden transition-transform transform group-hover:scale-105 duration-300">
                        <!-- Using generated management tech image -->
                        <img src="{{ asset('assets/images/management_technician.png') }}" alt="Management Technician" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-semibold text-gray-900 text-lg">Management Technician</h3>
                </div>

                <!-- Item 3 -->
                <div class="flex flex-col items-center group cursor-pointer">
                    <div class="w-full aspect-square bg-[#B9B8EA] rounded-none mb-6 flex items-center justify-center overflow-hidden transition-transform transform group-hover:scale-105 duration-300">
                        <!-- Using generated lending image -->
                        <img src="{{ asset('assets/images/managed_lending.png') }}" alt="Managed Lending" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-semibold text-gray-900 text-lg">Managed Lending</h3>
                </div>

                <!-- Item 4 -->
                <div class="flex flex-col items-center group cursor-pointer">
                    <div class="w-full aspect-square bg-[#6EE2B6] rounded-none mb-6 flex items-center justify-center overflow-hidden transition-transform transform group-hover:scale-105 duration-300">
                        <!-- Using generated borrowing image -->
                        <img src="{{ asset('assets/images/all_can_borrow.png') }}" alt="All Can Borrow" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-semibold text-gray-900 text-lg">All Can Borrow</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-16 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Footer Info -->
            <div class="flex flex-col items-start">
                <img src="{{ asset('assets/images/logo.png') }}" alt="SMK Wikrama Bogor Logo" class="h-16 w-16 mb-4 rounded-full object-cover">
                <p class="text-gray-500 text-sm mb-1">smkwikrama@sch.id</p>
                <p class="text-gray-500 text-sm">001-7876-2876</p>
            </div>

            <!-- Guidelines -->
            <div>
                <h4 class="font-semibold text-gray-900 mb-4 text-lg">Our Guidelines</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="text-gray-500 hover:text-gray-900 transition-colors">Terms</a></li>
                    <li><a href="#" class="text-red-500 hover:text-red-600 transition-colors">Privacy policy</a></li>
                    <li><a href="#" class="text-gray-500 hover:text-gray-900 transition-colors">Cookie Policy</a></li>
                    <li><a href="#" class="text-gray-500 hover:text-gray-900 transition-colors">Discover</a></li>
                </ul>
            </div>

            <!-- Address & Social -->
            <div>
                <h4 class="font-semibold text-gray-900 mb-4 text-lg">Our address</h4>
                <div class="text-gray-500 text-sm space-y-1 mb-6">
                    <p>Jalan Wangun Tengah</p>
                    <p>Sindangsari</p>
                    <p>Jawa Barat</p>
                </div>

                <!-- Social Icons -->
                <div class="flex space-x-3">
                    <a href="#" class="w-8 h-8 rounded-full border flex items-center justify-center text-gray-400 hover:text-gray-900 hover:border-gray-900 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full border flex items-center justify-center text-gray-400 hover:text-gray-900 hover:border-gray-900 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full border flex items-center justify-center text-gray-400 hover:text-gray-900 hover:border-gray-900 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full border flex items-center justify-center text-gray-400 hover:text-gray-900 hover:border-gray-900 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div id="loginModal" class="fixed inset-0 z-[100] flex items-center justify-center {{ $errors->any() ? '' : 'hidden' }}">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-black/50" onclick="toggleModal()"></div>

        <!-- Modal Content -->
        <div class="bg-white w-full max-w-lg p-10 z-10 shadow-2xl transform transition-transform scale-95 duration-300">
            <h2 class="text-[28px] font-medium text-center text-gray-900 mb-8">Login</h2>

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="mb-4 bg-red-50 text-red-500 text-sm p-3 rounded">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="mb-6">
                    <label for="email" class="block text-gray-800 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full bg-[#fcfcfc] border border-gray-100 rounded-[4px] py-3.5 px-4 text-gray-700 outline-none focus:ring-1 focus:ring-gray-300 transition-all" required>
                </div>

                <div class="mb-10">
                    <label for="password" class="block text-gray-800 mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="w-full bg-[#fcfcfc] border border-gray-100 rounded-[4px] py-3.5 px-4 text-gray-700 outline-none focus:ring-1 focus:ring-gray-300 transition-all" required>
                </div>

                <div class="flex space-x-3">
                    <button type="button" onclick="toggleModal()" class="bg-[#FF7A50] hover:bg-[#ff6230] text-white py-2.5 px-6 rounded font-medium transition-colors">Close</button>
                    <button type="submit" class="bg-[#56E0B1] hover:bg-[#3cd5a1] text-white py-2.5 px-6 rounded font-medium transition-colors">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal() {
            document.getElementById('loginModal').classList.toggle('hidden')
        }
    </script>
</body>
</html>
