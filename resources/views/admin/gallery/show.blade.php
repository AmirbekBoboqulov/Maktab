@extends('layouts.adminLayout')

@section('title', __('message.gallery'))

@section('content')
<main class="col-md-8 offset-md-2 py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="h5 mb-0">{{ __('message.gallery') }}</h1>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary btn-sm">{{ __('message.back_to_list') }}</a>
        </div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">{{ __('message.title_uz') }}</dt>
                <dd class="col-sm-9">{{ $gallery->title_uz }}</dd>
                <dt class="col-sm-3">{{ __('message.title_ru') }}</dt>
                <dd class="col-sm-9">{{ $gallery->title_ru }}</dd>
                <dt class="col-sm-3">{{ __('message.image') }}</dt>
                <dd class="col-sm-9">
                    <img src="{{ asset('admin/images/' . $gallery->image) }}" alt="{{ $gallery->title_uz }}" class="img-thumbnail" style="max-width: 360px; max-height: 280px; object-fit: contain;">
                </dd>
            </dl>
        </div>
        <div class="card-footer d-flex justify-content-end gap-2">
            <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn btn-primary">{{ __('message.edit') }}</a>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-light">{{ __('message.back_to_list') }}</a>
        </div>
    </div>
</main>
@endsection