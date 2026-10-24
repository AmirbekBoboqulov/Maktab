@extends('layouts.adminLayout')
@section('title', __('message.category_children'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ $category->name_uz }}</h4>
    <dl><dt>{{ __('message.name_uz_short') }}</dt><dd>{{ $category->name_uz }}</dd><dt>{{ __('message.name_ru_short') }}</dt><dd>{{ $category->name_ru }}</dd><dt>{{ __('message.category') }}</dt><dd>{{ $category->category?->name_uz ?? '-' }}</dd><dt>{{ __('message.url') }}</dt><dd>{{ $category->url }}</dd></dl>
    <a href="{{ route('admin.categorychildren.edit', $category->id) }}" class="btn btn-primary">{{ __('message.edit') }}</a> <a href="{{ route('admin.categorychildren.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
</div>
@endsection
