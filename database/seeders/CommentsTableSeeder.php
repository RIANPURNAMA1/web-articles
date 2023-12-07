<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Tambahkan contoh data komentar
        Comment::create([
            'article_id' => 1, // Sesuaikan dengan ID artikel yang diinginkan
            'comment' => 'Comment on Article 1',
        ]);

        Comment::create([
            'article_id' => 2, // Sesuaikan dengan ID artikel yang diinginkan
            'comment' => 'Comment on Article 2',
        ]);

        // Anda dapat menambahkan lebih banyak data komentar sesuai kebutuhan
    }
}
