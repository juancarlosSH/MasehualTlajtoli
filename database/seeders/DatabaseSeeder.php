<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Course;
use App\Models\Image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Course::factory(10)->has(Activity::factory(10)->has(Image::factory(1)))->create();
    }
}
