@extends('layouts.adminLayout')

@section('title', __('message.show') . ' ' . __('message.category'))

@section('content')
<div class="col-md-8 offset-md-2 mt-4">

    <div class="card shadow-sm border-0">
        <h5 class="card-header bg-info text-white">{{ __('message.show') }} {{ __('message.category') }}</h5>

        <div class="card-body">
            {{-- Back button --}}
            <a href="{{ route('admin.category.index') }}" class="btn btn-success mb-3">
                ← {{ __('message.back') }}
            </a>

            {{-- Name (uz) --}}
            <div class="mb-4">
                <label for="name_uz" class="form-label fw-semibold">{{ __('message.category_name_uz') }}</label>
                <input 
                    type="text" 
                    id="name_uz" 
                    class="form-control bg-light" 
                    value="{{ $category->name_uz }}" 
                    readonly
                >
            </div>

            {{-- Name (ru) --}}
            <div class="mb-4">
                <label for="name_ru" class="form-label fw-semibold">{{ __('message.category_name_ru') }}</label>
                <input 
                    type="text" 
                    id="name_ru" 
                    class="form-control bg-light" 
                    value="{{ $category->name_ru }}" 
                    readonly
                >
            </div>

            {{-- Info message --}}
            <div class="alert alert-secondary mt-3 mb-0">
                <i class="fas fa-info-circle"></i> {{ __('message.read_only_category') }}
            </div>
        </div>
    </div>
</div>
@endsection
