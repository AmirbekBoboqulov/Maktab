@extends('layouts.adminLayout')

@section('title', __('message.edit_homepage_tag'))

@section('content')
<div class="main-content">
    <section class="section">
        <div class="container-fluid">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('message.edit_homepage_tag') }}</span>
                        <a href="{{ route('admin.HomePageImageTag.index') }}" class="btn btn-success btn-sm">{{ __('message.back') }}</a>
                    </h5>

                    <div class="card-body">
                        <form action="{{ route('admin.HomePageImageTag.update', $homePageImageTag->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="title_uz" class="form-label">{{ __('message.title_uz') }}</label>
                                <input type="text" class="form-control @error('title_uz') is-invalid @enderror" id="title_uz" name="title_uz" value="{{ old('title_uz', $homePageImageTag->title_uz) }}">
                                @error('title_uz')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="title_ru" class="form-label">{{ __('message.title_ru') }}</label>
                                <input type="text" class="form-control @error('title_ru') is-invalid @enderror" id="title_ru" name="title_ru" value="{{ old('title_ru', $homePageImageTag->title_ru) }}">
                                @error('title_ru')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="body_uz" class="form-label">{{ __('message.content_uz') }}</label>
                                <textarea class="form-control @error('body_uz') is-invalid @enderror" id="body_uz" name="body_uz" rows="3">{{ old('body_uz', $homePageImageTag->body_uz) }}</textarea>
                                @error('body_uz')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="body_ru" class="form-label">{{ __('message.content_ru') }}</label>
                                <textarea class="form-control @error('body_ru') is-invalid @enderror" id="body_ru" name="body_ru" rows="3">{{ old('body_ru', $homePageImageTag->body_ru) }}</textarea>
                                @error('body_ru')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary" type="submit">{{ __('message.update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
