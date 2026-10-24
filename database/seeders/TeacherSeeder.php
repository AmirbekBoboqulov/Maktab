<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\empCategory;
use App\Models\Position;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $category = empCategory::firstOrCreate([
            'name_uz' => 'O‘qituvchi',
            'name_ru' => 'Учитель',
        ]);

        $position = Position::firstOrCreate([
            'name_uz' => 'O‘qituvchi',
            'name_ru' => 'Учитель',
        ]);

        Employee::firstOrCreate(
            ['email' => 'madina.raximova@maktab.uz'],
            [
                'name_uz' => 'Raximova Madina',
                'name_ru' => 'Рахимова Мадина',
                'image' => 'default.jpg',
                'phone' => '+998 90 456 78 90',
                'category_id' => $category->id,
                'position_id' => $position->id,
                'work_time' => null,
            ]
        );

        Employee::firstOrCreate(
            ['email' => 'aziza.karimova@maktab.uz'],
            [
                'name_uz' => 'Karimova Aziza',
                'name_ru' => 'Каримова Азиза',
                'image' => 'default.jpg',
                'phone' => '+998 90 123 45 67',
                'category_id' => $category->id,
                'position_id' => $position->id,
                'work_time' => null,
            ]
        );
    }
}
