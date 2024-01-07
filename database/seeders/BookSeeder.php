<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('books')->insert([
            'user_id' => 2,
            'title' => 'Judul Buku 1',
            'category_id' => 1,
            'description' => 'Deskripsi buku 1.',
            'quantity' => 10,
            'pdf_path' => '1.pdf',
            'cover_path' => '1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan buku lainnya sesuai kebutuhan
        DB::table('books')->insert([
            'user_id' => 2,
            'title' => 'Judul Buku 2',
            'category_id' => 2,
            'description' => 'Deskripsi buku 2.',
            'quantity' => 15,
            'pdf_path' => 'pdfs/buku2.pdf',
            'cover_path' => 'covers/cover2.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan buku lainnya sesuai kebutuhan
        // ...
    }
}
