<style>
    .offcanvas-menu {
        transition: transform 0.3s ease-in-out;
        transform: translateX(-100%);
    }
    .offcanvas-menu.open {
        transform: translateX(0);
    }
</style>

@role('Owner')

<nav class="bg-black text-white shadow-md w-full z-10 top-0">
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
        <x-dash-links :href="route('create-user')" :active="request()->routeIs('create-user')">Create User</x-dash-links>
        {{-- <x-dash-links :href="route('inventory')" :active="request()->routeIs('inventory')">Inventory</x-dash-links> --}}
        <x-dash-links :href="route('sales.index')" :active="request()->routeIs('sales.index')">Sales</x-dash-links>
        <x-dash-links :href="route('restocks.index')" :active="request()->routeIs('restocks.index')">Restock</x-dash-links>
        <x-dash-links :href="route('suppliers.index')" :active="request()->routeIs('suppliers.index')">Supplier</x-dash-links>
        <x-dash-links :href="route('items.index')" :active="request()->routeIs('items.index')">Items</x-dash-links>
        <x-dash-links :href="route('acc-analisis.index')" :active="request()->routeIs('acc-analisis.index')">Account Analisis</x-dash-links>
        <x-dash-links :href="route('item-analisis.index')" :active="request()->routeIs('item-analisis.index')">Item Analisis</x-dash-links>
        <x-dash-links>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-black hover:text-white w-full text-start h-full">Logout</button>
            </form>
        </x-dash-link>
    </nav>
</div>

@elserole('Accountant')
<nav class="bg-black text-white shadow-md w-full z-10 top-0">
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
</div>

@elserole('Admin')
<nav class="bg-black text-white shadow-md w-full z-10 top-0">
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
        <x-dash-links :href="route('inventory')" :active="request()->routeIs('inventory')">Inventory</x-dash-links>
        <x-dash-links :href="route('order')" :active="request()->routeIs('order')">Order</x-dash-links>
        <x-dash-links :href="route('procurement')" :active="request()->routeIs('procurement')">Procurement</x-dash-links>
        <x-dash-links>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-black hover:text-white w-full text-start">Logout</button>
            </form>
        </x-dash-link>
    </nav>
</div>
@endrole
