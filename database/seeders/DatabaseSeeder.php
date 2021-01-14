<?php

namespace Database\Seeders;

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
        $this->call(CourseSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(ImageSeeder::class);
        //Course::factory(10)->has(Activity::factory(10)->has(Image::factory(1)))->create();
    }
}
