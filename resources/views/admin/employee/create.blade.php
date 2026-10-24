@extends('layouts.adminLayout')
@section('title')
    {{ __('message.employee_create') }}
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-10">
                <style>
                    .main-content {
                        margin-left: 250px;
                        padding: 20px;
                    }
                    .card {
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        border-radius: 10px;
                    }
                    .form-group {
                        margin-bottom: 1rem;
                    }
                </style>

                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('message.employee_create') }}</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.employee.index') }}" class="btn btn-success mb-3">{{ __('message.back') }}</a>

                        <form action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name_uz" class="form-label">{{ __('message.name_uz_short') }}</label>
                                    <input type="text" class="form-control" id="name_uz" name="name_uz" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name_ru" class="form-label">{{ __('message.name_ru_short') }}</label>
                                    <input type="text" class="form-control" id="name_ru" name="name_ru" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">{{ __('message.email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">{{ __('message.Telefon') }}</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="work_time" class="form-label">{{ __('message.work_time') }}</label>
                                    <input type="text" class="form-control" id="work_time" name="work_time" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">{{ __('message.image') }}</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category_id" class="form-label">{{ __('message.category') }}</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        @foreach($empCategories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat['name_'. app()->getLocale()] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="position_id" class="form-label">{{ __('message.positions') }}</label>
                                    <select name="position_id" id="position_id" class="form-control" required>
                                        @foreach($positions as $pos)
                                            <option value="{{ $pos->id }}">{{ $pos['name_'. app()->getLocale()] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="lesson_id" class="form-label">{{ __('message.lessons') }} ({{ __('message.optional') }})</label>
                                <select name="lesson_id" id="lesson_id" class="form-control">
                                    <option value="">— {{ __('message.not_specified') }} —</option>
                                    @foreach($lessons as $lesson)
                                        <option value="{{ $lesson->id }}">{{ $lesson['name_'. app()->getLocale()] }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">{{ __('message.optional_teacher_subject') }}</small>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('message.save') }}</button>
                                <a href="{{ route('admin.employee.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
