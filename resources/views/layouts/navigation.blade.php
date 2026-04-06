<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left -->
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <h2 class="text-lg font-bold">HALCON</h2>
                    </a>
                </div>

                <!-- Links -->
                @auth
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                        Users
                    </x-nav-link>

                    <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.*')">
                        Orders
                    </x-nav-link>

                    <x-nav-link :href="route('archived-orders.index')" :active="request()->routeIs('archived-orders.*')">
                        Archived Orders
                    </x-nav-link>

                </div>
                @endauth
            </div>

            <!-- Right -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                @auth
                <!-- Dropdown usuario -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                ▼
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('dashboard')">
                            Dashboard
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown>
                @endauth

                @guest
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-gray-900">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-gray-900">
                        Register
                    </a>
                </div>
                @endguest

            </div>

            <!-- Mobile menu button -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-gray-400 hover:text-gray-500">
                    ☰
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">

        @auth
        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link :href="route('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('users.index')">
                Users
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('orders.index')">
                Orders
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('archived-orders.index')">
                Archived Orders
            </x-responsive-nav-link>

        </div>

        <!-- Usuario móvil -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}
                </div>
                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth

        @guest
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('login')">
                Login
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('register')">
                Register
            </x-responsive-nav-link>
        </div>
        @endguest

    </div>
</nav>