<x-app-layout>
    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: start;
            margin: 20px;
        }
        .button {
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
            border: 1px solid #ccc;
            background-color: #000;
            color: #fff;
            transition: all 0.3s ease;
        }
        .form-container {
            position: relative;
            display: none;
            transition: all 0.3s ease;
        }
        .form-container.active {
            display: block;
        }
        .form {
            display: none;
        }
        .form.active {
            display: inline-block;
        }
        .search-input {
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black space-y-4">

                    <div class="container">
                        <button id="jenisBtn" class="button">Jenis</button>
                        <div id="jenisFormContainer" class="form-container">
                            <form action="">
                                @csrf
                                <div class="flex">
                                    <div class="form-control">
                                        <input type="text" id="jenisSearch" placeholder="Search Jenis..." class="input input-bordered w-24 md:w-auto bg-white border-black focus:border-black" />
                                    </div>
                                    <button type="submit" class="btn btn-black ml-[-10px] rounded-none"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
                                </div>
                            </form>
                        </div>
                        <button id="subJenisBtn" class="button">Sub Jenis</button>
                        <div id="subJenisFormContainer" class="form-container">
                            <form action="">
                                @csrf
                                <div class="flex">
                                    <div class="form-control">
                                        <input type="text" id="subJenisSearch" placeholder="Search Sub Jenis..." class="input input-bordered w-24 md:w-auto bg-white border-black focus:border-black" />
                                    </div>
                                    <button type="submit" class="btn btn-black ml-[-10px] rounded-none"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead class="text-black font-bold text-lg">
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Job</th>
                                <th>Favorite Color</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- row 1 -->
                            <tr>
                                <th>1</th>
                                <td>Cy Ganderton</td>
                                <td>Quality Control Specialist</td>
                                <td>Blue</td>
                            </tr>
                            <!-- row 2 -->
                            <tr>
                                <th>2</th>
                                <td>Hart Hagerty</td>
                                <td>Desktop Support Technician</td>
                                <td>Purple</td>
                            </tr>
                            <!-- row 3 -->
                            <tr>
                                <th>3</th>
                                <td>Brice Swyre</td>
                                <td>Tax Accountant</td>
                                <td>Red</td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const jenisBtn = document.getElementById('jenisBtn');
        const subJenisBtn = document.getElementById('subJenisBtn');
        const jenisFormContainer = document.getElementById('jenisFormContainer');
        const subJenisFormContainer = document.getElementById('subJenisFormContainer');
        const jenisForm = document.getElementById('jenisSearch');
        const subJenisForm = document.getElementById('subJenisSearch');

        jenisBtn.addEventListener('click', function() {
            if (!jenisFormContainer.classList.contains('active')) {
                subJenisFormContainer.classList.remove('active');
                subJenisForm.classList.remove('active');
                subJenisBtn.style.transform = 'translateX(0)';
                subJenisFormContainer.style.width = '0';
            }
            jenisFormContainer.classList.toggle('active');
            jenisForm.classList.toggle('active');
            if (jenisFormContainer.classList.contains('active')) {
                subJenisBtn.style.transform = 'translateX(200px)';
                jenisFormContainer.style.width = '200px';
            } else {
                subJenisBtn.style.transform = 'translateX(0)';
                jenisFormContainer.style.width = '0';
            }
        });

        subJenisBtn.addEventListener('click', function() {
            if (!subJenisFormContainer.classList.contains('active')) {
                jenisFormContainer.classList.remove('active');
                jenisForm.classList.remove('active');
                jenisBtn.style.transform = 'translateX(0)';
                jenisFormContainer.style.width = '0';
            }
            subJenisFormContainer.classList.toggle('active');
            subJenisForm.classList.toggle('active');
            if (subJenisFormContainer.classList.contains('active')) {
                subJenisFormContainer.style.width = '200px';
            } else {
                subJenisFormContainer.style.width = '0';
            }
        });
    </script>
</x-app-layout>
