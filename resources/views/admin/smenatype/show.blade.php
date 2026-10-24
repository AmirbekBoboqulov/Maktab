@extends('layouts.adminLayout')
@section('title', __('message.show') . ' ' . __('message.shifts'))

@section('content')
<div class="col-md-8 offset-md-2">
    <div class="card">
        <h5 class="card-header">{{ __('message.show') }}: {{ __('message.shifts') }}</h5>
        <div class="card-body">
            <a href="{{ route('admin.smenatype.index') }}" class="btn btn-success mb-3">{{ __('message.back') }}</a>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ __('message.name_uz_short') }}</label>
                <p class="form-control-plaintext">{{ $smenatype->name_uz }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">{{ __('message.name_ru_short') }}</label>
                <p class="form-control-plaintext">{{ $smenatype->name_ru }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
