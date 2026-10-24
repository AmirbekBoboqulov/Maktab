@extends('layouts.adminLayout')
@section('title', __('message.edit_post'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ __('message.edit_post') }}</h4>
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3"><label>{{ __('message.title_uz') }}</label><input name="title_uz" class="form-control" value="{{ old('title_uz', $post->title_uz) }}" required></div>
        <div class="mb-3"><label>{{ __('message.title_ru') }}</label><input name="title_ru" class="form-control" value="{{ old('title_ru', $post->title_ru) }}" required></div>
        <div class="mb-3"><label>{{ __('message.content_uz') }}</label><textarea name="body_uz" class="form-control" required>{{ old('body_uz', $post->body_uz) }}</textarea></div>
        <div class="mb-3"><label>{{ __('message.content_ru') }}</label><textarea name="body_ru" class="form-control" required>{{ old('body_ru', $post->body_ru) }}</textarea></div>
        <div class="mb-3"><label>{{ __('message.image') }}</label><input type="file" name="image" class="form-control"></div>
        <button class="btn btn-primary">{{ __('message.update') }}</button> <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
    </form>
</div>
@endsection
