@extends('layouts.adminLayout')
@section('title', __('message.create_schedule'))

@section('content')
<div class="container mt-4 schedule-form-page">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center px-4 py-3">
            <h5 class="mb-0">🗓 {{ __('message.create_schedule') }}</h5>
            <a href="{{ route('admin.schedule.index') }}" class="btn btn-success btn-sm">{{ __('message.back') }}</a>
        </div>

        <div class="card-body p-4 p-md-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.schedule.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Smena --}}
                <div class="mb-3">
                    <label for="smena_id" class="form-label fw-bold">{{ __('message.shifts') }}</label>
                    <select name="smena_id" id="smena_id" class="form-select" required>
                        <option value="" disabled selected>— {{ __('message.shifts') }} —</option>
                        @foreach($smenatype as $smena)
                            <option value="{{ $smena->id }}">{{ $smena['name_'. \App::getLocale()] }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Fan --}}
                <div class="mb-3">
                    <label for="lesson_id" class="form-label fw-bold">{{ __('message.lessons') }}</label>
                    <select name="lesson_id" id="lesson_id" class="form-select" required>
                        <option value="" disabled selected>— {{ __('message.lessons') }} —</option>
                        @foreach($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson['name_'. \App::getLocale()] }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Sinflar --}}
                <div class="mb-3">
                    <label for="week_day" class="form-label fw-bold">{{ __('message.classes') }}</label>
                    <select name="week_day[]" id="week_day" class="form-select" multiple required size="5">
                        @foreach(\App\Models\Categorychildren::all() as $klass)
                            <option value="{{ $klass['name_'. \App::getLocale()] }}">{{ $klass['name_'. \App::getLocale()] }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">{{ __('message.multi_select_help') }}</small>
                </div>

                {{-- Xona --}}
                <div class="mb-3">
                    <label for="room" class="form-label fw-bold">{{ __('message.room') }}</label>
                    <input type="text" name="room" id="room" class="form-control" required>
                </div>

                {{-- Vaqt --}}
                <div class="mb-3">
                    <label for="time" class="form-label fw-bold">{{ __('message.time') }}</label>
                    <input type="time" name="time" id="time" class="form-control" required>
                </div>

                {{-- Jadval rasmi --}}
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">{{ __('message.week_image') }}</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>

                {{-- Submit --}}
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-primary">💾 {{ __('message.save') }}</button>
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .schedule-form-page { max-width: 760px; margin-left: auto; margin-right: auto; }
    .schedule-form-page .card { border-radius: 14px; overflow: hidden; }
    .schedule-form-page .form-label { color: #263238; }
    .schedule-form-page .form-control,
    .schedule-form-page .form-select { min-height: 44px; }
    .schedule-form-page select[multiple] { min-height: 130px; }
</style>
@endsection
