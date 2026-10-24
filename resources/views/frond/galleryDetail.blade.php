@extends('admin.site')
@section('content')

<style>
.detailContainer {
    max-width: 900px;
    margin: 60px auto;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    overflow: hidden;
}
.detailImage {
    width: 100%;
    height: 500px;
    object-fit: cover;
    border-bottom: 4px solid #007BFF;
}
.detailBody {
    padding: 30px 40px;
}
.detailBody h2 {
    font-size: 28px;
    font-weight: 700;
    color: #003399;
    margin-bottom: 10px;
}
.detailBody .date {
    font-size: 15px;
    color: #555;
    margin-bottom: 20px;
}
.detailBody p {
    font-size: 16px;
    line-height: 1.7;
    color: #333;
}
.backBtn {
    display: inline-block;
    margin-top: 25px;
    padding: 10px 22px;
    background: #007BFF;
    color: #fff;
    border-radius: 8px;
    transition: 0.3s;
    text-decoration: none;
}
.backBtn:hover {
    background: #0056b3;
}
</style>

<div class="mainContent withImage">
    <div class="container">
        <div class="detailContainer">
            <img src="{{ asset('admin/images/' . $photo->image) }}" alt="{{ $photo['title_' . app()->getLocale()] ?: $photo->title_uz }}" class="detailImage">
            <div class="detailBody">
                <h2>{{ $photo['title_' . app()->getLocale()] ?: $photo->title_uz }}</h2>
                <div class="date">{{ \Carbon\Carbon::parse($photo->created_at)->locale(app()->getLocale())->translatedFormat('d F Y') }}</div>
                <p>{{ $photo['description_' . app()->getLocale()] ?: $photo->description_uz ?: __('message.Maktab galereyasi rasmi haqida maʼlumot mavjud emas') }}</p>
                <a href="{{ route('Gallery') }}" class="backBtn"><i class="fas fa-arrow-left me-2"></i> {{ __('message.Orqaga') }}</a>
            </div>
        </div>
    </div>
</div>

@endsection
