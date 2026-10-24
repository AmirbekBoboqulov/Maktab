<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\empCategory;
use App\Models\Position;
use Illuminate\Database\Seeder;

class AdditionalLeadershipSeeder extends Seeder
{
    public function run(): void
    {
        $category = empCategory::firstOrCreate([
            'name_uz' => 'Rahbariyat',
            'name_ru' => 'Руководство',
        ]);

        $leaders = [
            [
                'name_uz' => 'Tursunova Mohira',
                'name_ru' => 'Турсунова Мохира',
                'email' => 'mohira.tursunova@maktab.uz',
                'phone' => '+998 90 321 45 67',
                'position_uz' => 'O‘quv ishlari bo‘yicha direktor o‘rinbosari',
                'position_ru' => 'Заместитель директора по учебной работе',
                'image' => '1746963179.jpg',
            ],
            [
                'name_uz' => 'Xolmatov Sardor',
                'name_ru' => 'Холматов Сардор',
                'email' => 'sardor.xolmatov@maktab.uz',
                'phone' => '+998 91 654 32 10',
                'position_uz' => 'Ma’naviy-ma’rifiy ishlar bo‘yicha direktor o‘rinbosari',
                'position_ru' => 'Заместитель директора по духовно-просветительской работе',
                'image' => '1746963190.jpg',
            ],
            [
                'name_uz' => 'Abdullayeva Nilufar',
                'name_ru' => 'Абдуллаева Нилуфар',
                'email' => 'nilufar.abdullayeva@maktab.uz',
                'phone' => '+998 93 789 12 34',
                'position_uz' => 'Metodik birlashmalar rahbari',
                'position_ru' => 'Руководитель методических объединений',
                'image' => '1746967043.jpg',
            ],
            [
                'name_uz' => 'Qodirov Bekzod',
                'name_ru' => 'Кадыров Бекзод',
                'email' => 'bekzod.qodirov@maktab.uz',
                'phone' => '+998 94 246 80 12',
                'position_uz' => 'Xo‘jalik ishlari mudiri',
                'position_ru' => 'Заведующий хозяйством',
                'image' => '1746967050.jpg',
            ],
        ];

        foreach ($leaders as $leader) {
            $position = Position::firstOrCreate([
                'name_uz' => $leader['position_uz'],
                'name_ru' => $leader['position_ru'],
            ]);

            Employee::firstOrCreate(
                ['email' => $leader['email']],
                [
                    'name_uz' => $leader['name_uz'],
                    'name_ru' => $leader['name_ru'],
                    'image' => $leader['image'],
                    'phone' => $leader['phone'],
                    'category_id' => $category->id,
                    'position_id' => $position->id,
                    'work_time' => null,
                ]
            );
        }
    }
}
