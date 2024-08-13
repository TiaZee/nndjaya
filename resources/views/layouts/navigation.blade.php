@role('Owner')

<div class="flex">
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 transition-transform transform bg-[#ffaac4] text-white md:translate-x-0 md:relative md:flex md:flex-col md:items-center md:justify-between show">
        <div class="flex flex-col flex-grow w-full">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 gap-2">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-12 h-12"/>
                <h1 class="text-lg font-bold">NN DJAYA SNACK</h1>
            </div>

            <!-- Sidebar Menu -->
            <nav class="flex-grow mt-6">
                <ul>
                    <li>
                        <x-dash-links :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                                Dashboard
                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-user-pen"></i>
                                </div>
                                Profile

                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('users.index')" :active="request()->routeIs('users.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                Users

                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('suppliers.index')" :active="request()->routeIs('suppliers.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-truck-field"></i>
                                </div>
                                Suppliers

                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('items.index')" :active="request()->routeIs('items.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-candy-cane"></i>
                                </div>
                                Items

                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('restocks.index')" :active="request()->routeIs('restocks.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-cubes-stacked"></i>
                                </div>
                                Restocks

                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('sales.index')" :active="request()->routeIs('sales.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-cart-arrow-down"></i>
                                </div>
                                Sales

                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('report.index')" :active="request()->routeIs('report.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                Report

                            </div>
                        </x-dash-links>
                    </li>
                    {{-- <li>
                        <x-dash-links :href="route('acc-analisis.index')" :active="request()->routeIs('acc-analisis.index')">Account Analisis</x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('item-analisis.index')" :active="request()->routeIs('item-analisis.index')">Item Analisis</x-dash-links>
                    </li> --}}
                    <li>
                        <x-dash-links>
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-black hover:text-white w-full text-start">Logout</button>
                                </form>
                            </div>
                        </x-dash-link>
                    </li>
                </ul>
            </nav>
        </div>

        @include('layouts.nav-footer')

    </aside>

    <aside id="sidebar-icons" class="fixed inset-y-0 left-0 z-30 w-[80px] transition-transform transform bg-[#ffaac4] text-white hidden">
        <div class="flex flex-col flex-grow">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-12 h-12"/>
            </div>

            <!-- Sidebar Menu -->
            <nav class="flex-grow mt-6">
                <ul>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Dashboard">
                            <x-dash-links :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                <center>
                                    <i class="fa-solid fa-house"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Profile">
                            <x-dash-links :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                                <center>
                                    <i class="fa-solid fa-user-pen"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Users">
                            <x-dash-links :href="route('users.index')" :active="request()->routeIs('users.index')">
                                <center>
                                    <i class="fa-solid fa-users"></i>
                                </center>
                            </x-dash-links>
                        </div>

                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Suppliers">
                            <x-dash-links :href="route('suppliers.index')" :active="request()->routeIs('suppliers.index')">
                                <center>
                                    <i class="fa-solid fa-truck-field"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Items">
                            <x-dash-links :href="route('items.index')" :active="request()->routeIs('items.index')">
                                <center>
                                    <i class="fa-solid fa-candy-cane"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Restock">
                            <x-dash-links :href="route('restocks.index')" :active="request()->routeIs('restocks.index')">
                                <center>
                                    <i class="fa-solid fa-cubes-stacked"></i>
                                </center>
                            </x-dash-links>

                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Sales">
                            <x-dash-links :href="route('sales.index')" :active="request()->routeIs('sales.index')">
                                <center>
                                    <i class="fa-solid fa-cart-arrow-down"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Report">
                            <x-dash-links :href="route('report.index')" :active="request()->routeIs('report.index')">
                                <center>
                                    <i class="fa-solid fa-book"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Logout">
                            <x-dash-links>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-black hover:text-white w-full text-start flex justify-center">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </button>
                                </form>
                            </x-dash-link>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>

    </aside>

</div>

@elserole('Accountant')
{{-- <nav class="bg-black text-white shadow-md w-full z-10 top-0">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <button id="menu-button" class="focus:outline-none flex items-center text-white">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <i class="fa-solid fa-bars"></i>
                </svg>
            </button>
            <a href="{{ route('dashboard') }}" class="text-xl font-bold">Snack</a>
        </div>
    </div>
</nav>

<div id="offcanvas-menu" class="offcanvas-menu fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-20">
    <div class="flex">
        <div class="flex w-[50%] gap-3 p-5">
            <div class="avatar">
                <div class="w-16 rounded-full">
                    <img src="https://plus.unsplash.com/premium_photo-1703263292341-49d038110af8?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </div>
            </div>
            <div class="flex flex-col pt-3 text-black text-sm">
                <h1>{{ Auth::user()->name }}</h1>
                <p class="text-gray-500">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <div class="flex w-[50%] items-start justify-end p-4">
            <button id="close-button" class="text-gray-800 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    <nav class="flex flex-col p-4">
        <x-dash-links :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-dash-links>
        <x-dash-links :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">Profile</x-dash-links>
        <x-dash-links :href="route('acc-analisis.index')" :active="request()->routeIs('acc-analisis.index')">Account Analisis</x-dash-links>
        <x-dash-links :href="route('item-analisis.index')" :active="request()->routeIs('item-analisis.index')">Item Analisis</x-dash-links>
        <x-dash-links>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-black hover:text-white w-full text-start">Logout</button>
            </form>
        </x-dash-link>
    </nav>
</div> --}}
<div class="flex">
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 transition-transform transform bg-[#ffaac4] text-white md:translate-x-0 md:relative md:flex md:flex-col md:items-center md:justify-between show">
        <div class="flex flex-col flex-grow w-full">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-12 h-12"/>
            </div>

            <!-- Sidebar Menu -->
            <nav class="flex-grow mt-6">
                <ul>
                    <li>
                        <x-dash-links :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                                Dashboard
                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('acc-analisis.index')" :active="request()->routeIs('acc-analisis.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-chart-simple"></i>
                                </div>
                                Account Analisis
                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('item-analisis.index')" :active="request()->routeIs('item-analisis.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-chart-pie"></i>
                                </div>
                                Item Analisis
                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links>
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-black hover:text-white w-full text-start">Logout</button>
                                </form>
                            </div>
                        </x-dash-link>
                    </li>
                </ul>
            </nav>
        </div>

    </aside>

    <aside id="sidebar-icons" class="fixed inset-y-0 left-0 z-30 w-[80px] transition-transform transform bg-[#ffaac4] text-white hidden">
        <div class="flex flex-col flex-grow">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-12 h-12"/>
            </div>

            <!-- Sidebar Menu -->
            <nav class="flex-grow mt-6">
                <ul>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Dashboard">
                            <x-dash-links :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                <center>
                                    <i class="fa-solid fa-house"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Account Analisis">
                            <x-dash-links :href="route('acc-analisis.index')" :active="request()->routeIs('acc-analisis.index')">
                                <center>
                                    <i class="fa-solid fa-chart-simple"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Item Analisis">
                            <x-dash-links :href="route('item-analisis.index')" :active="request()->routeIs('item-analisis.index')">
                                <center>
                                    <i class="fa-solid fa-chart-pie"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Logout">
                            <x-dash-links>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-black hover:text-white w-full text-start flex justify-center">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </button>
                                </form>
                            </x-dash-link>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>

    </aside>
</div>

@elserole('Admin')

<div class="flex">
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 transition-transform transform bg-[#ffaac4] text-white md:translate-x-0 md:relative md:flex md:flex-col md:items-center md:justify-between show">
        <div class="flex flex-col flex-grow w-full">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-12 h-12"/>
            </div>

            <!-- Sidebar Menu -->
            <nav class="flex-grow mt-6">
                <ul>
                    <li>
                        <x-dash-links :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                                Dashboard
                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-user-pen"></i>
                                </div>
                                Profile

                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('suppliers.index')" :active="request()->routeIs('suppliers.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-truck-field"></i>
                                </div>
                                Suppliers

                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('items.index')" :active="request()->routeIs('items.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-candy-cane"></i>
                                </div>
                                Items

                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('restocks.index')" :active="request()->routeIs('restocks.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-cubes-stacked"></i>
                                </div>
                                Restocks

                            </div>
                        </x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('sales.index')" :active="request()->routeIs('sales.index')">
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-cart-arrow-down"></i>
                                </div>
                                Sales

                            </div>
                        </x-dash-links>
                    </li>
                    {{-- <li>
                        <x-dash-links :href="route('acc-analisis.index')" :active="request()->routeIs('acc-analisis.index')">Account Analisis</x-dash-links>
                    </li>
                    <li>
                        <x-dash-links :href="route('item-analisis.index')" :active="request()->routeIs('item-analisis.index')">Item Analisis</x-dash-links>
                    </li> --}}
                    <li>
                        <x-dash-links>
                            <div class="flex">
                                <div class="icons">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-black hover:text-white w-full text-start">Logout</button>
                                </form>
                            </div>
                        </x-dash-link>
                    </li>
                </ul>
            </nav>
        </div>

    </aside>

    <aside id="sidebar-icons" class="fixed inset-y-0 left-0 z-30 w-[80px] transition-transform transform bg-[#ffaac4] text-white hidden">
        <div class="flex flex-col flex-grow">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-12 h-12"/>
            </div>

            <!-- Sidebar Menu -->
            <nav class="flex-grow mt-6">
                <ul>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Dashboard">
                            <x-dash-links :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                <center>
                                    <i class="fa-solid fa-house"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Profile">
                            <x-dash-links :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                                <center>
                                    <i class="fa-solid fa-user-pen"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Suppliers">
                            <x-dash-links :href="route('suppliers.index')" :active="request()->routeIs('suppliers.index')">
                                <center>
                                    <i class="fa-solid fa-truck-field"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Items">
                            <x-dash-links :href="route('items.index')" :active="request()->routeIs('items.index')">
                                <center>
                                    <i class="fa-solid fa-candy-cane"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Restock">
                            <x-dash-links :href="route('restocks.index')" :active="request()->routeIs('restocks.index')">
                                <center>
                                    <i class="fa-solid fa-cubes-stacked"></i>
                                </center>
                            </x-dash-links>

                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Sales">
                            <x-dash-links :href="route('sales.index')" :active="request()->routeIs('sales.index')">
                                <center>
                                    <i class="fa-solid fa-cart-arrow-down"></i>
                                </center>
                            </x-dash-links>
                        </div>
                    </li>
                    <li>
                        <div class="tooltip tooltip-right w-full" data-tip="Logout">
                            <x-dash-links>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-black hover:text-white w-full text-start flex justify-center">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </button>
                                </form>
                            </x-dash-link>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>

    </aside>
</div>
@endrole


