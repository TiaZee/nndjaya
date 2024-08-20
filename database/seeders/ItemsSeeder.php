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
        $items = [
            [
                'id' => 'ITM0001',
                'name' => 'Candy 1',
                'item_qty' => 0,
                'supp_id' => 'MLG1',
                'buy_price' => 10000.00,
                'sale_price' => 12000.00,
                'item_photo' => 'assets/img/item/seeder/candy1.jpg'
            ],
            [
                'id' => 'ITM0002',
                'name' => 'Candy 2',
                'item_qty' => 0,
                'supp_id' => 'MLG1',
                'buy_price' => 8000.00,
                'sale_price' => 9500.00,
                'item_photo' => 'assets/img/item/seeder/candy2.jpg'
            ],
            [
                'id' => 'ITM0003',
                'name' => 'Candy 3',
                'item_qty' => 0,
                'supp_id' => 'SUB1',
                'buy_price' => 20000.00,
                'sale_price' => 25000.00,
                'item_photo' => 'assets/img/item/seeder/candy3.jpg'
            ],
            [
                'id' => 'ITM0004',
                'name' => 'Candy 4',
                'item_qty' => 0,
                'supp_id' => 'SUB1',
                'buy_price' => 14000.00,
                'sale_price' => 16000.00,
                'item_photo' => 'assets/img/item/seeder/candy4.jpg'
            ],
            [
                'id' => 'ITM0005',
                'name' => 'Candy 5',
                'item_qty' => 0,
                'supp_id' => 'SUB1',
                'buy_price' => 15000.00,
                'sale_price' => 20000.00,
                'item_photo' => 'assets/img/item/seeder/candy5.jpg'
            ],

            // Add more items as needed
        ];

        foreach ($items as $item) {
            Item::updateOrCreate(
                ['id' => $item['id']], // Unique constraint to avoid duplicate entries
                $item
            );
        }
    }
}
