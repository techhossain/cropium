<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        for ($i = 0; $i < 8; $i++) {

            $posts = [
                'title' => $faker->realText(rand(40, 60)),
                'slug'  => $faker->slug(),
                'feature_image' => $faker->imageUrl(700, 350),
                'excerpt'   => $faker->paragraph(8),
                'content'   => $faker->paragraph(50),
                'user_id'   => $faker->numberBetween(1, 5),
                'category_id' => $faker->numberBetween(1, 10),
                'views'  => $faker->numberBetween(300, 5000),
                'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d h:i:s')
            ];

            DB::table('blogs')->insert($posts);
        }
    }
}
