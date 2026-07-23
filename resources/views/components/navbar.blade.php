<!-- Navigation Header -->
<nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Logo & Brand -->
            <div class="flex items-center">
                <a href="/" class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-blue-600 text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-md">
                        E
                    </div>
                    <span class="font-bold text-xl tracking-tight text-gray-900">BDE<span class="text-blue-600">-Events</span></span>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex md:ml-10 md:space-x-8">
                    <a href="/" class="text-gray-900 hover:text-blue-600 font-semibold text-sm inline-flex items-center px-1 pt-1 border-b-2 border-blue-600">Home</a>
                    <a href="/events" class="text-gray-600 hover:text-blue-600 font-medium text-sm inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-blue-600 transition-all duration-300">All Events</a>
                </div>
            </div>

            <div class="hidden md:flex md:items-center md:space-x-4">
                <a href="/login" class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-600 transition-all duration-300">Sign In</a>
                <a href="/register" class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">Get Tickets</a>
         @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 rounded-xl bg-red-500 px-4 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H9m4 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"/>
                    </svg>
                    Logout
                </button>
            </form>
          @endauth
            </div>
               

            <!-- Mobile Hamburger Button -->
            <div class="flex items-center md:hidden">
                <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="p-2 rounded-xl text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-gray-100 px-4 pt-2 pb-4 space-y-2">
        <a href="/" class="block px-3 py-2 rounded-xl font-semibold text-blue-600 bg-blue-50">Home</a>
        <a href="/events" class="block px-3 py-2 rounded-xl font-medium text-gray-600 hover:bg-gray-50">All Events</a>
        <div class="pt-2 border-t border-gray-100 flex flex-col gap-2">
            <a href="/login" class="w-full text-center px-4 py-2 text-sm font-semibold text-gray-700 border border-gray-200 rounded-xl">Sign In</a>
            <a href="/register" class="w-full text-center px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-xl shadow-md">Get Tickets</a>
        </div>
    </div>
</nav>