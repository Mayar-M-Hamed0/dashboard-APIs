<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Auth\App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::create([
            'name' => 'admin',
            'email' => 'admin@help-dot.com',
            'password' => bcrypt('gz3uvN3O7@7@'),
            'phone' => '512121717',
            'phone_whatsapp' => '512121717',
            'profile_image' => 'VaY8Npp6O91Hu71JZvqS9H2fdq2cqOEMEfPIJJhF.jpg',
            'id_number' => '2121236251',
            'id_image' => 'VaY8Npp6O91Hu71JZvqS9H2fdq2cqOEMEfPIJJhF.jpg',
        ]);
    }
}