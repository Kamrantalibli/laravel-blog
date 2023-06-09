<?php

namespace Database\Seeders;

use App\Models\UserLikeArticle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserLikeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLikeArticle::factory(10)->create();
    }
}
