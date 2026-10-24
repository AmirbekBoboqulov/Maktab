@extends('layouts.adminLayout')
@section('content')

<div class="col-md-8 offset-md-2">
    <div class="card">
        <h5 class="card-header">{{ __('message.show') }}: {{ __('message.employee_category') }}</h5>
        <div class="card-body">
            <a href="{{ route('admin.empCategory.index') }}" class="btn btn-success mb-3">{{ __('message.back') }}</a>

            <div class="mb-4">
                <label for="name_uz" class="form-label">{{ __('message.name_uz_short') }}</label>
                <input type="text" class="form-control" id="name_uz" value="{{ $empCategory->name_uz }}" readonly>
            </div>

            <div class="mb-4">
                <label for="name_ru" class="form-label">{{ __('message.name_ru_short') }}</label>
                <input type="text" class="form-control" id="name_ru" value="{{ $empCategory->name_ru }}" readonly>
            </div>
        </div>
    </div>
</div>

@endsection
