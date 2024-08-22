<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Support\Str;
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
        $cities = [
            'Jakarta' => 'JKT',
            'Bandung' => 'BDG',
            'Semarang' => 'SMG',
            'Yogyakarta' => 'YGY',
            'Surabaya' => 'SUB',
            'Malang' => 'MLG',
            'Denpasar' => 'DPS',
            'Medan' => 'MDN',
            'Makassar' => 'MKS',
            'Balikpapan' => 'BLP',
            'Banjarmasin' => 'BNJ',
            'Palembang' => 'PLB',
            'Pekanbaru' => 'PKU',
            'Pontianak' => 'PTK',
            'Manado' => 'MND'
        ];

        $banks = ['BCA', 'Mandiri', 'BNI', 'BRI', 'CIMB', 'Permata', 'Danamon'];

        foreach ($cities as $city => $code) {
            Supplier::create([
                'id' => $code . '1', // Menggunakan kode kota dengan angka 1
                'name' => 'Gudang ' . $city,
                'city' => $city,
                'address' => $city,
                'bank' => $banks[array_rand($banks)], // Bank dipilih acak dari array
                'bank_number' => str_pad(rand(0, 999999999999), 12, '0', STR_PAD_LEFT), // Nomor bank acak 12 digit
            ]);
        }
    }
}
