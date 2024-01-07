<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Fiksi',
                'user_id' => 2,
            ],
            [
                'name' => 'Non Fiksi',
                'user_id' => 2,
            ],
            [
                'name' => 'Genre Buku Lainnya',
                'user_id' => 2,
            ],
        ]);
    }
}
