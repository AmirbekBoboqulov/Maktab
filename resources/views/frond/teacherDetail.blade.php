@extends('admin.site')

@section('content')
<style>
.teacher-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    padding: 40px;
    max-width: 1000px;
    margin: 60px auto;
}
.teacher-photo {
    width: 100%;
    max-width: 300px;
    height: auto;
    border-radius: 6px;
    object-fit: cover;
}
.teacher-info h2 {
    font-weight: 800;
    text-transform: uppercase;
    color: #222;
    margin-bottom: 0;
}
.teacher-info h4 {
    font-weight: 600;
    color: #333;
    margin: 2px 0;
}
.teacher-info h5 {
    font-weight: 500;
    color: #333;
    margin-bottom: 20px;
}
.teacher-subject {
    background: #48A67D;
    color: white;
    font-weight: 700;
    font-size: 17px;
    display: inline-block;
    padding: 8px 20px;
    border-radius: 4px;
    margin-bottom: 30px;
}
.info-item {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
}
.info-item i {
    background: #48A67D;
    color: #fff;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    font-size: 16px;
}
.info-item a, .info-item span {
    color: #333;
    font-size: 15px;
    text-decoration: none;
}
.info-item a:hover {
    color: #48A67D;
}
@media (max-width: 768px) {
    .teacher-card { padding: 25px; }
}
</style>

@php
    $locale = app()->getLocale();
    $teacherName = $teacher->{'name_' . $locale}
        ?? trim(implode(' ', array_filter([
            $teacher->{'lastname_' . $locale} ?? null,
            $teacher->{'firstname_' . $locale} ?? null,
            $teacher->{'middlename_' . $locale} ?? null,
        ], fn ($value) => !empty($value))));
@endphp

<div class="teacher-card">
    <div class="row align-items-center">
        {{-- Chap tomon – rasm --}}
        <div class="col-md-4 text-center mb-4 mb-md-0">
            @php
                $imagePath = $teacher->image && file_exists(public_path('storage/' . $teacher->image))
                    ? asset('storage/' . $teacher->image)
                    : ($teacher->image && file_exists(public_path('admin/images/' . $teacher->image))
                        ? asset('admin/images/' . $teacher->image)
                        : null);
            @endphp

            @if($imagePath && file_exists(public_path(str_replace(asset(''), '', $imagePath))))
                <img src="{{ $imagePath }}" 
                     alt="{{ $teacherName ?? 'Rasm' }}" 
                     class="teacher-photo shadow">
            @else
                 <img src="{{ asset('image/oqtuvchi.png') }}" 
                     alt="O‘qituvchi rasmi"
                     class="teacher-photo shadow">
            @endif
        </div>

        {{-- O‘ng tomon – ma’lumot --}}
        <div class="col-md-8 teacher-info">
            <h2>{{ Str::upper($teacher->{'lastname_' . $locale} ?? ($teacherName ? explode(' ', $teacherName)[0] ?? $teacherName : '')) }}</h2>
            <h4>{{ $teacher->{'firstname_' . $locale} ?? ($teacherName ? trim(str_replace(($teacher->{'lastname_' . $locale} ?? ''), '', $teacherName)) : '') }}</h4>
            <h5>{{ $teacher->{'middlename_' . $locale} ?? '' }}</h5>

            <div class="teacher-subject">
                {{ $teacher->position?->{'name_' . $locale} ?? 'O‘qituvchi' }}
            </div>

          {{-- Ma’lumotlar ro‘yxati --}}
<div class="info-list">
    {{-- O‘qituvchi ismi yoki fan nomi --}}
    @if(!empty($teacherName))
        <div class="info-item">
            <i class="fa-solid fa-user"></i>
            <span>{{ $teacherName }}</span>
        </div>
    @endif

    {{-- Ish vaqti --}}
    @if($teacher->work_time)
        <div class="info-item">
            <i class="fa-regular fa-clock"></i>
            <span>{{ $teacher->work_time }}</span>
        </div>
    @endif

    {{-- Telefon --}}
    @if($teacher->phone)
        <div class="info-item">
            <i class="fa-solid fa-phone"></i>
            <a href="tel:{{ $teacher->phone }}">{{ $teacher->phone }}</a>
        </div>
    @endif

    {{-- Email --}}
    @if($teacher->email)
        <div class="info-item">
            <i class="fa-regular fa-envelope"></i>
            <a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a>
        </div>
    @endif
</div>
        </div>
    </div>
</div>
@endsection
