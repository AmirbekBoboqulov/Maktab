@extends('layouts.adminLayout')
@section('title', __('message.edit_statistics'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ __('message.edit_statistics') }}</h4>
    <form action="{{ route('admin.statictik.update', $statictik->id) }}" method="POST">
        @csrf @method('PUT')
        @php
            $statisticLabels = [
                'classesCount' => __('message.classes'),
                'studentsCount' => __('message.students_count'),
                'teachersCount' => __('message.teachers_count'),
                'graduatesCount' => __('message.graduates_count'),
            ];
        @endphp
        @foreach($statisticLabels as $field => $label)
            <div class="mb-3"><label>{{ $label }}</label><input type="number" min="0" name="{{ $field }}" class="form-control" value="{{ old($field, $statictik->$field) }}" required></div>
        @endforeach
        <button class="btn btn-primary">{{ __('message.update') }}</button>
        <a href="{{ route('admin.statictik.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
    </form>
</div>
@endsection
