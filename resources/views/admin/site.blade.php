<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- Animate css -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font awesome style -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Responsive Style -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <style>
        /* YANGI DIZAYN – CHOTKI, ZAMONAVIY, PROFESSIONAL */
        .langBar {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 18px;
            background: linear-gradient(145deg, #ffffff, #f7f9fc);
            border: 1px solid #d1d9e6;
            border-radius: 50px;
            padding: 8px 22px;
            margin-top: 16px;
            font-size: 15px;
            font-weight: 600;
            box-shadow: 
                0 4px 12px rgba(0, 0, 0, 0.05),
                inset 0 1px 3px rgba(255, 255, 255, 0.8);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        /* Yorqinlik effekti (shimmer) */
        .langBar::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent 30%,
                rgba(255, 255, 255, 0.15) 50%,
                transparent 70%
            );
            transform: rotate(45deg);
            transition: all 0.8s ease;
            z-index: -1;
            opacity: 0;
        }

        .langBar:hover::before {
            animation: shimmer 1.2s ease-in-out;
            opacity: 1;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .langBar:hover {
            transform: translateY(-4px) scale(1.03);
            box-shadow: 
                0 12px 30px rgba(13, 110, 253, 0.18),
                0 4px 12px rgba(0, 0, 0, 0.08);
            border-color: #0d6efd;
        }

        .langBar a,
        .langBar span {
            position: relative;
            text-decoration: none;
            color: #4a5568;
            font-weight: 600;
            padding: 9px 16px;
            border-radius: 50px;
            transition: all 0.3s ease;
            z-index: 2;
            backdrop-filter: blur(4px);
        }

        .langBar a {
            color: #718096;
        }

        .langBar a:hover {
            color: #0d6efd;
            background: rgba(13, 110, 253, 0.1);
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(13, 110, 253, 0.15);
        }

        .langBar span {
            color: #0d6efd;
            font-weight: 700;
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.15), rgba(13, 110, 253, 0.08));
            border: 1.5px solid rgba(13, 110, 253, 0.3);
            box-shadow: 
                0 0 0 0 rgba(13, 110, 253, 0.4),
                inset 0 1px 2px rgba(255, 255, 255, 0.6);
            animation: pulseGlow 2.2s infinite ease-in-out;
        }

        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 
                    0 0 0 0 rgba(13, 110, 253, 0.4),
                    inset 0 1px 2px rgba(255, 255, 255, 0.6);
            }
            50% {
                box-shadow: 
                    0 0 0 10px rgba(13, 110, 253, 0),
                    inset 0 1px 2px rgba(255, 255, 255, 0.6);
            }
        }

        /* Mobil moslashuv */
        @media (max-width: 768px) {
            .langBar {
                gap: 14px;
                padding: 7px 18px;
                font-size: 14.5px;
            }
            .langBar a,
            .langBar span {
                padding: 8px 14px;
            }
        }

        @media (max-width: 480px) {
            .langBar {
                flex-direction: column;
                gap: 10px;
                padding: 12px 16px;
                border-radius: 30px;
            }
            .langBar a,
            .langBar span {
                width: 100%;
                text-align: center;
                padding: 10px;
            }
        }

        .langBar {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-width: 104px;
            height: 42px;
            margin: 0 0 0 12px;
            padding: 4px 12px;
            border: 1px solid rgba(255, 255, 255, 0.45);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.14);
            box-shadow: none;
            transform: none;
            overflow: hidden;
        }

        .langBar:hover {
            transform: none;
            border-color: #57c997;
            background: rgba(255, 255, 255, 0.22);
            box-shadow: none;
        }

        .langBar::before {
            display: none;
        }

        .langBar::after {
            content: '\f078';
            position: absolute;
            right: 10px;
            color: #ffffff;
            font-family: 'Font Awesome 6 Free';
            font-size: 10px;
            font-weight: 900;
            pointer-events: none;
        }

        .langBar i {
            color: #57c997;
            font-size: 14px;
        }

        .langSelect {
            width: 100%;
            padding: 3px 20px 3px 0;
            border: 0;
            outline: 0;
            appearance: none;
            color: #ffffff;
            background: transparent;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        .langSelect option {
            color: #172033;
            background: #ffffff;
        }

        .langSelect:focus-visible {
            box-shadow: 0 0 0 2px rgba(87, 201, 151, 0.65);
            border-radius: 4px;
        }

        @media (max-width: 480px) {
            .langBar {
                flex-direction: row;
                width: 104px;
                min-width: 104px;
                margin: 10px auto 0;
                padding: 4px 12px;
                border-radius: 10px;
            }

            .langSelect {
                width: 100%;
                text-align: left;
            }
        }

        .langBar {
            width: auto;
            min-width: 0;
            height: 40px;
            gap: 3px;
            margin-left: 16px;
            padding: 3px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            overflow: visible;
        }

        .langBar::after,
        .langBar > i {
            display: none;
        }

        .langBar .langOption {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 88px;
            height: 32px;
            padding: 0 12px;
            border: 1px solid transparent;
            border-radius: 7px;
            color: #2450d4;
            background: #ffffff;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            text-decoration: none;
            transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
        }

        .langBar .langOption::after {
            content: attr(data-tooltip);
            position: absolute;
            top: 50%;
            left: calc(100% + 9px);
            z-index: 20;
            width: max-content;
            max-width: 190px;
            padding: 7px 10px;
            border-radius: 6px;
            color: #ffffff;
            background: #172033;
            box-shadow: 0 5px 14px rgba(23, 32, 51, 0.2);
            font-size: 11px;
            font-weight: 500;
            line-height: 1.3;
            opacity: 0;
            pointer-events: none;
            transform: translate(-4px, -50%);
            transition: opacity 0.2s ease, transform 0.2s ease;
        }

        .langBar .langOption::after {
            display: none;
        }

        .langBar .langAlternative {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 0;
            min-width: 0;
            height: 32px;
            padding: 0;
            border: 0;
            border-radius: 7px;
            color: #2450d4;
            background: #ffffff;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            opacity: 0;
            overflow: hidden;
            pointer-events: none;
            text-decoration: none;
            transition: width 0.2s ease, opacity 0.2s ease, padding 0.2s ease;
        }

        .langBar:hover .langAlternative,
        .langBar:focus-within .langAlternative {
            width: 88px;
            padding: 0 12px;
            opacity: 1;
            pointer-events: auto;
        }

        .langBar .langAlternative:hover,
        .langBar .langAlternative:focus-visible {
            color: #17379e;
            background: #eef2ff;
            outline: 0;
        }

        .langBar .langOption:hover::after,
        .langBar .langOption:focus-visible::after {
            opacity: 1;
            transform: translate(0, -50%);
        }

        .langBar .langOption:hover {
            color: #17379e;
            background: #eef2ff;
            transform: none;
        }

        .langBar .langOption.active {
            color: #ffffff;
            background: #2450d4;
            border-color: #5f83ff;
            box-shadow: 0 3px 8px rgba(36, 80, 212, 0.35);
        }

        @media (max-width: 480px) {
            .langBar {
                width: auto;
                margin: 10px auto 0;
                padding: 3px;
            }

            .langBar .langOption {
                min-width: 78px;
                padding: 0 8px;
            }
        }
    </style>
</head>

<body>
    <!-- Header Start -->
    <header>
        <div class="bannerBox">
            <div class="headerBar">
                <div class="topMainMenu">
                            <a href="/" class="topMain-logo">
                        <img src="{{ asset('image/Gerb.png') }}" alt="Logo" width="8%">
                        @if (App::getLocale() == 'uz')
                            <p>23-sonli umumta'lim maktabi</p>
                        @elseif(App::getLocale() == 'ru')
                            <p>23-я общеобразовательная школа</p>
                        @endif
                    </a>
                    <ul>
                        @foreach ($categoryTop as $categorytop)
                            @php
                                $topUrl = trim((string) $categorytop->url);
                                $resolvedTopUrl = preg_match('/^https?:\/\//i', $topUrl)
                                    ? $topUrl
                                    : url($topUrl);
                            @endphp
                            <li>
                                <a href="{{ $resolvedTopUrl }}">{{ $categorytop['name_' . App::getLocale()] }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="additionalFuntions">
                        <form action="{{ route('search.posts') }}" method="GET"
                            class="d-flex align-items-center gap-2" role="search">
                            <div class="input-group" style="max-width: 400px;">
                                <span class="input-group-text bg-white">
                                    <i class="fas fa-eye text-primary"></i>
                                </span>
                                <input type="text" name="query" value="{{ request('query') }}" class="form-control"
                                    aria-label="{{ __('message.search_label') }}">
                            </div>
                            <button type="submit" class="btn btn-primary d-flex align-items-center">
                                <i class="fas fa-search me-1"></i> {{ __('message.Qidirish') }}
                            </button>
                        </form>
                    </div>

                </div>
                <div class="container">
                    <div class="headerMenuBox">
                        <div class="bigMenuBtn">
                            <button type="button" class="borderedBtn">
                                <div class="menuBars"></div>
                            </button>
                            <div class="overlay">
                                <div class="container">
                                    <div class="topLogoGerb">
                                        <img src="{{ asset('image/Gerb.png') }}" alt="Logo" width="13%">
                                    </div>
                                    <div class="listMenu">
                                        <ul>
                                            <li><a href="{{ route('schooltack') }}">{{ __('message.about_school') }}</a>
                                                <ul>
                                                    <li><a href="{{ route('schooltack') }}">{{ __('message.about_school') }}</a></li>
                                                    <li><a href="{{ route('leaderShep') }}">{{ __('message.Mudir') }}</a></li>
                                                    <li><a href="{{ route('teachers') }}">{{ __('message.Oqituvchilar') }}</a></li>
                                                        <li><a href="{{ route('rekvizit') }}">{{ __('message.Rekvizitlar') }}</a></li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="{{ route('education') }}">{{ __("message.Ta'lim") }}</a>
                                                <ul class="dropdown-box">
                                                    @foreach($smenaType as $smena)
                                                        <li>
                                                            <a href="{{ route('education', ['category' => $smena->id]) }}">
                                                                {{ $smena['name_'.app()->getLocale()] }}
                                                            </a>
                                                        </li>
                                                        <hr>
                                                    @endforeach
                                                </ul>
                                            </li>

                                            <li class="overlay_li-social">
                                                <a href="{{ route('schoolNews') }}">{{ __('message.Axborot markazi') }}</a>
                                                <ul>
                                                    <li><a href="{{ route('schoolNews') }}">{{ __('message.Axborot markazi') }}</a></li>
                                                    <li><a href="{{ route('Gallery') }}">{{ __('message.Galeriya') }}</a></li>
                                                    <li><a href="{{ route('infoGrafika') }}">{{ __('message.Infografika') }}</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="simple">
                                            <li><a href="{{ route('connect') }}">{{ __('message.Boglanish') }}</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mainMenuBox">
                            <div class="menuList">
                                <div class="menuLine"></div>
                                <div class="bottomMainMenu">
                                    <ul class="menu">
                                        <li>
                                            <a href="{{ route('schooltack') }}">{{ __('message.about_school') }}</a>
                                            <ul class="menu_ul-li">
                                                <li><a href="{{ route('schooltack') }}">{{ __('message.about_school') }}</a></li>
                                                <hr>
                                                <li><a href="{{ route('leaderShep') }}">{{ __('message.Mudir') }}</a></li>
                                                <hr>
                                                <li><a href="{{ route('teachers') }}">{{ __('message.Oqituvchilar') }}</a></li>
                                                <hr>
                                                <li><a href="{{ route('rekvizit') }}">{{ __('message.Rekvizitlar') }}</a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="{{ route('education') }}">{{ __("message.Ta'lim") }}</a>
                                            <ul class="dropdown-box">
                                                @foreach($smenaType as $smena)
                                                    <li>
                                                        <a href="{{ route('education', ['category' => $smena->id]) }}">
                                                            {{ $smena['name_'.app()->getLocale()] }}
                                                        </a>
                                                    </li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="{{ route('schoolNews') }}">{{ __('message.Axborot markazi') }}</a>
                                            <ul class="menu_ul-li">
                                                <li><a href="{{ route('schoolNews') }}">{{ __('message.Maktab yangiliklari') }}</a></li>
                                                <hr>
                                                <li><a href="{{ route('Gallery') }}">{{ __('message.Galeriya') }}</a></li>
                                                <hr>
                                                <li><a href="{{ route('infoGrafika') }}">{{ __('message.Infografika') }}</a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="{{ route('schoolNews') }}">{{ __('message.Yangiliklar') }}</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('connect') }}">{{ __('message.Boglanish') }}</a>
                                        </li>
                                            <li>
                                            <div class="langBar">
                                                @if (App::getLocale() == 'ru')
                                                    <span class="langOption active">Русский</span>
                                                    <a href="{{ url('/lang/uz') }}" class="langAlternative">O‘zbekcha</a>
                                                @else
                                                    <span class="langOption active">O‘zbekcha</span>
                                                    <a href="{{ url('/lang/ru') }}" class="langAlternative">Русский</a>
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                {{-- DIZAYNI YAXSHILANGAN – HECH NIMA O‘ZGARMADI --}}
                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer">
            <div class="container footer_inner">
                <div class="footer_contact-left">
                    <a href="https://t.me/23_maktab" target="_blank" rel="noopener noreferrer"><i class="fab fa-telegram-plane"></i>
                        <span>Boboyeva Dilafruz</span></a>
                </div>
                <div class="footer_contact-right">
                    <a href="https://www.facebook.com/share/17KBXebyJY/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i>
                        <span>Boboyeva Dilafruz</span></a>
                </div>

                <div class="footer_logo">
                    <span><img src="{{ asset('image/Gerb.png') }}" alt="Logo" width="20%"></span>
                    @if (App::getLocale() == 'uz')
                        <a href="{{ route('index') }}">23-sonli Umumta'lim maktabi <i>Sirdaryo viloyati, Boyovut tumani</i></a>
                    @elseif(App::getLocale() == 'ru')
                        <a href="{{ route('index') }}">Средняя школа № 23 <i>Сырдарьинская область, Бойовутский район</i></a>
                    @endif
                </div>

                

                <span class="year_text">© {{ __('message.2025-2030 Barcha huquqlar himoyalangan') }}</span>
                <span class="year_text">© {{ __('message.creator') }}: Amirbek Boboqulov</span>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('/js/tilt.jquery.js') }}"></script>
    <script src="{{ asset('/js/wow.min.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>

</body> 

</html>