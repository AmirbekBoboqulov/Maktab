@extends('layouts.adminLayout')
@section('title', __('message.infographics'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ $infoGrafika->title_uz }}</h4>
    <dl><dt>{{ __('message.title_uz') }}</dt><dd>{{ $infoGrafika->title_uz }}</dd><dt>{{ __('message.title_ru') }}</dt><dd>{{ $infoGrafika->title_ru }}</dd></dl>
    @if($infoGrafika->image)<img src="{{ asset('admin/images/' . $infoGrafika->image) }}" alt="{{ __('message.infographics') }}" style="max-width:100%">@endif
    <div class="mt-3"><a href="{{ route('admin.infografika.edit', $infoGrafika->id) }}" class="btn btn-primary">{{ __('message.edit') }}</a> <a href="{{ route('admin.infografika.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a></div>
</div>
@endsection
