@extends('layouts.adminLayout')

@section('title', __('message.edit') . ' ' . __('message.top_category'))

@section('content')
<div class="col-md-8 offset-md-2 mt-4">
    <form action="{{ route('admin.CategoryTop.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card shadow-lg border-0 rounded-3">
            <h5 class="card-header bg-warning text-white fw-semibold py-3">
                <i class="bx bx-edit-alt me-1"></i> {{ __('message.edit') }}: {{ __('message.top_category') }}
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
                        name="name_uz" 
                        value="{{ $category->name_uz }}" 
                        placeholder="{{ __('message.example_top_category_uz') }}"
                    >
                    @error('name_uz')
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
                        name="name_ru" 
                        value="{{ $category->name_ru }}" 
                        placeholder="{{ __('message.example_top_category_ru') }}"
                    >
                    @error('name_ru')
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
                        name="url" 
                        value="{{ $category->url }}" 
                        placeholder="{{ __('message.url') }}"
                    >
                    @error('url')
                        <div class="invalid-feedback d-block text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="text-end">
                    <button class="btn btn-warning text-white px-4 py-2">
                        <i class="bx bx-save me-1"></i> {{ __('message.update') }}
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
        transition: 0.2s ease-in-out;
    }
    .btn-success {
        background: #1cc88a;
        border: none;
    }
    .btn-success:hover {
        opacity: 0.9;
    }
    .btn-warning {
        background: #f6c23e;
        border: none;
    }
    .btn-warning:hover {
        opacity: 0.9;
    }
</style>
@endsection
