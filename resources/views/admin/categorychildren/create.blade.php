@extends('layouts.adminLayout')

@section('title', __('message.create_child_category'))

@section('content')
<div class="col-md-8 offset-md-2 mt-4">
    <form action="{{ route('admin.categorychildren.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card shadow-sm border-0">
            <h5 class="card-header bg-primary text-white">{{ __('message.create') }}: {{ __('message.category_children') }}</h5>

            <div class="card-body">
                <a href="{{ route('admin.categorychildren.index') }}" class="btn btn-success mb-3">
                    ← {{ __('message.back') }}
                </a>

                {{-- Name (uz) --}}
                <div class="mb-4">
                    <label for="name_uz" class="form-label fw-semibold">{{ __('message.name_uz_short') }}</label>
                    <input 
                        type="text" 
                        class="form-control @error('name_uz') is-invalid @enderror" 
                        id="name_uz" 
                        placeholder="{{ __('message.enter_category_uz') }}" 
                        name="name_uz" 
                        value="{{ old('name_uz') }}"
                    >
                    @error('name_uz')
                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Parent Category --}}
                <div class="mb-4">
                    <label for="category_id" class="form-label fw-semibold">{{ __('message.parent_category') }}</label>
                    <select 
                        class="form-select @error('category_id') is-invalid @enderror" 
                        name="category_id" 
                        id="category_id"
                    >
                        <option value="" disabled selected>-- {{ __('message.category') }} --</option>
                        @foreach($category as $categor)
                            <option value="{{ $categor->id }}" {{ old('category_id') == $categor->id ? 'selected' : '' }}>
                                {{ $categor->name_uz }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Name (ru) --}}
                <div class="mb-4">
                    <label for="name_ru" class="form-label fw-semibold">{{ __('message.name_ru_short') }}</label>
                    <input 
                        type="text" 
                        class="form-control @error('name_ru') is-invalid @enderror" 
                        id="name_ru" 
                        placeholder="{{ __('message.enter_category_ru') }}" 
                        name="name_ru" 
                        value="{{ old('name_ru') }}"
                    >
                    @error('name_ru')
                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Image --}}
                <div class="mb-4">
                    <label for="url" class="form-label fw-semibold">{{ __('message.image') }}</label>
                    <input 
                        type="file" 
                        class="form-control @error('url') is-invalid @enderror" 
                        id="url" 
                        name="url" 
                        accept="image/*"
                    >
                    @error('url')
                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="text-end">
                    <button class="btn btn-primary px-4" type="submit">
                        <i class="bx bx-save me-1"></i> {{ __('message.save') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
