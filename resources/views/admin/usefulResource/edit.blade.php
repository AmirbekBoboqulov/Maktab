@extends('layouts.adminLayout')
@section('title', __('message.edit_resource'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ __('message.edit_resource') }}</h4>
    <form action="{{ route('admin.usefulResource.update', $usefulResource->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @foreach(['title_uz','title_ru'] as $field)<div class="mb-3"><label>{{ strtoupper(str_replace('_', ' ', $field)) }}</label><input name="{{ $field }}" class="form-control" value="{{ old($field, $usefulResource->$field) }}" required></div>@endforeach
        @foreach(['body_uz','body_ru'] as $field)<div class="mb-3"><label>{{ strtoupper(str_replace('_', ' ', $field)) }}</label><textarea name="{{ $field }}" class="form-control" required>{{ old($field, $usefulResource->$field) }}</textarea></div>@endforeach
        <div class="mb-3"><label>{{ __('message.url') }}</label><input type="url" name="url" class="form-control" value="{{ old('url', $usefulResource->url) }}" required></div>
        <div class="mb-3"><label>{{ __('message.image') }}</label><input type="file" name="image" class="form-control"></div>
        <button class="btn btn-primary">{{ __('message.update') }}</button> <a href="{{ route('admin.usefulResource.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
    </form>
</div>
@endsection
