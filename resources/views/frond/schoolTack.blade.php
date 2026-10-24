@extends('admin.site')
@section('content')
<div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __('message.Maktab vazifalari') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{__('message.home')}}</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ __('message.Maktab vazifalari') }}</li>
                            </ol>
                        </nav>
                                    <div class="container py-4 school-page">
                                        <section class="school-about" aria-labelledby="school-about-title">
                                            <h2 id="school-about-title">{{ __('message.about_school') }}</h2>
                                            <p>{{ __('message.school_intro_one') }}</p>
                                            <p>{{ __('message.school_intro_two') }}</p>
                                        </section>

                                        @php
                                            $classColumns = ['3-A', '2-D', '3-D', '1-A', '1-B', '1-D'];
                                            $timetable = [
                                                'monday' => [
                                                    ['native_language', 'english', 'mathematics', 'mathematics', 'mathematics', 'mathematics'],
                                                    ['reading', 'physical_education', 'reading', 'alphabet', 'alphabet', 'ethics'],
                                                    ['mathematics', 'mathematics', 'native_language', 'writing', 'ethics', 'alphabet'],
                                                    ['russian', 'native_language', 'ethics', 'ethics', 'writing', 'writing'],
                                                    ['ethics', 'russian', 'technology', null, null, null],
                                                ],
                                                'tuesday' => [
                                                    ['natural_science', 'music', 'reading', 'mathematics', 'mathematics', 'mathematics'],
                                                    ['visual_arts', 'mathematics', 'mathematics', 'physical_education', 'music', 'visual_arts'],
                                                    ['mathematics', 'native_language', 'native_language', 'visual_arts', 'alphabet', 'music'],
                                                    ['native_language', 'ethics', 'english', 'music', 'visual_arts', 'writing'],
                                                    ['english', 'informatics', 'natural_science', 'informatics', 'physical_education', 'informatics'],
                                                ],
                                                'wednesday' => [
                                                    ['mathematics', 'english', 'mathematics', 'mathematics', 'mathematics', 'mathematics'],
                                                    ['native_language', 'mathematics', 'russian', 'english', 'alphabet', 'physical_education'],
                                                    ['reading', 'native_language', 'native_language', 'natural_science', 'english', 'writing'],
                                                    ['natural_science', 'reading', 'visual_arts', 'alphabet', 'writing', 'english'],
                                                    ['physical_education', 'visual_arts', 'reading', 'writing', 'natural_science', 'natural_science'],
                                                ],
                                                'thursday' => [
                                                    ['mathematics', 'native_language', 'mathematics', 'mathematics', 'mathematics', 'mathematics'],
                                                    ['russian', 'mathematics', 'natural_science', 'writing', 'alphabet', 'alphabet'],
                                                    ['native_language', 'russian', 'physical_education', 'alphabet', 'technology', 'writing'],
                                                    ['english', 'reading', 'native_language', 'technology', 'writing', 'technology'],
                                                    ['technology', 'technology', 'english', null, null, null],
                                                ],
                                                'friday' => [
                                                    ['class_hour', 'class_hour', 'class_hour', 'class_hour', 'class_hour', 'class_hour'],
                                                    ['mathematics', 'natural_science', 'mathematics', 'mathematics', 'mathematics', 'mathematics'],
                                                    ['music', 'native_language', 'physical_education', 'writing', 'mathematics', 'alphabet'],
                                                    ['physical_education', 'mathematics', 'russian', 'alphabet', 'informatics', 'writing'],
                                                    ['native_language', 'physical_education', 'music', null, null, null],
                                                ],
                                            ];
                                        @endphp

                                        <section class="schedule-panel" aria-labelledby="schedule-title">
                                            <div class="schedule-heading">
                                                <h2 id="schedule-title">{{ __('message.schedule') }}</h2>
                                                <span>{{ __('message.weekly_schedule') }}</span>
                                            </div>
                                            <div class="schedule-scroll">
                                                <table class="schedule-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="period-heading" rowspan="2">№</th>
                                                            <th class="day-heading" rowspan="2">{{ __('message.Kun') }}</th>
                                                            <th class="classes-heading" colspan="{{ count($classColumns) }}">{{ __('message.classes') }}</th>
                                                        </tr>
                                                        <tr>
                                                            @foreach($classColumns as $classColumn)
                                                                <th class="class-heading">{{ $classColumn }}</th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($timetable as $day => $lessons)
                                                            @foreach($lessons as $periodIndex => $subjects)
                                                                <tr class="{{ $periodIndex === 0 ? 'day-start' : '' }}">
                                                                    @if($periodIndex === 0)
                                                                        <th class="day-name" rowspan="{{ count($lessons) }}">{{ __('message.' . $day) }}</th>
                                                                    @endif
                                                                    <th class="period-number">{{ $periodIndex + 1 }}</th>
                                                                    @foreach($subjects as $subject)
                                                                        <td>{{ $subject ? __('message.' . $subject) : '' }}</td>
                                                                    @endforeach
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>

                                        <blockquote class="school-quote">
                                            <p>{{ __('message.YangiOzbekiston') }}</p>
                                            <cite>{{ __('message.president_name') }}</cite>
                                        </blockquote>

                                        <section class="school-history" aria-labelledby="school-history-title">
                                            <h2 id="school-history-title">{{ __('message.school_history') }}</h2>
                                            <p>{{ __('message.school_history_one') }}</p>
                                            <p>{{ __('message.school_history_two') }}</p>
                                        </section>

                                        <section class="school-mission" aria-labelledby="school-mission-title">
                                            <h2 id="school-mission-title">{{ __('message.Funksiya') }}</h2>
                                            <p class="school-mission-intro">{{ __('message.Xalq Talim') }}</p>
                                            <ul>
                                                <li>{{ __('message.Card1') }}</li>
                                                <li>{{ __('message.Card2') }}</li>
                                                <li>{{ __('message.Card3') }}</li>
                                                <li>{{ __('message.Card4') }}</li>
                                                <li>{{ __('message.Card5') }}</li>
                                                <li>{{ __('message.Card6') }}</li>
                                            </ul>
                                        </section>
                                    </div>
                 <li>{{ __("message.Card4") }}</li>
                 <li>{{ __("message.Card5") }}</li>

                            <style>
                                .school-page {
                                    max-width: 1320px;
                                }

                                .school-about {
                                    max-width: 1040px;
                                    margin: 12px auto 36px;
                                    padding-bottom: 24px;
                                    border-bottom: 1px solid #dce3ec;
                                }

                                .school-about h2,
                                .schedule-heading h2,
                                .school-history h2,
                                .school-mission h2 {
                                    margin: 0 0 14px;
                                    color: #14253d;
                                    font-size: 1.55rem;
                                    font-weight: 750;
                                }

                                .school-about p,
                                .school-history p,
                                .school-mission p {
                                    max-width: 1000px;
                                    margin: 0 0 12px;
                                    color: #46566a;
                                    line-height: 1.75;
                                }

                                .schedule-panel {
                                    margin: 0 0 44px;
                                }

                                .schedule-heading {
                                    display: flex;
                                    align-items: baseline;
                                    justify-content: space-between;
                                    gap: 16px;
                                    margin-bottom: 16px;
                                }

                                .schedule-heading h2 {
                                    margin-bottom: 0;
                                }

                                .schedule-heading span {
                                    color: #66758a;
                                    font-size: .9rem;
                                }

                                .schedule-scroll {
                                    width: 100%;
                                    overflow-x: auto;
                                    border: 1px solid #aeb9c8;
                                    background: #fff;
                                    scrollbar-color: #77869a #e9edf2;
                                }

                                .schedule-table {
                                    width: 100%;
                                    min-width: 1040px;
                                    border-collapse: collapse;
                                    table-layout: fixed;
                                    color: #182433;
                                    font-family: Georgia, 'Times New Roman', serif;
                                    font-size: .86rem;
                                    line-height: 1.2;
                                }

                                .schedule-table th,
                                .schedule-table td {
                                    height: 38px;
                                    padding: 6px 8px;
                                    border: 1px solid #9ca8b6;
                                    text-align: center;
                                    vertical-align: middle;
                                    overflow-wrap: anywhere;
                                }

                                .schedule-table thead th {
                                    background: #f1f4f7;
                                    color: #172033;
                                    font-weight: 700;
                                }

                                .schedule-table .period-heading,
                                .schedule-table .period-number {
                                    width: 42px;
                                    background: #f4f6f8;
                                }

                                .schedule-table .day-heading,
                                .schedule-table .day-name {
                                    width: 84px;
                                }

                                .schedule-table .classes-heading {
                                    background: #e8edf3;
                                    text-transform: uppercase;
                                }

                                .schedule-table .class-heading {
                                    width: 145px;
                                }

                                .schedule-table .day-name {
                                    background: #e8eef5;
                                    color: #19365b;
                                    font-weight: 700;
                                    letter-spacing: 0;
                                    writing-mode: vertical-rl;
                                    transform: rotate(180deg);
                                }

                                .schedule-table .period-number {
                                    font-weight: 700;
                                }

                                .schedule-table .day-start > * {
                                    border-top: 4px solid #263f5e;
                                }

                                .schedule-table tbody tr:nth-child(10n + 3),
                                .schedule-table tbody tr:nth-child(10n + 4),
                                .schedule-table tbody tr:nth-child(10n + 5),
                                .schedule-table tbody tr:nth-child(10n + 6),
                                .schedule-table tbody tr:nth-child(10n + 7) {
                                    background: #fbfcfd;
                                }

                                .school-quote {
                                    max-width: 900px;
                                    margin: 0 auto 42px;
                                    padding: 22px 28px;
                                    border-left: 4px solid #2f49cf;
                                    background: #f4f6fa;
                                    color: #22334a;
                                }

                                .school-quote p {
                                    margin: 0 0 8px;
                                    font-size: 1.1rem;
                                }

                                .school-quote cite {
                                    color: #53647a;
                                    font-style: normal;
                                    font-weight: 650;
                                }

                                .school-history,
                                .school-mission {
                                    max-width: 1040px;
                                    margin: 0 auto 36px;
                                }

                                .school-mission-intro {
                                    font-style: italic;
                                }

                                .school-mission ul {
                                    padding-left: 1.25rem;
                                    color: #46566a;
                                    line-height: 1.7;
                                }

                                .school-mission li + li {
                                    margin-top: 8px;
                                }

                                @media (max-width: 767px) {
                                    .schedule-heading {
                                        display: block;
                                    }

                                    .schedule-heading span {
                                        display: block;
                                        margin-top: 5px;
                                    }

                                    .schedule-table {
                                        min-width: 980px;
                                        font-size: .8rem;
                                    }

                                    .schedule-table th,
                                    .schedule-table td {
                                        height: 42px;
                                        padding: 6px;
                                    }

                                    .school-quote {
                                        padding: 18px;
                                    }
                                }
                            </style>
                 <li>{{ __("message.Card6") }}</li>
            </ul>
        </div>
    </section>
</main>

@endsection


<!-- Js -->
