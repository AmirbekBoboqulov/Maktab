@extends('layouts.adminLayout')
@section('title', __('message.create_statistics'))

@section('content')
<div class="col-md-8 offset-md-2">
    <div class="card">
        <h5 class="card-header">{{ __('message.create_statistics') }}</h5>
        <div class="card-body">
            <a href="{{ route('admin.statictik.index') }}" class="btn btn-success mb-3">{{ __('message.back') }}</a>

            <form action="{{ route('admin.statictik.store') }}" method="POST">
                @csrf

                @php
                    $statisticLabels = [
                        'classesCount' => __('message.classes'),
                        'studentsCount' => __('message.students_count'),
                        'teachersCount' => __('message.teachers_count'),
                        'graduatesCount' => __('message.graduates_count'),
                    ];
                @endphp
                @foreach($statisticLabels as $field => $label)
                    <div class="mb-3">
                        <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                        <input type="number" 
                               class="form-control @error($field) is-invalid @enderror" 
                               id="{{ $field }}" 
                               name="{{ $field }}" 
                               placeholder="{{ $label }}..."
                               value="{{ old($field) }}">
                        @error($field)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">{{ __('message.save') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
