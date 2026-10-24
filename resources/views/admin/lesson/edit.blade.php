@extends('layouts.adminLayout')
@section('title', __('message.edit_lesson'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ __('message.edit_lesson') }}</h4>
    <form action="{{ route('admin.lesson.update', $lesson->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3"><label>{{ __('message.name_uz_short') }}</label><input name="name_uz" class="form-control" value="{{ old('name_uz', $lesson->name_uz) }}" required></div>
        <div class="mb-3"><label>{{ __('message.name_ru_short') }}</label><input name="name_ru" class="form-control" value="{{ old('name_ru', $lesson->name_ru) }}" required></div>
        <button class="btn btn-primary">{{ __('message.update') }}</button>
        <a href="{{ route('admin.lesson.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
    </form>
</div>
@endsection
