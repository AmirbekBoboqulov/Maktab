@extends('layouts.adminLayout')

@section('title', __('message.create_employee_category'))

@section('content')
<div class="main-content px-4 py-4">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bx bx-category me-2"></i> {{ __('message.create_employee_category') }}</h5>
                <a href="{{ route('admin.empCategory.index') }}" class="btn btn-light btn-sm">
                    <i class="bx bx-arrow-back me-1"></i> {{ __('message.back') }}
                </a>
            </div>

            <form action="{{ route('admin.empCategory.store') }}" method="POST" class="p-3">
                @csrf
                <div class="card-body bg-light">
                    <div class="mb-4">
                        <label for="name_uz" class="form-label fw-semibold">{{ __('message.name_uz_short') }}</label>
                        <input type="text" 
                               class="form-control @error('name_uz') is-invalid @enderror" 
                               id="name_uz" 
                               name="name_uz" 
                               placeholder="{{ __('message.example_employee_category_uz') }}" 
                               value="{{ old('name_uz') }}">
                        @error('name_uz')
                        <div class="invalid-feedback d-block text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="name_ru" class="form-label fw-semibold">{{ __('message.name_ru_short') }}</label>
                        <input type="text" 
                               class="form-control @error('name_ru') is-invalid @enderror" 
                               id="name_ru" 
                               name="name_ru" 
                               placeholder="{{ __('message.example_employee_category_ru') }}" 
                               value="{{ old('name_ru') }}">
                        @error('name_ru')
                        <div class="invalid-feedback d-block text-danger small mt-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer bg-white text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bx bx-save me-1"></i> {{ __('message.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .main-content {
        margin-left: 250px;
        padding: 20px;
        background-color: #f8f9fc;
        min-height: 100vh;
    }

    .form-label {
        color: #1e293b;
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-3px);
    }

    .btn-primary {
        background-color: #2563eb;
        border: none;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }
</style>
@endsection
