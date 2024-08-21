@extends('Landing.layouts.app')
@section('content')
    <section id="slider">
        @include('Landing.slider-home')
    </section>
    <section id="about" class="text-black p-4 font-bold">
        <center>
            <h1 class="font-bold text-black text-3xl m-3">ABOUT US</h1>
        </center>
        <div class="flex flex-wrap justify-center p-[1.3rem]">
            <div class="lg:w-[50%] w-full">
                <img src="https://images.unsplash.com/photo-1499195333224-3ce974eecb47?q=80&w=1502&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            </div>
            <div class="lg:w-[50%] w-full px-[1.3rem] text-black">
                <h1 class="font-bold text-black text-2xl">Sejarah NN Djaya Snack</h1>
                <br>
                <P class="text-justify">NN Djaya Snack didirikan pada tahun 2022 di Menganti, Gresik. Sebagai perusahaan yang relatif baru, NN Djaya Snack telah berkembang pesat dalam dunia distribusi permen. Berawal dari ide untuk menyediakan produk permen berkualitas tinggi dengan harga yang terjangkau, kami mulai dengan mendistribusikan berbagai macam permen dari produsen besar langsung kepada pelanggan.</P>
                <br>
                <P class="text-justify">Seiring berjalannya waktu, NN Djaya Snack telah menjadi salah satu distributor permen terkemuka di daerah Gresik dan sekitarnya. Keberhasilan ini tidak lepas dari komitmen kami untuk selalu menjaga kualitas produk dan pelayanan, serta memperhatikan kebutuhan dan keinginan konsumen.</P>
                <br>
                <br>
                <h1 class="font-bold text-black text-2xl">Apa itu NN Djaya Snack?</h1>
                <br>
                <p class="text-justify">NN Djaya Snack adalah distributor permen yang menawarkan berbagai macam produk permen dari berbagai merek terkemuka. Kami menyediakan produk dalam jumlah besar maupun kecil, yang memungkinkan pelanggan kami mendapatkan produk sesuai kebutuhan mereka. Dengan jaringan distribusi yang luas, NN Djaya Snack memastikan bahwa produk kami selalu tersedia dan dapat diakses oleh berbagai lapisan masyarakat.</p>
                <br>
                <p class="text-justify">Misi kami adalah memberikan kepuasan kepada konsumen melalui produk-produk berkualitas dengan harga yang kompetitif. Selain itu, kami juga berkomitmen untuk terus berinovasi dan berkembang agar dapat memenuhi kebutuhan pasar yang terus berubah. Dengan pendekatan yang ramah pelanggan, NN Djaya Snack terus berupaya untuk menjadi pilihan utama dalam hal penyediaan permen dan snack di Indonesia.</p>
                <br>
            </div>
        </div>

    </section>
    <br><br>
    <section id="products" style="margin-bottom: 5rem;">
        <center>
            <h1 class="font-bold text-black text-3xl mb-6">PRODUCT</h1>
        </center>
        <!-- Skeleton Loader -->
        <div id="loading-skeleton" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6 p-6">
            <div class="skeleton h-32 w-32"></div>
            <div class="skeleton h-32 w-32"></div>
            <div class="skeleton h-32 w-32"></div>
            <div class="skeleton h-32 w-32"></div>
            <div class="skeleton h-32 w-32"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6 p-6 hidden" id="card-product">
            @foreach ($Items as $item)
            <div class="card bg-white w-full shadow-xl text-black hidden">
                <figure class="px-10 pt-10">
                    <img
                    src="{{ asset($item->item_photo) }}"
                    alt="Shoes"
                    class="rounded-xl w-[100px] h-[100px]" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">{{ $item->name }}</h2>
                    <p class="format-number">{{ $item->sale_price }}</p>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Show More and Show Less Buttons -->
        <div class="text-center mt-4 p-5">
            <button id="show-more" class="show-more w-full"><i class="fa-solid fa-angles-down"></i> Show More</button>
            <button id="show-less" class="show-less hidden w-full"><i class="fa-solid fa-angles-up"></i> Show Less</button>
        </div>
    </section>

    <section id="olshop" style="margin-bottom: 5rem;">
        <center>
            <h1 class="font-bold text-black text-3xl mb-6">CONTACT US</h1>
        </center>
        <div class="flex justify-center gap-2">
            <a href="" class="btn bg-black text-white outline-none border-none">
                <i class="fa-brands fa-tiktok"></i>
                Tiktok Shop
            </a>
            <a href="" class="flex items-center btn bg-gray-300 text-black hover:text-white outline-none border-none">
                <svg class="w-[30px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <path fill="#f4511e" d="M36.683,43H11.317c-2.136,0-3.896-1.679-3.996-3.813l-1.272-27.14C6.022,11.477,6.477,11,7.048,11 h33.904c0.571,0,1.026,0.477,0.999,1.047l-1.272,27.14C40.579,41.321,38.819,43,36.683,43z"></path><path fill="#f4511e" d="M32.5,11.5h-2C30.5,7.364,27.584,4,24,4s-6.5,3.364-6.5,7.5h-2C15.5,6.262,19.313,2,24,2 S32.5,6.262,32.5,11.5z"></path><path fill="#fafafa" d="M24.248,25.688c-2.741-1.002-4.405-1.743-4.405-3.577c0-1.851,1.776-3.195,4.224-3.195 c1.685,0,3.159,0.66,3.888,1.052c0.124,0.067,0.474,0.277,0.672,0.41l0.13,0.087l0.958-1.558l-0.157-0.103 c-0.772-0.521-2.854-1.733-5.49-1.733c-3.459,0-6.067,2.166-6.067,5.039c0,3.257,2.983,4.347,5.615,5.309 c3.07,1.122,4.934,1.975,4.934,4.349c0,1.828-2.067,3.314-4.609,3.314c-2.864,0-5.326-2.105-5.349-2.125l-0.128-0.118l-1.046,1.542 l0.106,0.087c0.712,0.577,3.276,2.458,6.416,2.458c3.619,0,6.454-2.266,6.454-5.158C30.393,27.933,27.128,26.741,24.248,25.688z"></path>
                </svg>
                Shopee
            </a>
            <a href="https://wa.me/+6281223799441" target="_blank" class="flex items-center btn bg-[#4DCB5B] text-white hover:bg-black outline-none border-none">
                <i class="fa-brands fa-whatsapp text-[30px]"></i>
                Whatsapp
            </a>
        </div>
    </section>

    <section id="location" style="margin-bottom: 5rem;">
        <center>
            <h1 class="font-bold text-black text-3xl mb-6">OUR LOCATION</h1>
        </center>

        <center>

            <p class="text-black text-2xl"><i class="fa-solid fa-location-dot text-2xl text-red-500"></i> Perumahan Bukit Cemara Wangi C18A</p>
            <p class="text-black text-2xl">Kel. Hulaan, Kec. Menganti</p>
            <p class="text-black text-2xl">Kabupaten Gresik, Jawa Timur</p>
        </center>
        <br>
        <div class="flex justify-center w-full">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3957.6136654607617!2d112.5815112!3d-7.2847215!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e780771b0e9af2f%3A0x479067d9e61fe9e1!2s&#39;NN&#39;%20DJAYA%20SNACK%20PUSAT%20GROSIR%20SNACK%20IMPORT!5e0!3m2!1sid!2sid!4v1724154844280!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <script>
        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function formatAllNumbers() {
            var elements = document.querySelectorAll('.format-number');
            elements.forEach(function(element) {
                var number = parseInt(element.textContent, 10);
                element.textContent = formatNumber(number);
            });
        }
        window.onload = formatAllNumbers;

        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('#card-product .card');
            const showMoreButton = document.getElementById('show-more');
            const showLessButton = document.getElementById('show-less');

            // Initially show only 5 items
            const initialVisibleItems = 6;
            items.forEach((item, index) => {
                if (index < initialVisibleItems) {
                    item.classList.remove('hidden');
                }
            });

            showMoreButton.addEventListener('click', function () {
                // Show all items
                items.forEach(item => item.classList.remove('hidden'));

                // Hide the Show More button and show the Show Less button
                showMoreButton.classList.add('hidden');
                showLessButton.classList.remove('hidden');
            });

            showLessButton.addEventListener('click', function () {
                // Hide all items except the first 5
                items.forEach((item, index) => {
                    if (index >= initialVisibleItems) {
                        item.classList.add('hidden');
                    }
                });

                // Show the Show More button and hide the Show Less button
                showMoreButton.classList.remove('hidden');
                showLessButton.classList.add('hidden');
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('#card-product .card');
            const showMoreButton = document.getElementById('show-more');
            const showLessButton = document.getElementById('show-less');
            const loadingSkeleton = document.getElementById('loading-skeleton');
            const cardProduct = document.getElementById('card-product');
            const toggleButtons = document.getElementById('toggle-buttons');

            // Simulate data loading
            setTimeout(() => {
                // Hide skeleton and show actual content
                loadingSkeleton.classList.add('hidden');
                cardProduct.classList.remove('hidden');
                toggleButtons.classList.remove('hidden');

                // Initially show only 5 items
                const initialVisibleItems = 5;
                items.forEach((item, index) => {
                    if (index < initialVisibleItems) {
                        item.classList.remove('hidden');
                    }
                });

                showMoreButton.addEventListener('click', function () {
                    // Show all items
                    items.forEach(item => item.classList.remove('hidden'));

                    // Hide the Show More button and show the Show Less button
                    showMoreButton.classList.add('hidden');
                    showLessButton.classList.remove('hidden');
                });

                showLessButton.addEventListener('click', function () {
                    // Hide all items except the first 5
                    items.forEach((item, index) => {
                        if (index >= initialVisibleItems) {
                            item.classList.add('hidden');
                        }
                    });

                    // Show the Show More button and hide the Show Less button
                    showMoreButton.classList.remove('hidden');
                    showLessButton.classList.add('hidden');
                });
            }, 2000); // Simulate a 2-second loading time
        });
    </script>
@endsection
