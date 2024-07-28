<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order') }}
        </h2>
    </x-slot>

    <style>
        .line{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20%;
            height: 3px;
            background-color: black;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <!-- Open the modal using ID.showModal() method -->
                    <button class="btn text-white" onclick="my_modal_2.showModal()">Create Order</button>
                    <dialog id="my_modal_2" class="modal">
                        <div class="modal-box bg-white text-black">
                            <h3 class="text-lg font-bold">Create Order</h3>
                            <form action="">
                                <div class="form-control">
                                    <label class="label">Sales type</label>
                                    <select name="" id="">
                                        <option value="">Onsite</option>
                                        <option value="">Online</option>
                                    </select>
                                </div>
                                <div class="form-control">
                                    <label class="label">ID Off-TX</label>
                                    <input type="text" name="">
                                </div>
                                <div class="form-control">
                                    <label class="label">Resi Pengiriman</label>
                                    <input type="text" name="">
                                </div>
                                <div class="form-control">
                                    <label class="label">Buyer Name</label>
                                    <input type="text" name="">
                                </div>
                                <div class="form-control">
                                    <label class="label">Buyer Address</label>
                                    <input type="text" name="">
                                </div>
                                <center class="py-6">
                                    <div class="line"></div>
                                </center>
                                <div id="add-more">
                                    <div class="form-control">
                                        <label class="label">Item Type</label>
                                        <select name="" id="">
                                            <option value="">Onsite</option>
                                            <option value="">Online</option>
                                        </select>
                                    </div>
                                    <div class="form-control">
                                        <label class="label">Item Name</label>
                                        <select name="" id="">
                                            <option value="">Item 1</option>
                                            <option value="">Item 2</option>
                                        </select>
                                    </div>
                                    <div class="form-control">
                                        <label class="label">Item Qty</label>
                                        <input type="text" class="numeric-input" inputmode="numeric" name="" />
                                    </div>
                                    <div class="form-control">
                                        <label class="label">Sale Item Price</label>
                                        <div class="flex gap-4 items-center pl-2">
                                            <span class="text-lg font-bold">Rp. </span>
                                            <input disabled type="text" class="numeric-input" inputmode="numeric" name="" />
                                        </div>
                                    </div>
                                </div>
                                <center class="py-6">
                                    <div class="line"></div>
                                </center>
                                
                            </form>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>

                    <div class="overflow-x-auto text-black">
                        <table class="table">
                            <!-- head -->
                            <thead class="bg-black text-white">
                            <tr>
                                <th>#</th>
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
        document.querySelectorAll('.numeric-input').forEach(function(element) {
            element.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>
</x-app-layout>
