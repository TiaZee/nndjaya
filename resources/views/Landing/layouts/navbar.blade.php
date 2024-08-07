<div class="navbar bg-[#ffaac4] text-black">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow rounded-box w-52 bg-white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#contact">Contact us</a></li>
            </ul>
        </div>
        <a href="#" class="btn btn-ghost text-xl">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-12 h-12"/>
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a class="font-bold text-[15.5px]" href="#">Home</a></li>
            <li><a class="font-bold text-[15.5px]" href="#">Product</a></li>
            <li><a class="font-bold text-[15.5px]" href="#">About us</a></li>
            <li><a class="font-bold text-[15.5px]" href="#contact">Contact us</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        <a class="btn hidden">Button</a>
    </div>
</div>
