@extends('layouts.adminLayout')
@section('title', __('message.statistics'))
@section('content')
<div class="container mt-4" style="max-width:720px">
    <h4>{{ __('message.statistics') }} #{{ $statictik->id }}</h4>
    <dl>
        <dt>{{ __('message.classes') }}</dt><dd>{{ $statictik->classesCount }}</dd>
        <dt>{{ __('message.Oquvchilar') }}</dt><dd>{{ $statictik->studentsCount }}</dd>
        <dt>{{ __('message.Oqituvchilar') }}</dt><dd>{{ $statictik->teachersCount }}</dd>
        <dt>{{ __('message.graduates_count') }}</dt><dd>{{ $statictik->graduatesCount }}</dd>
    </dl>
    <a href="{{ route('admin.statictik.edit', $statictik->id) }}" class="btn btn-primary">{{ __('message.edit') }}</a>
    <a href="{{ route('admin.statictik.index') }}" class="btn btn-secondary">{{ __('message.back') }}</a>
</div>
@endsection
