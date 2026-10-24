@extends('layouts.adminLayout')
@section('title', __('message.show') . ' ' . __('message.posts'))

@section('content')
<div class="container mt-4" style="max-width: 700px;">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">📄 {{ __('message.details') }}</h5>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-success">{{ __('message.back') }}</a>
        </div>

        <div class="card-body">
            {{-- Title (UZ) --}}
            <div class="mb-3">
                <label class="form-label fw-bold">{{ __('message.title_uz') }}</label>
                <input type="text" class="form-control" value="{{ $post->title_uz }}" readonly>
            </div>

            {{-- Title (RU) --}}
            <div class="mb-3">
                <label class="form-label fw-bold">{{ __('message.title_ru') }}</label>
                <input type="text" class="form-control" value="{{ $post->title_ru }}" readonly>
            </div>

            {{-- Body (UZ) --}}
            <div class="mb-3">
                <label class="form-label fw-bold">{{ __('message.content_uz') }}</label>
                <textarea class="form-control" rows="3" readonly>{{ $post->body_uz }}</textarea>
            </div>

            {{-- Body (RU) --}}
            <div class="mb-3">
                <label class="form-label fw-bold">{{ __('message.content_ru') }}</label>
                <textarea class="form-control" rows="3" readonly>{{ $post->body_ru }}</textarea>
            </div>

            {{-- Image --}}
            @if($post->image)
            <div class="mb-3 text-center">
                <label class="form-label fw-bold">{{ __('message.image') }}</label><br>
                <img src="{{ asset('admin/images/' . $post->image) }}" alt="Post {{ __('message.image') }}" style="max-width: 100%; border-radius: 6px;">
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
