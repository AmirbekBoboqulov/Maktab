@extends('layouts.adminLayout')
@section('title', __('message.edit_infographic'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ __('message.edit_infographic') }}</h4>
    <form action="{{ route('admin.infografika.update', $infoGrafika->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3"><label>{{ __('message.title_uz') }}</label><input name="title_uz" class="form-control" value="{{ old('title_uz', $infoGrafika->title_uz) }}" required></div>
        <div class="mb-3"><label>{{ __('message.title_ru') }}</label><input name="title_ru" class="form-control" value="{{ old('title_ru', $infoGrafika->title_ru) }}" required></div>
        <div class="mb-3"><label>{{ __('message.image') }}</label><input type="file" name="image" class="form-control"></div>
        <button class="btn btn-primary">{{ __('message.update') }}</button>
        <a href="{{ route('admin.infografika.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
    </form>
</div>
@endsection
