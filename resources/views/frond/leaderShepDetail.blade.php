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

<div class="teacher-card">
    <div class="row align-items-center">
        {{-- Chap tomon – rasm --}}
        <div class="col-md-4 text-center mb-4 mb-md-0">
            @php
                $imagePath = null;

                if (!empty($leader->image)) {
                    if (preg_match('/^https?:\/\//', $leader->image)) {
                        $imagePath = $leader->image;
                    } elseif (file_exists(public_path('storage/' . $leader->image))) {
                        $imagePath = asset('storage/' . $leader->image);
                    } elseif (file_exists(public_path('admin/images/' . $leader->image))) {
                        $imagePath = asset('admin/images/' . $leader->image);
                    }
                }

                $imagePath = $imagePath ?? asset('images/default-user.png');
            @endphp

            <img src="{{ $imagePath }}" 
                 alt="{{ $leader->{'name_' . app()->getLocale()} ?? 'Rasm' }}" 
                 class="teacher-photo shadow">
        </div>

        {{-- O‘ng tomon – ma’lumot --}}
        <div class="col-md-8 teacher-info">
            <h2>{{ Str::upper($leader->{'lastname_' . app()->getLocale()} ?? '') }}</h2>
            <h4>{{ $leader->{'firstname_' . app()->getLocale()} ?? '' }}</h4>
            <h5>{{ $leader->{'middlename_' . app()->getLocale()} ?? '' }}</h5>

            <div class="teacher-subject">
                {{ $leader->position?->{'name_' . app()->getLocale()} ?? 'O‘qituvchi' }}
            </div>

          {{-- Ma’lumotlar ro‘yxati --}}
<div class="info-list">
    {{-- O‘qituvchi ismi yoki fan nomi --}}
    @if(!empty($leader->{'name_' . app()->getLocale()}))
        <div class="info-item">
            <i class="fa-solid fa-user"></i>
            <span>{{ $leader->{'name_' . app()->getLocale()} }}</span>
        </div>
    @endif

    {{-- Ish vaqti --}}
    @if($leader->work_time)
        <div class="info-item">
            <i class="fa-regular fa-clock"></i>
            <span>{{ $leader->work_time }}</span>
        </div>
    @endif

    {{-- Telefon --}}
    @if($leader->phone)
        <div class="info-item">
            <i class="fa-solid fa-phone"></i>
            <a href="tel:{{ $leader->phone }}">{{ $leader->phone }}</a>
        </div>
    @endif

    {{-- Email --}}
    @if($leader->email)
        <div class="info-item">
            <i class="fa-regular fa-envelope"></i>
            <a href="mailto:{{ $leader->email }}">{{ $leader->email }}</a>
        </div>
    @endif
</div>
        </div>
    </div>
</div>
@endsection
