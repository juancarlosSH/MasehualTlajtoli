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
        $course->description = "Curso de lengua Náhuatl con vocabulario básico para iniciar el aprendizaje";
        $course->save();
        $course = new Course();
        $course->name = "Nahuatl 2";
        $course->slug = "Nahuatl_2";
        $course->description = "Curso de lengua Náhuatl de nivel intermedio que contiene vocabulario más específico";
        $course->save();
        $course = new Course();
        $course->name = "Nahuatl 3";
        $course->slug = "Nahuatl_3";
        $course->description = "Curso de lengua Náhuatl de nivel avanzado, incluye vocabulario de mayor longitud y dificultad de pronunciación";
        $course->save();
        $course = new Course();
        $course->name = "Maya 1";
        $course->slug = "Maya_1";
        $course->description = "Curso de lengua Maya con vocabulario básico para iniciar el aprendizaje";
        $course->save();
        $course = new Course();
        $course->name = "Maya 2";
        $course->slug = "Maya_2";
        $course->description = "Curso de lengua Maya de nivel intermedio que contiene vocabulario mayormente específico";
        $course->save();
        $course = new Course();
        $course->name = "Maya 3";
        $course->slug = "Maya_3";
        $course->description = "Curso de lengua Maya de nivel avanzado, incluye vocabulario de mayor longitud y dificultad de pronunciación";
        $course->save();
    }
}
