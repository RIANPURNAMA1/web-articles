<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Tambahkan contoh data artikel
        Article::create([
            'title' => 'Article 1',
            'body' => 'Content of Article 1',
            'image' => 'https://www.superprof.com.br/blog/wp-content/uploads/2021/10/programacao-codigos-linguagem.jpg',
        ]);
        Article::create([
            'title' => 'Article 5',
            'body' => 'Content of Article 1',
            'image' => 'https://www.superprof.com.br/blog/wp-content/uploads/2021/10/programacao-codigos-linguagem.jpg',
        ]);
        Article::create([
            'title' => 'Article 14',
            'body' => 'Content of Article 1',
            'image' => 'https://www.superprof.com.br/blog/wp-content/uploads/2021/10/programacao-codigos-linguagem.jpg',
        ]);
        Article::create([
            'title' => 'Article 1234',
            'body' => 'Content of Article 1',
            'image' => 'https://www.superprof.com.br/blog/wp-content/uploads/2021/10/programacao-codigos-linguagem.jpg',
        ]);
        Article::create([
            'title' => 'Article 1RET',
            'body' => 'Content of Article 1',
            'image' => 'https://www.superprof.com.br/blog/wp-content/uploads/2021/10/programacao-codigos-linguagem.jpg',
        ]);
    }
}
