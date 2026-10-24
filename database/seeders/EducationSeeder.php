<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Schudeli;
use App\Models\SmenaType;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $smena = SmenaType::firstOrCreate([
            'name_uz' => '1-smena',
            'name_ru' => '1-я смена',
        ]);

        $lessons = [
            ['name_uz' => 'Matematika', 'name_ru' => 'Математика'],
            ['name_uz' => 'Ona tili', 'name_ru' => 'Родной язык'],
            ['name_uz' => 'Ingliz tili', 'name_ru' => 'Английский язык'],
            ['name_uz' => 'Informatika', 'name_ru' => 'Информатика'],
        ];

        $schedules = [
            ['class' => '5-A', 'room' => '101', 'time' => '08:00', 'image' => '1746967461.jpg'],
            ['class' => '6-B', 'room' => '203', 'time' => '08:45', 'image' => '1746967547.jpg'],
            ['class' => '7-A', 'room' => '305', 'time' => '09:30', 'image' => '1746968130.jpg'],
            ['class' => '8-B', 'room' => '204', 'time' => '10:15', 'image' => '1746967043.jpg'],
        ];

        foreach ($schedules as $index => $schedule) {
            $lesson = Lesson::firstOrCreate($lessons[$index]);

            Schudeli::firstOrCreate(
                [
                    'smena_id' => $smena->id,
                    'lesson_id' => $lesson->id,
                    'week_day' => $schedule['class'],
                ],
                [
                    'room' => $schedule['room'],
                    'time' => $schedule['time'],
                    'image' => $schedule['image'],
                ]
            );
        }
    }
}
