@extends('Landing.layouts.app')
@section('content')
    <section id="slider">
        @include('Landing.slider-home')
    </section>
    <section id="content" class="text-black p-4 font-bold">
        <center>
            <h1 class="font-bold text-black text-3xl m-3">About Us</h1>
        </center>
        <div class="flex justify-center p-[1.3rem]">
            <div class="w-[50%]">
                {{-- <img
                class=""
                src="https://images.unsplash.com/photo-1573332775719-8995fd305918?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""> --}}
                <img src="https://images.unsplash.com/photo-1600267188229-1dd3dd776737?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            </div>
            <div class="w-[50%] p-[1.3rem] text-black">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, aspernatur repellendus atque sint rem eveniet quaerat sapiente quam accusantium incidunt ad voluptate quia perferendis corrupti, expedita quod quidem sequi? Voluptates eaque similique illo ut officia exercitationem beatae sequi sunt ratione optio, magni repellendus incidunt odio sint dolore veritatis perspiciatis a? Optio alias labore odit beatae iusto obcaecati animi ducimus laborum vero quae laboriosam eius vel voluptas, incidunt quis reprehenderit nemo facere maiores nostrum saepe? Fuga tempore natus laudantium, deserunt reprehenderit magnam odio consequatur facere fugit corrupti officia quos mollitia, suscipit iste ex inventore illum eos vitae beatae nemo repellat! Aspernatur.
                </p>
                <br>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium saepe ullam beatae placeat eum, corporis sed voluptates asperiores ea tempore amet consequuntur dignissimos soluta consequatur! Vitae ipsa itaque adipisci perferendis accusamus distinctio sunt deleniti nobis voluptatum tenetur sapiente, excepturi autem.
                </p>
            </div>
        </div>

    </section>
    <br><br>
    <section id="products" style="margin-bottom: 5rem;">
        <center>
            <h1 class="font-bold text-black text-3xl m-3">Jenis Produk</h1>
        </center>
        <div class="flex justify-center gap-4">
            <div class="bg-red-500 p-3 w-[200px]">
                <h1 class="text-white text-xl pb-1">Permen keras</h1>
                <span class="text-xs text-gray-300 pb-3">
                    Permen keras adalah permen yang memiliki jenis keras dan butuh waktu untuk dapat dikunyah
                </span>
                <br><br>

                <a href="#" class="underline underline-offset-4">Lihat permen</a>
            </div>

            <div class="bg-pink-500 p-3 w-[200px]">
                <h1 class="text-white text-xl pb-1">Permen lunak</h1>
                <span class="text-xs text-gray-300 pb-3">
                    Permen lunak adalah permen yang memiliki jenis lunak dan tidak membutuhkan upaya lebih untuk mengunyah
                </span>
                <br><br>

                <a href="#" class="underline underline-offset-4">Lihat permen</a>
            </div>
        </div>
    </section>

    <section id="olshop" style="margin-bottom: 5rem;">
        <center>
            <h1 class="font-bold text-black text-3xl m-3">Our Online shops</h1>
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
        </div>
    </section>

    <section id="location" style="margin-bottom: 5rem;">
        <center>
            <h1 class="font-bold text-black text-3xl m-3">Our Location</h1>
        </center>

        <div class="flex justify-center w-full">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.2711821081934!2d112.49170597412177!3d-7.86666517820967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788784d4c674a1%3A0xdd0c7c98284487e1!2sSonggoriti%20Hot%20Spring!5e0!3m2!1sen!2sid!4v1717813478049!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection
