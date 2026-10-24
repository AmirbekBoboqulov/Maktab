<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Lesson;
use App\Models\Schudeli;
use App\Models\WeeklySchedule;
use Illuminate\Database\Seeder;

class WeeklyScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $days = [
            ['uz' => 'Dushanba', 'ru' => 'Понедельник'],
            ['uz' => 'Seshanba', 'ru' => 'Вторник'],
            ['uz' => 'Chorshanba', 'ru' => 'Среда'],
            ['uz' => 'Payshanba', 'ru' => 'Четверг'],
            ['uz' => 'Juma', 'ru' => 'Пятница'],
        ];

        $subjects = [
            ['name_uz' => 'Matematika', 'name_ru' => 'Математика'],
            ['name_uz' => 'Ona tili', 'name_ru' => 'Родной язык'],
            ['name_uz' => 'Ingliz tili', 'name_ru' => 'Английский язык'],
            ['name_uz' => 'Informatika', 'name_ru' => 'Информатика'],
            ['name_uz' => 'Tarix', 'name_ru' => 'История'],
        ];

        $times = ['08:00', '08:45', '09:30', '10:15', '11:00'];
        $teacher = Employee::where('email', 'madina.raximova@maktab.uz')->first();

        foreach (['5-A', '6-B', '7-A', '8-B'] as $class) {
            $schedule = Schudeli::where('week_day', $class)->first();

            if (!$schedule) {
                continue;
            }

            foreach ($days as $index => $day) {
                $lesson = Lesson::firstOrCreate($subjects[$index]);

                WeeklySchedule::firstOrCreate(
                    [
                        'schedule_id' => $schedule->id,
                        'day_uz' => $day['uz'],
                        'time' => $times[$index],
                    ],
                    [
                        'lesson_id' => $lesson->id,
                        'employee_id' => $teacher?->id,
                        'day_ru' => $day['ru'],
                        'room' => $schedule->room,
                    ]
                );
            }
        }
    }
}
