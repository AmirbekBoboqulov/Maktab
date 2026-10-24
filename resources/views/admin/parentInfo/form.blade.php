<div class="mb-3">
    <label for="title_uz" class="form-label">{{ __('message.title_uz') }}</label>
    <input id="title_uz" name="title_uz" class="form-control @error('title_uz') is-invalid @enderror" value="{{ old('title_uz', $parentInfo->title_uz ?? '') }}" required>
    @error('title_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="title_ru" class="form-label">{{ __('message.title_ru') }}</label>
    <input id="title_ru" name="title_ru" class="form-control @error('title_ru') is-invalid @enderror" value="{{ old('title_ru', $parentInfo->title_ru ?? '') }}" required>
    @error('title_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="body_uz" class="form-label">{{ __('message.content_uz') }}</label>
    <textarea id="body_uz" name="body_uz" rows="5" class="form-control @error('body_uz') is-invalid @enderror" required>{{ old('body_uz', $parentInfo->body_uz ?? '') }}</textarea>
    @error('body_uz')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="body_ru" class="form-label">{{ __('message.content_ru') }}</label>
    <textarea id="body_ru" name="body_ru" rows="5" class="form-control @error('body_ru') is-invalid @enderror" required>{{ old('body_ru', $parentInfo->body_ru ?? '') }}</textarea>
    @error('body_ru')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
