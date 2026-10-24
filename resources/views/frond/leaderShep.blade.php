@extends('admin.site')

@section('content')
<style>
/* === YANGI RAHBARIYAT DIZAYNI === */
body {
    background: #ffffff;
    font-family: 'Inter', sans-serif;
}

.pageTitle {
    font-size: 38px;
    font-weight: 800;
    color: #0f172a;
    text-transform: uppercase;
    margin-bottom: 15px;
}

.breadcrumb {
    background: none;
    padding-left: 0;
    margin-bottom: 30px;
}

.breadcrumb a {
    color: #3b82f6;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

/* --- Direktor kartasi (katta) --- */
.leader-card {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 50px;
    background: #fff;
    padding: 25px 0;
    border-bottom: 1px solid #e5e7eb;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
}

.leader-card:hover {
    transform: translateY(-4px);
}

.leader-card .imgWrap {
    width: 280px;
    height: 340px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
    background: #f3f4f6;
}

.leader-card .imgWrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.leader-card:hover .imgWrap img {
    transform: scale(1.03);
}

.leader-card .details {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.leader-card .name {
    font-size: 28px;
    font-weight: 700;
    color: #111827;
    text-transform: uppercase;
    line-height: 1.4;
    margin-bottom: 12px;
}

.leader-card .line {
    width: 100%;
    height: 1px;
    background-color: #3b82f6;
    margin-bottom: 10px;
}

.leader-card .position {
    font-size: 16px;
    color: #4b5563;
    font-weight: 500;
}

/* --- Qolgan rahbariyat grid ko‘rinishida --- */
.others-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    margin-top: 40px;
}

.other-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    overflow: hidden;
    text-align: center;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
}

.other-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
}

.other-card img {
    width: 100%;
    height: 240px;
    object-fit: cover;
    border-bottom: 1px solid #e5e7eb;
}

.other-card .info {
    padding: 15px;
}

.other-card .info h3 {
    font-size: 18px;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 6px;
}

.other-card .info p {
    font-size: 15px;
    color: #4b5563;
    margin: 0;
}

/* --- Mobil uchun --- */
@media (max-width: 992px) {
    .leader-card {
        flex-direction: column;
        text-align: center;
        gap: 25px;
        padding: 20px 0;
    }

    .leader-card .imgWrap {
        width: 220px;
        height: 260px;
    }

    .others-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .other-card img {
        height: 220px;
    }
}

@media (max-width: 576px) {
    .others-grid {
        grid-template-columns: 1fr;
    }

    .other-card img {
        height: 200px;
    }
}
</style>

<main>
    <section>
        <div class="mainContent withImage">
            <div class="imageHeader" style="padding-bottom: 0px;">
                <div class="container">
                    <h1 class="pageTitle">{{ __('message.leadership') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('message.home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('message.leadership') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section>
            <div class="container">
                @php
                    $director = $teachers->first(fn($teacher) => in_array($teacher->position?->{'name_' . app()->getLocale()}, ['Direktor', 'Директор'], true));
                    $others = $teachers->reject(fn($teacher) => $teacher->is($director));
                @endphp

                {{-- === Direktor === --}}
                @if($director)
                    <a href="{{ route('leaderShep.detail', $director->id) }}" class="leader-card mb-5">
                        <div class="imgWrap">
                            @php
                                $directorImage = $director->image;
                                if (is_string($directorImage) && preg_match('/^https?:\/\//', $directorImage)) {
                                    $directorImageUrl = $directorImage;
                                } elseif (!empty($directorImage) && file_exists(public_path('admin/images/' . $directorImage))) {
                                    $directorImageUrl = asset('admin/images/' . $directorImage);
                                } elseif (!empty($directorImage) && file_exists(public_path('storage/' . $directorImage))) {
                                    $directorImageUrl = asset('storage/' . $directorImage);
                                } else {
                                    $directorImageUrl = asset('images/no-image.png');
                                }
                            @endphp
                            <img src="{{ $directorImageUrl }}" alt="{{ $director['name_' . app()->getLocale()] ?? $director->name }}">
                        </div>
                        <div class="details">
                            <h1 class="name">{{ $director['name_' . app()->getLocale()] ?? $director->name ?? '—' }}</h1>
                            <div class="line"></div>
                            <p class="position">{{ $director->position['name_' . app()->getLocale()] ?? $director->position->name ?? __('message.leadership') }}</p>
                        </div>
                    </a>
                @endif

                {{-- === Qolgan rahbariyat === --}}
                @if($others->isNotEmpty())
                    <div class="others-grid">
                        @foreach($others as $teacher)
                            <a href="{{ route('leaderShep.detail', $teacher->id) }}" class="other-card">
                                @php
                                    $teacherImage = $teacher->image;
                                    if (is_string($teacherImage) && preg_match('/^https?:\/\//', $teacherImage)) {
                                        $teacherImageUrl = $teacherImage;
                                    } elseif (!empty($teacherImage) && file_exists(public_path('admin/images/' . $teacherImage))) {
                                        $teacherImageUrl = asset('admin/images/' . $teacherImage);
                                    } elseif (!empty($teacherImage) && file_exists(public_path('storage/' . $teacherImage))) {
                                        $teacherImageUrl = asset('storage/' . $teacherImage);
                                    } else {
                                        $teacherImageUrl = asset('images/no-image.png');
                                    }
                                @endphp
                                <img src="{{ $teacherImageUrl }}" alt="{{ $teacher['name_' . app()->getLocale()] ?? $teacher->name ?? 'No image' }}">

                                <div class="info">
                                    <h3>{{ $teacher['name_' . app()->getLocale()] ?? $teacher->name ?? '—' }}</h3>
                                    <p>{{ $teacher->position['name_' . app()->getLocale()] ?? $teacher->position->name ?? __('message.leadership') }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info text-center py-5 fs-5 mt-5">
                        {{ __('message.no_leaders') }}
                    </div>
                @endif
            </div>
        </section>
    </section>
</main>
@endsection
