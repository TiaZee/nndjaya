<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@erp.com',
            'password' => bcrypt('12345678'),
            'role' => 'Admin'
        ]);
        $admin->assignRole('Admin');

        $sales = User::create([
            'name' => 'Sales',
            'email' => 'sales@erp.com',
            'password' => bcrypt('12345678'),
            'role' => 'Sales'
        ]);
        $sales->assignRole('Sales');

        $accountant = User::create([
            'name' => 'Accountant',
            'email' => 'acc@erp.com',
            'password' => bcrypt('12345678'),
            'role' => 'Accountant'
        ]);
        $accountant->assignRole('Accountant');
    }
}
