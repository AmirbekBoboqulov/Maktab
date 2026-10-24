@extends('layouts.adminLayout')

@section('title', __('message.parents'))

@section('content')
<div class="main-content">
    <section class="section">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('message.parents') }}</h4>
                    <a href="{{ route('admin.parentInfo.create') }}" class="btn btn-primary">+ {{ __('message.create_new') }}</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr><th>#</th><th>{{ __('message.title_uz') }}</th><th>{{ __('message.title_ru') }}</th><th>{{ __('message.actions') }}</th></tr>
                        </thead>
                        <tbody>
                            @forelse($parentInfos as $parentInfo)
                                <tr>
                                    <td>{{ $parentInfo->id }}</td>
                                    <td>{{ $parentInfo->title_uz }}</td>
                                    <td>{{ $parentInfo->title_ru }}</td>
                                    <td>
                                        <a href="{{ route('admin.parentInfo.show', $parentInfo) }}" class="btn btn-sm btn-success">{{ __('message.show') }}</a>
                                        <a href="{{ route('admin.parentInfo.edit', $parentInfo) }}" class="btn btn-sm btn-primary">{{ __('message.edit') }}</a>
                                        <form action="{{ route('admin.parentInfo.destroy', $parentInfo) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('message.confirm_delete') }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">{{ __('message.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted">{{ __('message.no_information') }}</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
