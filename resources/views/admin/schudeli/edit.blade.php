@extends('layouts.adminLayout')
@section('title', __('message.edit_schedule'))

@section('content')
<div class="container mt-4 schedule-form-page">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center px-4 py-3">
            <h5 class="mb-0">📝 {{ __('message.edit_schedule') }}</h5>
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

            <form action="{{ route('admin.schedule.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Smena --}}
                <div class="mb-3">
                    <label for="smena_id" class="form-label fw-bold">{{ __('message.shifts') }}</label>
                    <select name="smena_id" id="smena_id" class="form-select" required>
                        @foreach($smenatype as $smena)
                            <option value="{{ $smena->id }}" {{ (int)$schedule->smena_id === (int)$smena->id ? 'selected' : '' }}>
                                {{ $smena['name_'. \App::getLocale()] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Fan --}}
                <div class="mb-3">
                    <label for="lesson_id" class="form-label fw-bold">{{ __('message.lessons') }}</label>
                    <select name="lesson_id" id="lesson_id" class="form-select" required>
                        @foreach($lessons as $lesson)
                            <option value="{{ $lesson->id }}" {{ (int)$schedule->lesson_id === (int)$lesson->id ? 'selected' : '' }}>
                                {{ $lesson['name_'. \App::getLocale()] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Sinflar --}}
                <div class="mb-3">
                    <label for="week_day" class="form-label fw-bold">{{ __('message.classes') }}</label>
                    <select name="week_day[]" id="week_day" class="form-select" multiple required size="5">
                        @foreach(\App\Models\Categorychildren::all() as $klass)
                            @php $val = $klass['name_'. \App::getLocale()]; @endphp
                            <option value="{{ $val }}" {{ in_array($val, $selectedClasses) ? 'selected' : '' }}>
                                {{ $val }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">{{ __('message.multi_select_help') }}</small>
                </div>

                {{-- Xona --}}
                <div class="mb-3">
                    <label for="room" class="form-label fw-bold">{{ __('message.room') }}</label>
                    <input type="text" name="room" id="room" class="form-control" value="{{ $schedule->room }}" required>
                </div>

                {{-- Vaqt --}}
                <div class="mb-3">
                    <label for="time" class="form-label fw-bold">{{ __('message.time') }}</label>
                    <input type="time" name="time" id="time" class="form-control" value="{{ $schedule->time }}" required>
                </div>

                {{-- Joriy rasm --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">{{ __('message.current_image') }}</label>
                    <div class="mb-2">
                        <img src="{{ asset('admin/images/'.$schedule->image) }}" alt="jadval" style="max-width:240px; height:auto; border-radius:8px; object-fit:cover;">
                    </div>
                </div>

                {{-- Yangi rasm --}}
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">{{ __('message.image') }} ({{ __('message.optional') }})</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>

                {{-- Submit --}}
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-primary">💾 {{ __('message.save') }}</button>
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-secondary">{{ __('message.cancel') }}</a>
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
