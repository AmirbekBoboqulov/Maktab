@extends('layouts.adminLayout')

@section('title', __('message.create') . ' ' . __('message.top_category'))

@section('content')
<div class="col-md-8 offset-md-2 mt-4">
    <form action="{{ route('admin.CategoryTop.store') }}" method="POST">
        @csrf

        <div class="card border-0 shadow-lg rounded-3">
            <h5 class="card-header bg-primary text-white fw-semibold py-3">
                <i class="bx bx-layer me-1"></i> {{ __('message.create') }}: {{ __('message.top_category') }}
            </h5>

            <div class="card-body">
                <a href="{{ route('admin.CategoryTop.index') }}" class="btn btn-success mb-3">
                    ← {{ __('message.back') }}
                </a>

                {{-- Name (uz) --}}
                <div class="mb-4">
                    <label for="name_uz" class="form-label fw-semibold">{{ __('message.name_uz_short') }}</label>
                    <input 
                        type="text" 
                        class="form-control @error('name_uz') is-invalid @enderror" 
                        id="name_uz" 
                        placeholder="{{ __('message.example_top_category_uz') }}" 
                        name="name_uz" 
                        value="{{ old('name_uz') }}"
                    >
                    @error('name_uz')
                        <div class="invalid-feedback d-block text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- URL --}}
                <div class="mb-4">
                    <label for="url" class="form-label fw-semibold">{{ __('message.url') }}</label>
                    <input 
                        type="text" 
                        class="form-control @error('url') is-invalid @enderror" 
                        id="url" 
                        placeholder="{{ __('message.url') }}" 
                        name="url" 
                        value="{{ old('url') }}"
                    >
                    @error('url')
                        <div class="invalid-feedback d-block text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Name (ru) --}}
                <div class="mb-4">
                    <label for="name_ru" class="form-label fw-semibold">{{ __('message.name_ru_short') }}</label>
                    <input 
                        type="text" 
                        class="form-control @error('name_ru') is-invalid @enderror" 
                        id="name_ru" 
                        placeholder="{{ __('message.example_top_category_ru') }}" 
                        name="name_ru" 
                        value="{{ old('name_ru') }}"
                    >
                    @error('name_ru')
                        <div class="invalid-feedback d-block text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit button --}}
                <div class="text-end">
                    <button class="btn btn-primary px-4 py-2">
                        <i class="bx bx-save me-1"></i> {{ __('message.save') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .card {
        border-radius: 14px !important;
        overflow: hidden;
    }
    .form-label {
        color: #34495e;
    }
    .form-control {
        border-radius: 10px;
        box-shadow: none !important;
    }
    .btn {
        border-radius: 8px;
    }
    .btn-success {
        background: #1cc88a;
        border: none;
    }
    .btn-success:hover {
        opacity: 0.9;
    }
    .btn-primary {
        background: #4e73df;
        border: none;
    }
    .btn-primary:hover {
        opacity: 0.9;
    }
</style>
@endsection
