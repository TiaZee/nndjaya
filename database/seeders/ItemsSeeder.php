<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $items = [];

        for ($i = 1; $i <= 30; $i++) {
            $id = 'ITM' . str_pad($i, 4, '0', STR_PAD_LEFT);
            $buy_price = rand(5000, 20000); // Harga beli acak antara 5000 dan 20000
            $sale_price = $buy_price + rand(1000, 7000); // Harga jual acak, lebih tinggi dari harga beli
            $supp_id = rand(0, 1) ? 'SUB1' : 'MLG1'; // supp_id acak antara SUB1 dan MLG1

            // Urutkan item_photo antara candy1.jpg sampai candy5.jpg
            $photo_index = ($i - 1) % 5 + 1; // Menghasilkan angka antara 1 dan 5
            $item_photo = 'assets/img/item/seeder/candy' . $photo_index . '.jpg';

            $items[] = [
                'id' => $id,
                'name' => 'Candy ' . $i,
                'item_qty' => 0,
                'supp_id' => $supp_id,
                'buy_price' => (float) $buy_price,
                'sale_price' => (float) $sale_price,
                'item_photo' => $item_photo,
            ];
        }

        foreach ($items as $item) {
            Item::updateOrCreate(
                ['id' => $item['id']], // Unique constraint to avoid duplicate entries
                $item
            );
        }
    }
}
