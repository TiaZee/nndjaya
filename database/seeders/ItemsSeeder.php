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
                'name' => 'Beras',
                'item_qty' => 0,
                'supp_id' => 'MLG1',
                'buy_price' => 10000.00,
                'sale_price' => 10000.00,

            ],
            [
                'id' => 'ITM0002',
                'name' => 'Jagung',
                'item_qty' => 0,
                'supp_id' => 'MLG1',
                'buy_price' => 8000.00,
                'sale_price' => 9500.00,

            ],
            [
                'id' => 'ITM0003',
                'name' => 'Jamu',
                'item_qty' => 0,
                'supp_id' => 'SUB1',
                'buy_price' => 20000.00,
                'sale_price' => 25000.00,

            ],
            [
                'id' => 'ITM0004',
                'name' => 'Permen',
                'item_qty' => 0,
                'supp_id' => 'SUB1',
                'buy_price' => 14000.00,
                'sale_price' => 16000.00,

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
