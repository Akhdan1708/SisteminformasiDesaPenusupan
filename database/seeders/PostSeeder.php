<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
        'title' => 'judul-1',
        'author' => 'Dias',
        'excerpt' => 'Lorem ipsum dolor sit amet consectetur',
        'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium nobis similique eligendi repudiandae incidunt natus nostrum quaerat aperiam, soluta sapiente quis minus perspiciatis fugiat laudantium magni consectetur nesciunt et? Quisquam est ducimus pariatur ullam quam explicabo consequatur cum maxime deserunt doloribus non commodi soluta iste eaque iure aliquam ipsa illum quae maiores, molestiae omnis nisi rerum! Magnam, quasi minima nihil velit eum modi odio illo, id architecto dolorem vel rem iusto. Suscipit ea delectus odit aspernatur adipisci accusantium dolorum dignissimos dicta! Libero nesciunt earum tempore eligendi culpa labore nulla nemo porro deleniti. Totam, nam est. Rerum corporis necessitatibus enim quidem.',
        ];
        Post::insert($posts);

    }
}

