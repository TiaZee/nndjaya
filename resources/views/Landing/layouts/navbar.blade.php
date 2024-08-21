<div class="navbar bg-[#ffaac4] text-black">
    <div class="flex justify-between w-full">
        <div class="flex justify-start items-center">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </div>

                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[999] p-2 shadow rounded-box w-52 bg-white">
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#products">Product</a></li>
                    <li><a href="#olshop">Contact Us</a></li>
                    <li><a href="#location">Our Location</a></li>
                </ul>
            </div>
            <a href="{{ route('home') }}" class="flex items-center justify-center h-16 gap-2">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-12 h-12"/>
                <h1 class="text-lg font-bold">NN DJAYA SNACK</h1>
            </a>
        </div>
        <div class="hidden lg:flex navbar-center justify-center">
            <ul class="menu menu-horizontal px-1">
                <li><a class="font-bold text-[15.5px]" href="#about">About Us</a></li>
                <li><a class="font-bold text-[15.5px]" href="#products">Product</a></li>
                <li><a class="font-bold text-[15.5px]" href="#olshop">Contact Us</a></li>
                <li><a class="font-bold text-[15.5px]" href="#location">Our Location</a></li>
            </ul>
        </div>
    </div>
</div>
