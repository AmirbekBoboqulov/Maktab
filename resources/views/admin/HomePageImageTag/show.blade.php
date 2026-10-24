@extends('layouts.adminLayout')
@section('title', __('message.homepage_tag_list'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ $homePageImageTag->title_uz }}</h4>
    <dl><dt>{{ __('message.title_uz') }}</dt><dd>{{ $homePageImageTag->title_uz }}</dd><dt>{{ __('message.title_ru') }}</dt><dd>{{ $homePageImageTag->title_ru }}</dd><dt>{{ __('message.content_uz') }}</dt><dd>{{ $homePageImageTag->body_uz }}</dd><dt>{{ __('message.content_ru') }}</dt><dd>{{ $homePageImageTag->body_ru }}</dd></dl>
    <a href="{{ route('admin.HomePageImageTag.edit', $homePageImageTag->id) }}" class="btn btn-primary">{{ __('message.edit') }}</a> <a href="{{ route('admin.HomePageImageTag.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
</div>
@endsection
