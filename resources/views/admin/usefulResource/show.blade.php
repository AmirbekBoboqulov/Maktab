@extends('layouts.adminLayout')
@section('title', __('message.useful_resources'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ $usefulResource->title_uz }}</h4>
    <dl><dt>{{ __('message.title_uz') }}</dt><dd>{{ $usefulResource->title_uz }}</dd><dt>{{ __('message.title_ru') }}</dt><dd>{{ $usefulResource->title_ru }}</dd><dt>{{ __('message.content_uz') }}</dt><dd>{{ $usefulResource->body_uz }}</dd><dt>{{ __('message.content_ru') }}</dt><dd>{{ $usefulResource->body_ru }}</dd><dt>{{ __('message.url') }}</dt><dd><a href="{{ $usefulResource->url }}">{{ $usefulResource->url }}</a></dd></dl>
    @if($usefulResource->image)<img src="{{ asset('admin/images/' . $usefulResource->image) }}" alt="{{ __('message.useful_resources') }}" style="max-width:100%">@endif
    <div class="mt-3"><a href="{{ route('admin.usefulResource.edit', $usefulResource->id) }}" class="btn btn-primary">{{ __('message.edit') }}</a> <a href="{{ route('admin.usefulResource.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a></div>
</div>
@endsection
