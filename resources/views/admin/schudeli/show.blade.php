@extends('layouts.adminLayout')
@section('title', __('message.schedule'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ __('message.schedule') }} #{{ $schedule->id }}</h4>
    <dl><dt>{{ __('message.shifts') }}</dt><dd>{{ $schedule->smena?->name_uz ?? '-' }}</dd><dt>{{ __('message.lessons') }}</dt><dd>{{ $schedule->lesson?->name_uz ?? '-' }}</dd><dt>{{ __('message.week_day') }}</dt><dd>{{ $schedule->week_day }}</dd><dt>{{ __('message.room') }}</dt><dd>{{ $schedule->room }}</dd><dt>{{ __('message.time') }}</dt><dd>{{ $schedule->time }}</dd></dl>
    <a href="{{ route('admin.schedule.edit', $schedule->id) }}" class="btn btn-primary">{{ __('message.edit') }}</a> <a href="{{ route('admin.schedule.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
</div>
@endsection
