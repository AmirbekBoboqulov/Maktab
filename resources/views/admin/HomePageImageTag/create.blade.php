@extends('layouts.adminLayout')

@section('title', __('message.create_homepage_tag'))

@section('content')
<div class="main-content">
    <section class="section">
        <div class="container-fluid">
            <style>
                .main-content {
                    margin-left: 250px; /* Sidebar kengligi bilan mos bo‘lishi kerak */
                    padding: 20px;
                }

                .card {
                    border-radius: 15px;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                }

                .form-label {
                    font-weight: 600;
                }

                .btn {
                    margin-top: 10px;
                }
            </style>

            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        <span>🆕 {{ __('message.create_homepage_tag_full') }}</span>
                        <a href="{{ route('admin.HomePageImageTag.index') }}" class="btn btn-success btn-sm">{{ __('message.back') }}</a>
                    </h5>

                    <div class="card-body">
                        <form action="{{ route('admin.HomePageImageTag.store') }}" method="POST">
                            @csrf

                            {{-- Title UZ --}}
                            <div class="mb-4">
                                <label for="title_uz" class="form-label">{{ __('message.title_uz') }}</label>
                                <input type="text"
                                       class="form-control @error('title_uz') is-invalid @enderror"
                                       id="title_uz"
                                       placeholder="{{ __('message.enter_title_uz') }}"
                                       name="title_uz"
                                       value="{{ old('title_uz') }}">
                                @error('title_uz')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Title RU --}}
                            <div class="mb-4">
                                <label for="title_ru" class="form-label">{{ __('message.title_ru') }}</label>
                                <input type="text"
                                       class="form-control @error('title_ru') is-invalid @enderror"
                                       id="title_ru"
                                       placeholder="{{ __('message.enter_title_ru') }}"
                                       name="title_ru"
                                       value="{{ old('title_ru') }}">
                                @error('title_ru')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Body UZ --}}
                            <div class="mb-4">
                                <label for="body_uz" class="form-label">{{ __('message.content_uz') }}</label>
                                <textarea class="form-control @error('body_uz') is-invalid @enderror"
                                          id="body_uz"
                                          name="body_uz"
                                          rows="3"
                                          placeholder="{{ __('message.enter_description_uz') }}">{{ old('body_uz') }}</textarea>
                                @error('body_uz')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Body RU --}}
                            <div class="mb-4">
                                <label for="body_ru" class="form-label">{{ __('message.content_ru') }}</label>
                                <textarea class="form-control @error('body_ru') is-invalid @enderror"
                                          id="body_ru"
                                          name="body_ru"
                                          rows="3"
                                          placeholder="{{ __('message.enter_description_ru') }}">{{ old('body_ru') }}</textarea>
                                @error('body_ru')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary" type="submit">💾 {{ __('message.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
