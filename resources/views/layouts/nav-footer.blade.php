<footer class="flex bg-[#EB49A7] w-full p-4 text-white">
    <div>
        <h1 class="text-lg font-bold">{{ Auth::user()->name }}</h1>
        <p>{{ Auth::user()->email }}</p>
    </div>
</footer>
