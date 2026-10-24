@extends('admin.site')



@section('content')

<div class="bigBannerContent" style="background-image: url('image/23-maktab.png');">
    <div class="bannerContent">
        <div class="container-fluid">
            <div class="logoTextBox">
                <div class="quote text-center">
                    <h2>{{ __('message.school_name_short') }}</h2>
                    <p>{{ $HomePageImageTag?->{'body_' . app()->getLocale()} ?: __('message.school_title') }}</p>
                    <span>{{ __('message.president_name') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bigBannerContent {
        min-height: min(760px, 82vh);
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        background-color: rgba(22, 72, 115, 0.35);
    }

    .bigBannerContent::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(22, 72, 115, 0.28);
        z-index: 0;
    }

    .bannerContent {
        width: 100%;
        height: 100%;
        position: relative;
        z-index: 1;
    }

    header .headerMenuBox {
        min-height: 84px;
        gap: 24px;
    }

    

    header .mainMenuBox {
        min-width: 0;
        margin-top: 0;
    }

    header .menuList {
        width: 100%;
        padding-right: 0;
    }

    header .menuLine {
        display: none;
    }

    header .bottomMainMenu {
        padding-right: 0;
    }

    header .menu {
        justify-content: flex-end;
        margin: 0;
        flex-wrap: wrap;
        row-gap: 2px;
    }

    header .menu li a {
        padding: 12px 9px;
        font-size: 16px;
        white-space: nowrap;
    }

    @media (max-width: 992px) {
        header .mainMenuBox {
            display: none;
        }
    }

    .bigBannerContent {
        margin-top: 0;
    }

    .logoTextBox {
        min-height: min(760px, 82vh);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        position: relative;
        z-index: 1;
    }

    .quote {
        color: #fff;
        text-align: center;
        padding: 42px 26px 32px;
        text-shadow: 0 4px 12px rgba(0,0,0,0.55);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: rgba(2, 13, 17, 0.00);
        border: 1px solid rgba(255,255,255,0.00);
        border-radius: 20px;
        backdrop-filter: blur(0px);
        box-shadow: none;
        position: relative;
        z-index: 1;
    }

    .quote h2 {
        font-size: clamp(1.9rem, 2.6vw, 3.8rem);
        line-height: 1.08;
        font-weight: 900;
        letter-spacing: 1px;
        margin: 0;
        text-transform: uppercase;
        text-shadow: 0 4px 16px rgba(0,0,0,0.45);
    }

    .quote p {
        font-size: clamp(1rem, 1.3vw, 1.55rem);
        line-height: 1.45;
        margin: 18px auto 0;
        max-width: 820px;
        font-weight: 500;
        letter-spacing: 0.2px;
    }

    .quote span {
        display: inline-block;
        margin-top: 16px;
        font-size: clamp(0.9rem, 1.1vw, 1.3rem);
        font-weight: 700;
        padding: 7px 18px;
        border-radius: 10px;
        background: rgba(11, 33, 41, 0.22);
        border: 1px solid rgba(255,255,255,0.14);
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.08);
    }

    @media (max-width: 576px) {
        .bigBannerContent,
        .logoTextBox {
            min-height: 540px;
        }

        .quote {
            padding: 36px 18px;
        }

        .quote p br {
            display: none;
        }
    }
</style>

<main>
    <section>
        <div class="container">
            <!-- Service List Start -->
            <div class="mainServicesList">
                <!-- Birinchi blok -->
                <a href="{{ route('education') }}">
                    <div class="icon">
                        <img alt="icon" src="image/oquvchi.png" width="45%" style="margin-left: 60px;">
                    </div>
                    <h1>{{ __('message.Oquvchilar') }}</h1>
                    <div class="description">
                        @foreach($schedule as $schudel)
                            <p>{{ $schudel->week_day }}</p>
                        @endforeach
                    </div>
                    <button type="button">{{ __('message.Batafsil') }}</button>
                </a>
                <!-- Ikkinchi blok -->
                <a href="{{ route('parents') }}">
                    <div class="icon">
                        <img alt="icon" src="image/Ota-ona.png" width="45%" style="margin-left: 75px;">
                    </div>
                    <h1>{{ __('message.OtaOnalar') }}</h1>
                    <div class="description"></div>
                    <button type="button">{{ __('message.Batafsil') }}</button>
                </a>
                <!-- Uchinchi blok -->
                <a href="{{ route('teachers') }}">
                    <div class="icon">
                        <img alt="icon" src="image/oqtuvchi.png" width="45%" style="margin-left: 80px;">
                    </div>
                    <h1>{{ __('message.Oqituvchilar') }}</h1>
                    <div class="description"></div>
                    <button type="button">{{ __('message.Batafsil') }}</button>
                </a>
            </div>
            <!-- Service List End -->

            <!-- School Info Start -->
            @if(isset($statictik) && count($statictik))
    <div class="row">
        <h1 class="text-center text-uppercase mt-5 title">{{ __('message.Maktab Haqida Qisqacha') }}</h1>
        @foreach($statictik as $stat)
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->classesCount }}</h2>
                    <p>{{ __('message.Sinflar Soni') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->studentsCount }}</h2>
                    <p>{{ __('message.O`quvchilar Soni') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->teachersCount }}</h2>
                    <p>{{ __('message.O`qituvchilar Soni') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->graduatesCount }}</h2>
                    <p>{{ __('message.Bituruvchilar Soni') }}</p>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>{{ __('message.no_statistics') }}</p>
@endif
            <!-- School Info End -->

            <hr class="sections__line">

            <!-- Online School Come Start -->
            <div class="onlineSchool">
                <div class="row">
                    <div class="col-lg-6 col-md-12 text-md-center d-md-inline-block d-flex align-items-center">
                        <div class="onlineSchool__info">
                            <h1>{{ __('message.Agar siz maktabgabora olmasangiz,maktab sizning uyingizga borishi mumkin.') }}</h1>
                            <p>{{ __("message.Maktab.uz - bu xalqaro standartlarga javob beradigan va maktab o'quvchilari uchun yuqori sifatli uzluksiz masofaviy ta'limni ta'minlaydigan ilg'or raqamli ta'lim texnologiyasi.") }}</p>
                            <a class="btns" href="{{ route('education') }}">{{ __('message.Batafsil') }}</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="onlineSchool__img">
                            <img src="image/onlineSchool2.png" width="75%" alt="{{ __('message.online_school') }}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Online School Come End -->

            <hr class="sections__line">

            <!-- Section News Start -->
            <div class="news">
                <div class="row g-4">
                    @forelse($posts->take(6) as $post)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('newsDetail', $post->id) }}" class="news-card d-block h-100 text-decoration-none text-dark">
                                <div class="news-card__image">
                                    <img src="{{ $post->image && file_exists(public_path('admin/images/' . $post->image)) ? asset('admin/images/' . $post->image) : asset('admin/images/1747704545.jpg') }}"
                                         alt="{{ $post->{'title_' . app()->getLocale()} ?: __('message.news_fallback') }}">
                                </div>
                                <div class="news-card__content">
                                    <span class="news-card__date">{{ $post->created_at->locale(app()->getLocale())->translatedFormat('d F Y') }}</span>
                                    <h3>{{ $post->{'title_' . app()->getLocale()} ?: __('message.news_fallback') }}</h3>
                                    <p>{{ Str::limit(strip_tags($post->{'body_' . app()->getLocale()}), 120) }}</p>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="news-empty text-center text-muted py-5">
                                {{ __('message.Maʼlumot mavjud emas') }}
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- Section News End -->

            <style>
                .news {
                    margin-top: 20px;
                    margin-bottom: 20px;
                }

                .news-card {
                    background: #fff;
                    border: 1px solid rgba(17, 89, 130, 0.08);
                    border-radius: 18px;
                    overflow: hidden;
                    box-shadow: 0 10px 24px rgba(18, 47, 63, 0.08);
                    transition: transform 0.2s ease, box-shadow 0.2s ease;
                }

                .news-card:hover {
                    transform: translateY(-4px);
                    box-shadow: 0 18px 30px rgba(18, 47, 63, 0.12);
                }

                .news-card__image {
                    height: 220px;
                    overflow: hidden;
                    background: #eef4f8;
                }

                .news-card__image img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    display: block;
                }

                .news-card__content {
                    padding: 20px 18px 22px;
                }

                .news-card__date {
                    display: inline-block;
                    color: #1b6a92;
                    font-size: 12px;
                    font-weight: 700;
                    margin-bottom: 10px;
                    letter-spacing: 0.5px;
                    text-transform: uppercase;
                }

                .news-card__content h3 {
                    font-size: 1.2rem;
                    line-height: 1.4;
                    margin-bottom: 10px;
                    color: #173a4d;
                }

                .news-card__content p {
                    margin: 0;
                    color: #4e5f6b;
                    line-height: 1.6;
                    font-size: 0.98rem;
                }

                .news-empty {
                    width: 100%;
                    min-height: 220px;
                    background: transparent;
                    border: 1px dashed rgba(0, 0, 0, 0.08);
                    border-radius: 12px;
                }

                .platform-mark {
                    width: 100%;
                    max-width: 150px;
                    height: 72px;
                    margin: 0 auto 8px;
                    padding: 10px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 8px;
                    color: #2a3fcc;
                    font-size: 20px;
                    font-weight: 800;
                    text-align: center;
                }

                .platform-mark--1 { background: #e5f4f3; color: #087e8b; }
                .platform-mark--2 { background: #edf1ff; color: #2456a6; }
                .platform-mark--3 { background: #eaf5ee; color: #16834a; }
                .platform-mark--4 { background: #f7eee9; color: #a34c22; }

                .platforms-row {
                    display: grid;
                    grid-template-columns: repeat(4, minmax(0, 1fr));
                    align-items: start;
                    gap: 26px;
                }

                .platforms-row > a {
                    min-width: 0;
                    padding: 16px 14px;
                    border: 1px solid #e5eaf0;
                    border-radius: 10px;
                    background: #fff;
                    text-decoration: none;
                    transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
                }

                .platforms-row > a:hover {
                    border-color: #57c997;
                    box-shadow: 0 8px 20px rgba(42, 63, 204, 0.09);
                    transform: translateY(-3px);
                }

                .platforms-row .slider_content {
                    height: 100%;
                    justify-content: center;
                    gap: 4px;
                }

                .platforms-row .slider_content h1 {
                    min-height: 36px;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #354454;
                    font-size: 15px;
                    line-height: 1.35;
                    text-align: center;
                }

                @media (max-width: 576px) {
                    .platform-mark {
                        font-size: 17px;
                    }
                }

                @media (max-width: 768px) {
                    .platforms-row {
                        grid-template-columns: repeat(2, minmax(0, 1fr));
                        row-gap: 24px;
                    }
                }

            </style>

            <hr class="sections__line mt-0">

            <!--Map Section Start-->
            <div class="mapArea">
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2884.3379539597718!2d68.93631288257193!3d40.42988369253685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38b1f827940c8e03%3A0xb75f83c93484c93e!2sCWJR%2B438%20School%20N23%2C%20Unnamed%20Road%2C%20Boyovut%2C%20Sirdaryo%20viloyati%2C%20Uzbekistan!5e1!3m2!1sen!2s!4v1788356240614!5m2!1sen!2s"
                                width="100%"
                                height="550"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <!--Map Section End-->

            <hr class="sections__line mt-5">

            <!-- Contact Section Start -->
            <div class="contact">
                <h1 class="text-center text-uppercase mb-5">{{ __('message.Biz bilan Boglaning') }}</h1>
                 <div class="row">
                        <div class="col-md-7">
                            <form action="{{ route('SendEmail') }}" method="POST">
                                @csrf
                                <div class="row contact_row1">
                                    <div class="col-lg-6">
                                    <input type="text" placeholder="{{ __('message.I.F.SH') }}" name="name">
                                </div>
                                    <div class="col-lg-6">
                                    <input type="email" placeholder="{{ __('message.Email') }}" name="email">
                                </div>
                                </div>
                                <div class="row contact_row2">
                                     <div class="col-lg-6">
                                    <input type="text"  placeholder="{{ __('message.+998') }}" name="phone">
                                </div>
                                    <div class="col-lg-6">
                                    <input type="text" placeholder="{{ __('message.Mavzu') }}" name="mavzu">
                                </div>
                                </div>
                                <div class="row contact_row3">
                                    <div class="col-12">
                                    <input type="text" placeholder="{{ __('message.Xabarlar') }}" name="message">
                                    <button type="submit" class="contact_btn">{{ __('message.Yuborish') }}</button>
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5">
                            <h2 class="mb-3">{{ __('message.27mak') }}</h2>

                            <table id="w9" class="table table-striped table-bordered detail-view">
                                <tbody>
                                <tr>
                                    <th>{{ __('message.Mudir') }}:</th>
                                    <td>Boboyeva Dilafruz</td>
                                </tr>
                                <tr>
                                    <th>{{ __('message.Telefon') }}:</th>
                                    <td>+998-88-121-68-86</td>
                                </tr>
                                <tr>
                                    <th>{{ __('message.telegram') }}:</th>
                                    <td><a href="https://t.me/23_maktab" target="_blank" rel="noopener">23_maktab</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <!-- Contact Section End -->

            <hr class="sections__line mt-5">

            <!-- Useful Links Start -->
            <div class="usefulLinks">
                <div class="container">
                <h1 class="mb-5">{{ __('message.Foydali resurslar') }}</h1>
                <div class="platforms-row">
                    @forelse($usefulResources as $resource)
                        <a href="{{ url($resource->url) }}" target="_blank" rel="noopener noreferrer">
                            <div class="slider_content">
                                <div class="platform-mark platform-mark--{{ $loop->iteration }}" aria-hidden="true">
                                    {{ ['ZN', 'EP', 'KA', 'CO'][$loop->index] ?? 'EDU' }}
                                </div>
                                <h1>{{ $resource['title_' . app()->getLocale()] }}</h1>
                            </div>
                        </a>
                    @empty
                        <p class="text-muted">{{ __('message.Maʼlumot mavjud emas') }}</p>
                    @endforelse






                </div>

            </div>
            <!-- Useful Links End -->

        </div>
    </section>
</main>

@endsection
