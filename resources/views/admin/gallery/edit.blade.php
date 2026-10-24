@extends('layouts.adminLayout')

@section('title', __('message.edit_gallery'))

@section('content')
<main class="col-md-8 offset-md-2 py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="h5 mb-0">{{ __('message.edit_gallery') }}</h1>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary btn-sm">{{ __('message.back_to_list') }}</a>
        </div>

        <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="title_uz" class="form-label">{{ __('message.title_uz') }}</label>
                    <input id="title_uz" name="title_uz" value="{{ old('title_uz', $gallery->title_uz) }}" class="form-control @error('title_uz') is-invalid @enderror" required>
                    @error('title_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="title_ru" class="form-label">{{ __('message.title_ru') }}</label>
                    <input id="title_ru" name="title_ru" value="{{ old('title_ru', $gallery->title_ru) }}" class="form-control @error('title_ru') is-invalid @enderror" required>
                    @error('title_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">{{ __('message.image') }} ({{ __('message.optional') }})</label>
                    <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/gif,image/webp" class="form-control @error('image') is-invalid @enderror">
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <img src="{{ asset('admin/images/' . $gallery->image) }}" alt="{{ $gallery->title_uz }}" class="img-thumbnail" style="max-width: 220px; max-height: 180px; object-fit: contain;">
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end gap-2">
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-light">{{ __('message.cancel') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('message.save') }}</button>
            </div>
        </form>
    </div>
</main>
@endsection