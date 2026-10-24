<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTopp;
use App\Models\Categorychildren;
use App\Models\Employee;
use App\Models\Gallery;
use App\Models\HomePageImageTag;
use App\Models\InfoGrafika;
use App\Models\Lesson;
use App\Models\ParentInfo;
use App\Models\Position;
use App\Models\Post;
use App\Models\Schudeli;
use App\Models\SmenaType;
use App\Models\Statictik;
use App\Models\UsefulResource;
use App\Models\empCategory;
use Illuminate\Database\Seeder;

class AdminDemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $ensureFour = function (string $model, callable $data): void {
            $missing = max(0, 4 - $model::count());

            for ($index = 0; $index < $missing; $index++) {
                $model::create($data($index));
            }
        };

        $schoolCategories = [
            ['Matematika va informatika', 'Математика и информатика'],
            ['Tabiiy fanlar', 'Естественные науки'],
            ['Gumanitar fanlar', 'Гуманитарные науки'],
            ['Sanat va sport', 'Искусство и спорт'],
        ];

        foreach ($schoolCategories as [$nameUz, $nameRu]) {
            Category::firstOrCreate(
                ['name_uz' => $nameUz],
                ['name_ru' => $nameRu]
            );
        }

        $schoolPositions = [
            ['O‘qituvchi', 'Учитель'],
            ['Dars mudiri', 'Завуч'],
            ['Qo‘riqchi', 'Охранник'],
            ['Ma’naviyat xodimi', 'Моральный наставник'],
        ];

        foreach ($schoolPositions as [$nameUz, $nameRu]) {
            Position::firstOrCreate(
                ['name_uz' => $nameUz],
                ['name_ru' => $nameRu]
            );
        }

        $employeeCategories = [
            ['O‘qituvchilar', 'Педагоги'],
            ['Ma’muriyat', 'Администрация'],
            ['Qo‘riqchilar', 'Охрана'],
            ['Texnik xodimlar', 'Технический персонал'],
        ];

        foreach ($employeeCategories as [$nameUz, $nameRu]) {
            empCategory::firstOrCreate(
                ['name_uz' => $nameUz],
                ['name_ru' => $nameRu]
            );
        }

        $schoolSections = [
            ['Maktab haqida', 'О школе', 'maktab-haqida'],
            ['Ta’lim jarayoni', 'Образовательный процесс', 'talim-jarayoni'],
            ['Yoshlar ishlari', 'Воспитательная работа', 'yoshlar-ishlari'],
            ['Sport va madaniyat', 'Спорт и культура', 'sport-va-madaniyat'],
        ];

        foreach ($schoolSections as [$titleUz, $titleRu, $url]) {
            CategoryTopp::firstOrCreate(
                ['name_uz' => $titleUz],
                ['name_ru' => $titleRu, 'url' => $url]
            );
        }

        $schoolLessons = [
            ['Matematika', 'Математика'],
            ['Fizika', 'Физика'],
            ['Ingliz tili', 'Английский язык'],
            ['Boshlang‘ich sinflar', 'Начальные классы'],
        ];

        foreach ($schoolLessons as [$nameUz, $nameRu]) {
            Lesson::firstOrCreate(
                ['name_uz' => $nameUz],
                ['name_ru' => $nameRu]
            );
        }

        for ($index = 1; $index <= 4; $index++) {
            SmenaType::firstOrCreate(
                ['name_uz' => $index . '-smena'],
                ['name_ru' => $index . '-я смена']
            );
        }

        $category = Category::query()->first();
        $classNames = [
            ['1-sinf', '1 класс'],
            ['2-sinf', '2 класс'],
            ['3-sinf', '3 класс'],
            ['4-sinf', '4 класс'],
        ];

        foreach ($classNames as [$nameUz, $nameRu]) {
            Categorychildren::firstOrCreate(
                ['name_uz' => $nameUz],
                [
                    'name_ru' => $nameRu,
                    'category_id' => $category?->id,
                    'url' => 'uploads/categorychildren/default.jpg',
                ]
            );
        }

        $employeeCategory = empCategory::query()->first();
        $position = Position::query()->first();
        $employeeData = [
            ['Mirzayeva Dilfuza', 'Мирзаева Дильфуза', 'dilfuza.mirzayeva@maktab.uz', '+998 90 111 22 33'],
            ['Sultonova Malika', 'Султанова Маликa', 'malika.sultonova@maktab.uz', '+998 90 222 33 44'],
            ['Tursunov Davron', 'Турсунов Даврон', 'davron.tursunov@maktab.uz', '+998 90 333 44 55'],
            ['Nematova Shaxnoza', 'Нематова Шахноза', 'shaxnoza.nematova@maktab.uz', '+998 90 444 55 66'],
        ];

        foreach ($employeeData as $index => [$nameUz, $nameRu, $email, $phone]) {
            Employee::firstOrCreate(
                ['email' => $email],
                [
                    'name_uz' => $nameUz,
                    'name_ru' => $nameRu,
                    'image' => 'default.jpg',
                    'phone' => $phone,
                    'category_id' => $employeeCategory?->id,
                    'position_id' => $position?->id,
                    'work_time' => '08:00:00',
                ]
            );
        }

        $postData = [
            [
                'title_uz' => 'Maktabimizda yangi ta’lim yili boshlandi',
                'title_ru' => 'В нашей школе начался новый учебный год',
                'body_uz' => 'Maktabimizda yangi ta’lim yili tantanali ravishda boshlandi. O‘quvchilarimiz yangi darsliklar va zamonaviy ta’lim imkoniyatlari bilan tanishdilar.',
                'body_ru' => 'В нашей школе торжественно начался новый учебный год. Ученики познакомились с новыми учебниками и современными возможностями обучения.',
            ],
            [
                'title_uz' => 'Sport bayrami o‘tkazildi',
                'title_ru' => 'Проведен спортивный праздник',
                'body_uz' => 'Maktabimizda sport bayrami bo‘lib o‘tdi, unda o‘quvchilar o‘z salohiyatini namoyon qildilar.',
                'body_ru' => 'В нашей школе прошел спортивный праздник, где учащиеся продемонстрировали свои способности.',
            ],
            [
                'title_uz' => 'O‘qituvchilar uchun seminar tashkil etildi',
                'title_ru' => 'Проведен семинар для учителей',
                'body_uz' => 'O‘qituvchilar uchun zamonaviy pedagogik texnologiyalar bo‘yicha seminar tashkil etildi.',
                'body_ru' => 'Для учителей был организован семинар по современным педагогическим технологиям.',
            ],
            [
                'title_uz' => 'Maktab hududida chiroyli bog‘ yaratildi',
                'title_ru' => 'На территории школы создан красивый сад',
                'body_uz' => 'Maktab hududida yong‘oqqa va yashil maydonlarga e’tibor qaratib, chiroyli bog‘ barpo etildi.',
                'body_ru' => 'На территории школы был создан красивый сад с зелеными зонами и удобными местами для отдыха.',
            ],
        ];

        foreach ($postData as $post) {
            Post::firstOrCreate(
                ['title_uz' => $post['title_uz']],
                [
                    'title_ru' => $post['title_ru'],
                    'image' => 'default.jpg',
                    'body_uz' => $post['body_uz'],
                    'body_ru' => $post['body_ru'],
                ]
            );
        }

        $ensureFour(Statictik::class, fn (int $index) => [
            'classesCount' => 20 + $index,
            'studentsCount' => 400 + ($index * 25),
            'teachersCount' => 35 + $index,
            'graduatesCount' => 50 + ($index * 5),
        ]);

        $galleryData = [
            ['Maktab tadbiri', 'Школьное мероприятие'],
            ['Sport musobaqasi', 'Спортивное соревнование'],
            ['Fan olimpiadasi', 'Олимпиада по предметам'],
            ['Sinf darsi', 'Урок в классе'],
        ];

        foreach ($galleryData as [$titleUz, $titleRu]) {
            Gallery::firstOrCreate(
                ['title_uz' => $titleUz],
                ['image' => 'default.jpg', 'title_ru' => $titleRu]
            );
        }

        $infografikaData = [
            ['Ta’lim ko‘rsatkichlari', 'Показатели образования'],
            ['Maktab faolligi', 'Школьная активность'],
            ['Yutuqlar', 'Достижения'],
            ['O‘quv jarayoni', 'Учебный процесс'],
        ];

        foreach ($infografikaData as [$titleUz, $titleRu]) {
            InfoGrafika::firstOrCreate(
                ['title_uz' => $titleUz],
                ['image' => 'default.jpg', 'title_ru' => $titleRu]
            );
        }

        $smena = SmenaType::query()->first();
        $lesson = Lesson::query()->first();
        $employee = Employee::query()->first();
        $scheduleData = [
            ['1-sinf', '101', '09:00:00'],
            ['2-sinf', '102', '10:00:00'],
            ['3-sinf', '203', '11:00:00'],
            ['4-sinf', '204', '12:00:00'],
        ];

        foreach ($scheduleData as [$weekDay, $room, $time]) {
            Schudeli::firstOrCreate(
                ['week_day' => $weekDay, 'room' => $room],
                [
                    'smena_id' => $smena?->id,
                    'lesson_id' => $lesson?->id,
                    'employee_id' => $employee?->id,
                    'image' => 'default.jpg',
                    'time' => $time,
                ]
            );
        }

        $resourceData = [
            ['ZiyoNET', 'ZiyoNET', 'https://ziyonet.uz', 'O‘zbekiston ta’lim portali: darsliklar, maqolalar va foydali resurslar.', 'Образовательный портал Узбекистана: учебники, статьи и полезные ресурсы.', 'Maktab sayti'],
            ['Eduportal', 'Eduportal', 'https://eduportal.uz', 'Elektron darsliklar va ta’lim materiallari portali.', 'Портал электронных учебников и образовательных материалов.', 'Elektron darsliklar'],
            ['Khan Academy', 'Khan Academy', 'https://uz.khanacademy.org', 'Matematika va boshqa fanlardan bepul onlayn darslar.', 'Бесплатные онлайн-уроки по математике и другим предметам.', 'Ota-onalar uchun'],
            ['Coursera', 'Coursera', 'https://www.coursera.org', 'Turli fanlar bo‘yicha onlayn kurslar va ta’lim dasturlari.', 'Онлайн-курсы и образовательные программы по разным предметам.', 'Ta’lim platformasi'],
        ];

        foreach ($resourceData as [$titleUz, $titleRu, $url, $bodyUz, $bodyRu, $legacyTitle]) {
            $resource = UsefulResource::where('title_uz', $titleUz)->first()
                ?? UsefulResource::where('title_uz', $legacyTitle)->first()
                ?? new UsefulResource();

            $resource->fill([
                'image' => 'default.jpg',
                'title_uz' => $titleUz,
                'title_ru' => $titleRu,
                'body_uz' => $bodyUz,
                'body_ru' => $bodyRu,
                'url' => $url,
            ])->save();
        }

        $homePageData = [
            ['Maktabga xush kelibsiz', 'Добро пожаловать в школу', 'Yangi ta’lim yilida zamonaviy va qulay muhit yaratilmoqda.', 'В новом учебном году создается современная и комфортная среда.'],
            ['Ta’lim sifatini oshirish', 'Повышение качества образования', 'O‘qituvchilar bilan ishlash, dars sifatini yaxshilash ustida davom etmoqda.', 'Продолжается работа по повышению качества преподавания и взаимодействия с учителями.'],
            ['Yoshlar salohiyati', 'Потенциал молодежи', 'Talabalar va o‘quvchilar salohiyatini rivojlantirishga e’tibor qaratiladi.', 'Внимание уделяется развитию потенциала студентов и школьников.'],
            ['Kreativ muhit', 'Творческая среда', 'Maktabimizda ijodiy va sport faoliyatlari rivojlanmoqda.', 'В нашей школе развиваются творческая и спортивная деятельность.'],
        ];

        foreach ($homePageData as [$titleUz, $titleRu, $bodyUz, $bodyRu]) {
            HomePageImageTag::firstOrCreate(
                ['title_uz' => $titleUz],
                [
                    'title_ru' => $titleRu,
                    'body_uz' => $bodyUz,
                    'body_ru' => $bodyRu,
                ]
            );
        }

        $parentInfoData = [
            ['O‘quvchilar uchun me’yorlar', 'Правила для учеников', 'O‘quvchilar maktab ichidagi qoidalar va odob-axloq me’yorlariga rioya qilishlari kerak.', 'Ученики должны соблюдать школьные правила и нормы поведения.'],
            ['Ota-onalar bilan aloqalar', 'Взаимодействие с родителями', 'Ota-onalar bilan muntazam hamkorlik va ma’lumot almashish yo‘lga qo‘yiladi.', 'Поддерживается постоянное взаимодействие и обмен информацией с родителями.'],
            ['Konsultatsiyalar', 'Консультации', 'Ota-onalar uchun ma’ruzalar va maslahatlar o‘tkaziladi.', 'Для родителей проводятся консультации и встречи.'],
            ['Kelishuv va monitoring', 'Согласование и мониторинг', 'Talabalar yutug‘i va rivojlanishi monitoringga olib boriladi.', 'Отслеживается успеваемость и развитие учащихся.'],
        ];

        foreach ($parentInfoData as [$titleUz, $titleRu, $bodyUz, $bodyRu]) {
            ParentInfo::firstOrCreate(
                ['title_uz' => $titleUz],
                [
                    'title_ru' => $titleRu,
                    'body_uz' => $bodyUz,
                    'body_ru' => $bodyRu,
                ]
            );
        }
    }
}