@extends('layouts.adminLayout')
@section('title', __('message.lessons'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ $lesson->name_uz }}</h4>
    <dl><dt>{{ __('message.name_uz_short') }}</dt><dd>{{ $lesson->name_uz }}</dd><dt>{{ __('message.name_ru_short') }}</dt><dd>{{ $lesson->name_ru }}</dd></dl>
    <a href="{{ route('admin.lesson.edit', $lesson->id) }}" class="btn btn-primary">{{ __('message.edit') }}</a>
    <a href="{{ route('admin.lesson.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
</div>
@endsection
