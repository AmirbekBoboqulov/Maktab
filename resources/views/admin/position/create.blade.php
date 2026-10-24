@extends('layouts.adminLayout')

@section('title', __('message.create_position'))

@section('content')
<div class="container mt-5" style="max-width: 720px;">
    <div class="card shadow-lg" style="border-radius: 15px;">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h5 class="mb-0">✏️ {{ __('message.create_position') }}</h5>
            <a href="{{ route('admin.position.index') }}" class="btn btn-light btn-sm">{{ __('message.back') }}</a>
        </div>

        <div class="card-body p-4">
            {{-- Xatolik xabarlari --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.position.store') }}" method="POST">
                @csrf

                {{-- Name (UZ) --}}
                <div class="mb-4">
                    <label for="name_uz" class="form-label fw-bold">{{ __('message.name_uz_short') }}</label>
                    <input type="text"
                           id="name_uz"
                           name="name_uz"
                           class="form-control form-control-lg @error('name_uz') is-invalid @enderror"
                           value="{{ old('name_uz') }}"
                           placeholder="{{ __('message.example_position_uz') }}"
                           required>
                    @error('name_uz')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Name (RU) --}}
                <div class="mb-4">
                    <label for="name_ru" class="form-label fw-bold">{{ __('message.name_ru_short') }}</label>
                    <input type="text"
                           id="name_ru"
                           name="name_ru"
                           class="form-control form-control-lg @error('name_ru') is-invalid @enderror"
                           value="{{ old('name_ru') }}"
                           placeholder="{{ __('message.example_position_ru') }}"
                           required>
                    @error('name_ru')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tugmalar --}}
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-success btn-lg px-5">💾 {{ __('message.save') }}</button>
                    <a href="{{ route('admin.position.index') }}" class="btn btn-secondary btn-lg px-5">{{ __('message.back') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
