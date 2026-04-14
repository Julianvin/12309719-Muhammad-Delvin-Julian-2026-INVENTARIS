<aside class="w-full bg-[#2143A3] text-white flex flex-col shrink-0 leading-relaxed font-sans text-sm pb-10">
    <div class="px-6 py-6 pb-2 text-[11px] font-semibold text-gray-300">
        Menu
    </div>

    <nav class="flex-1 space-y-0.5 mt-2">
        @if(Auth::check() && Auth::user()->role == 'admin')
        <!-- Dashboard -->
        <a href="/admin/dashboard" class="flex items-center px-6 py-3.5 transition {{ request()->is('admin/dashboard') ? 'bg-[#2B52C3] border-l-4 border-white text-white' : 'text-gray-200 hover:bg-[#2B52C3]' }}">
            <svg class="w-4 h-4 mr-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z"/></svg>
            <span class="font-bold">Dashboard</span>
        </a>

        <!-- Items Data Category -->
        <div class="px-6 pt-6 pb-2 text-[11px] font-semibold text-gray-300">
            Items Data
        </div>

        <a href="/admin/categories" class="flex items-center px-6 py-3.5 transition {{ request()->is('admin/categories') ? 'bg-[#2B52C3] border-l-4 border-white text-white' : 'text-gray-200 hover:bg-[#2B52C3]' }}">
            <svg class="w-4 h-4 mr-4" fill="currentColor" viewBox="0 0 24 24"><path d="M3 4h18v2H3V4zm0 7h18v2H3v-2zm0 7h18v2H3v-2z"/></svg>
            <span class="{{ request()->is('admin/categories') ? 'font-bold' : 'font-semibold' }}">Categories</span>
        </a>

        <a href="/admin/items" class="flex items-center px-6 py-3.5 transition {{ request()->is('admin/items') ? 'bg-[#2B52C3] border-l-4 border-white text-white' : 'text-gray-200 hover:bg-[#2B52C3]' }}">
            <svg class="w-4 h-4 mr-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM11 19.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.22.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
            <span class="{{ request()->is('admin/items') ? 'font-bold' : 'font-semibold' }}">Items</span>
        </a>

        <!-- Accounts Category -->
        <div class="px-6 pt-6 pb-2 text-[11px] font-semibold text-gray-300 uppercase tracking-wider">
            Accounts
        </div>

        <div x-data="{ open: {{ request()->is('admin/users*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
                    class="w-full flex items-center px-6 py-3 text-gray-200 hover:bg-[#2B52C3] transition justify-between focus:outline-none">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    <span class="font-semibold">Users</span>
                </div>
                <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
            </button>

            <div x-show="open" x-transition.opacity.duration.200ms class="bg-[#1A3785]/50 py-2">
                <a href="/admin/users/admin" class="flex items-center pl-14 pr-6 py-2.5 text-sm transition-colors {{ request()->is('admin/users/admin') ? 'text-white font-bold' : 'text-gray-300 hover:text-white' }}">
                    <span class="mr-2.5 w-1.5 h-1.5 bg-gray-400 rounded-full inline-block"></span>
                    Admin
                </a>
                <a href="/admin/users/operator" class="flex items-center pl-14 pr-6 py-2.5 text-sm transition-colors {{ request()->is('admin/users/operator') ? 'text-white font-bold' : 'text-gray-300 hover:text-white' }}">
                    <span class="mr-2.5 w-1.5 h-1.5 bg-gray-400 rounded-full inline-block"></span>
                    Operator
                </a>
            </div>
        </div>

        @elseif(Auth::check() && Auth::user()->role == 'operator')

        <a href="/operator/dashboard" class="flex items-center px-6 py-3.5 transition {{ request()->is('operator/dashboard') ? 'bg-[#2B52C3] border-l-4 border-white text-white' : 'text-gray-200 hover:bg-[#2B52C3]' }}">
            <svg class="w-4 h-4 mr-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z"/></svg>
            <span class="font-bold">Dashboard</span>
        </a>

        <!-- Staff Category -->
        <div class="px-6 pt-6 pb-2 text-[11px] font-semibold text-gray-300 uppercase tracking-wider">
            Menu
        </div>

        <div class="px-6 pt-2 pb-2 text-[11px] font-semibold text-gray-300">
            Items Data
        </div>

        <a href="/operator/items" class="flex items-center px-6 py-3.5 transition {{ request()->is('operator/items') ? 'bg-[#2B52C3] border-l-4 border-white text-white' : 'text-gray-200 hover:bg-[#2B52C3]' }}">
            <!-- Use an icon like pie chart or dashboard graph, similar to the image (which is a pie chart) -->
            <svg class="w-4 h-4 mr-4" fill="currentColor" viewBox="0 0 24 24"><path d="M11 2v20c-5.07-.5-9-4.79-9-10s3.93-9.5 9-10zm2.03 0v8.99H22c-.47-4.74-4.24-8.52-8.97-8.99zm0 11.01V22c4.74-.47 8.5-4.25 8.97-8.99h-8.97z"/></svg>
            <span class="{{ request()->is('operator/items') ? 'font-bold' : 'font-semibold' }}">Items</span>
        </a>

        <a href="/operator/lending" class="flex items-center px-6 py-3.5 transition {{ request()->is('operator/lending') ? 'bg-[#2B52C3] border-l-4 border-white text-white' : 'text-gray-200 hover:bg-[#2B52C3]' }}">
            <!-- Use a sync/refresh/loop icon -->
            <svg class="w-4 h-4 mr-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4V1L8 5l4 4V6c3.31 0 6 2.69 6 6 0 1.01-.25 1.97-.7 2.8l1.46 1.46A7.93 7.93 0 0020 12c0-4.42-3.58-8-8-8zm0 14c-3.31 0-6-2.69-6-6 0-1.01.25-1.97.7-2.8L5.24 7.74A7.93 7.93 0 004 12c0 4.42 3.58 8 8 8v3l4-4-4-4v3z"/></svg>
            <span class="{{ request()->is('operator/lending') ? 'font-bold' : 'font-semibold' }}">Lending</span>
        </a>

        <div x-data="{ open: {{ request()->is('operator/users*') ? 'true' : 'false' }} }">
            <button @click="open = !open"
                    class="w-full flex items-center px-6 py-3 text-gray-200 hover:bg-[#2B52C3] transition justify-between focus:outline-none">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    <span class="font-semibold">Users</span>
                </div>
                <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
            </button>

            <div x-show="open" x-transition.opacity.duration.200ms class="bg-[#1A3785]/50 py-2">
                <a href="/operator/users/edit" class="flex items-center pl-14 pr-6 py-2.5 text-sm transition-colors {{ request()->is('operator/users/edit') ? 'text-white font-bold' : 'text-gray-300 hover:text-white' }}">
                    <span class="mr-2.5 w-1.5 h-1.5 bg-gray-400 rounded-full inline-block"></span>
                    Edit
                </a>
            </div>
        </div>
        @endif
    </nav>
</aside>
