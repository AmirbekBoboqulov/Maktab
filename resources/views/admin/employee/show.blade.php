@extends('layouts.adminLayout')
@section('title', __('message.show') . ' ' . __('message.employees'))
@section('content')

<div class="col-md-8 offset-md-2 mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('message.employee_details') }}</h5>
            <a href="{{ route('admin.employee.index') }}" class="btn btn-light btn-sm fw-bold">{{ __('message.back') }}</a>
        </div>

        <div class="card-body">
            {{-- Employee Image --}}
            <div class="text-center mb-4">
                <img src="{{ asset('admin/images/' . $employee->image) }}" 
                     alt="Employee {{ __('message.image') }}" 
                     class="rounded shadow-sm" 
                     style="width: 150px; height: 150px; object-fit: cover;">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">{{ __('message.name_uz_short') }}:</label>
                    <input type="text" class="form-control" value="{{ $employee->name_uz }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">{{ __('message.name_ru_short') }}:</label>
                    <input type="text" class="form-control" value="{{ $employee->name_ru }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">{{ __('message.email') }}:</label>
                    <input type="email" class="form-control" value="{{ $employee->email }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">{{ __('message.Telefon') }}:</label>
                    <input type="text" class="form-control" value="{{ $employee->phone }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">{{ __('message.work_time') }}:</label>
                    <input type="text" class="form-control" value="{{ $employee->work_time }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">{{ __('message.category') }}:</label>
                    <input type="text" class="form-control" 
                           value="{{ $employee->category->name_uz ?? '—' }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">{{ __('message.positions') }}:</label>
                    <input type="text" class="form-control" 
                           value="{{ $employee->position->name_uz ?? '—' }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
    }
    .card-header {
        border-top-left-radius: 15px !important;
        border-top-right-radius: 15px !important;
    }
</style>

@endsection
