<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\empCategory;
use App\Models\Position;
use App\Models\Employee;

class LeaderShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Rahbariyat kategoriyasini yaratish
        $rahbariyatCategory = empCategory::firstOrCreate([
            'name_uz' => 'Rahbariyat',
            'name_ru' => 'Руководство'
        ]);

        // Lavozimlarni yaratish
        $direktorPosition = Position::firstOrCreate([
            'name_uz' => 'Direktor',
            'name_ru' => 'Директор'
        ]);

        $zamDirektorPosition = Position::firstOrCreate([
            'name_uz' => 'Zam direktor',
            'name_ru' => 'Заместитель директора'
        ]);

        $manaviyatchiPosition = Position::firstOrCreate([
            'name_uz' => 'M\'anaviyatchi',
            'name_ru' => 'Духовный наставник'
        ]);

        // Direktor yaratish
        Employee::updateOrCreate(
            ['email' => 'direktor@maktab.uz'],
            [
                'name_uz' => 'Dilafruz Boboyuva',
                'name_ru' => 'Дилафруз Бобоева',
                'phone' => '+998 88 121 68 86',
                'work_time' => '08:00 - 17:00',
                'category_id' => $rahbariyatCategory->id,
                'position_id' => $direktorPosition->id,
                'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=900&q=80'
            ]
        );

        // Zam direktor yaratish
        Employee::updateOrCreate(
            ['email' => 'zam.direktor@maktab.uz'],
            [
                'name_uz' => 'Aripova Umida Djangirovna',
                'name_ru' => 'Арипова Умида Джангировна',
                'phone' => '+998 90 123 45 67',
                'work_time' => '08:00 - 23:00',
                'category_id' => $rahbariyatCategory->id,
                'position_id' => $zamDirektorPosition->id,
                'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=900&q=80'
            ]
        );

        // M'anaviyatchi yaratish
        Employee::updateOrCreate(
            ['email' => 'manaviyatchi@maktab.uz'],
            [
                'name_uz' => 'Karimova Malika',
                'name_ru' => 'Каримова Малика',
                'phone' => '+998 91 234 56 78',
                'work_time' => '09:00 - 15:00',
                'category_id' => $rahbariyatCategory->id,
                'position_id' => $manaviyatchiPosition->id,
                'image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?auto=format&fit=crop&w=900&q=80'
            ]
        );
    }
}
