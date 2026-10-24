@extends('admin.site')

@section('content')

<style>
/* 🔹 Umumiy bo‘lim */
.teachers-section {
    background: #f8f9ff;
    padding: 80px 0;
    font-family: "Poppins", sans-serif;
}

/* 🔹 Grid joylashuvi — 3ta ustun */
.teachers-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 35px;
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 40px;
}

/* 🔹 Har bir karta */
.teacher-card {
    background: #fff;
    border-radius: 20px;
    text-align: center;
    overflow: hidden;
    transition: all 0.35s ease;
    box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);
    border: none;
    position: relative;
}

.teacher-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
}

/* 🔹 Rasm qismi */
.teacher-photo {
    width: 100%;
    height: 330px;
    overflow: hidden;
    background: #f0f2ff;
    display: flex;
    align-items: center;
    justify-content: center;
    border-bottom: 5px solid #004aad;
}

.teacher-photo img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* ✅ rasm butunlay chiqadi, kesilmaydi */
    transition: transform 0.4s ease;
}

.teacher-card:hover .teacher-photo img {
    transform: scale(1.03);
}

/* 🔹 Ma’lumot qismi */
.teacher-info {
    padding: 25px 20px 35px;
    background: #fff;
    position: relative;
}

.teacher-info h3 {
    font-size: 18px;
    font-weight: 700;
    text-transform: uppercase;
    color: #222;
    line-height: 1.4;
    margin-bottom: 10px;
}

.teacher-info .subject {
    font-size: 15px;
    color: #004aad;
    font-weight: 600;
    display: inline-block;
    border-bottom: 2px solid #004aad;
    padding-bottom: 3px;
}

/* 🔹 Hover chiziq */
.teacher-card::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: 0;
    width: 0%;
    height: 4px;
    background: linear-gradient(90deg, #004aad, #00a6ff);
    transition: 0.4s ease;
    border-radius: 0 0 10px 10px;
    transform: translateX(-50%);
}
.teacher-card:hover::after {
    width: 100%;
}

/* 🔹 Responsiv (telefon va planshet) */
@media (max-width: 1200px) {
    .teachers-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .teachers-grid {
        grid-template-columns: 1fr;
        padding: 0 20px;
    }
    .teacher-photo {
        height: 260px;
    }
}
</style>

<div class="mainContent withImage">
    <div class="imageHeader" style="padding-bottom: 0px;">
        <div class="container">
            <h1 class="pageTitle text-dark">{{ __('message.O`qituvchilar') }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('message.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('message.O`qituvchilar') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- 🔹 Asosiy qism -->
<main class="teachers-section">
    <div class="teachers-grid">
        @foreach($teachers as $categoryName => $teachersGroup)
            @foreach($teachersGroup as $teacher)
                <div class="teacher-card">
                    <a href="{{ route('teacher.detail', $teacher->id) }}" 
                       title="{{ $teacher['name_' . app()->getLocale()] }}" 
                       style="text-decoration:none; color:inherit;">
                        <div class="teacher-photo">
                            @if(!empty($teacher->image) && file_exists(public_path('admin/images/' . $teacher->image)))
                                <img src="{{ asset('admin/images/' . $teacher->image) }}" 
                                     alt="{{ $teacher['name_' . app()->getLocale()] }}">
                            @else
                                <img src="{{ asset('image/23-maktab-logo.svg') }}" alt="23-maktab logotipi">
                            @endif
                        </div>
                    </a>

                    <div class="teacher-info">
                        <h3>{{ $teacher['name_' . app()->getLocale()] }}</h3>
                        <div class="subject">
                            {{ $teacher->position['name_' . app()->getLocale()] ?? 'Belgilanmagan' }}
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</main>

@endsection
