<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuppliersSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the suppliers table.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'id' => 'MLG1',
            'name' => 'Gudang Malang',
            'city' => 'Malang',
            'address' => 'Malang',
            'bank' => 'BCA',
            'bank_number' => '111122223333',
        ]);

        Supplier::create([
            'id'=> 'SUB1',
            'name'=> 'Gudang Surabaya',
            'city'=> 'Surabaya',
            'address'=> 'Surabaya',
            'bank'=> 'BCA',
            'bank_number'=> '222244446666',
        ]);

        // Add more supplier entries as needed
        // Example:
        // Supplier::create([
        //     'id' => 'SUR2',
        //     'name' => 'Supplier Name',
        //     'city' => 'City Name',
        //     'address' => 'Address',
        //     'bank' => 'Bank Name',
        //     'bank_number' => 'Bank Number',
        // ]);
    }
}
