<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Avanza',
            'Innova',
            'BMW',
            'Supra',
            'MG'
        ];

        foreach ($data as $value) {
            Category::insert([
                'name' => $value
            ]);
        }
    }
}
