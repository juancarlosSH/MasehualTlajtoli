<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Image;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new Course();
        $course->name = "Nahuatl 1";
        $course->slug = "Nahuatl_1";
        $course->description = "Curso de Náhuatl con vocabulario muy basico para iniciar";
        $course->save();
        $course = new Course();
        $course->name = "Nahuatl 2";
        $course->slug = "Nahuatl_2";
        $course->description = "Curso de Náhuatl con vocabulario intermedio con palabras un poco más especificas";
        $course->save();
        $course = new Course();
        $course->name = "Nahuatl 3";
        $course->slug = "Nahuatl_3";
        $course->description = "Curso de Náhuatl con vocabulario avanzado, contiene vocabulario aun más especifico";
        $course->save();
    }
}
