@extends('layouts.adminLayout')

@section('title', __('message.positions'))

@section('content')

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">

                {{-- Styling --}}
                <style>
                    .main-content {
                        margin-left: 250px; /* Sidebar kengligi */
                        padding: 20px;
                    }
                    .table td, .table th {
                        vertical-align: middle !important;
                    }
                    .btn {
                        margin-right: 5px;
                    }
                </style>

                {{-- Flash message --}}
                @if (session('success'))
                    <div id="flash-message" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(() => {
                            let flash = document.getElementById('flash-message');
                            if (flash) flash.style.display = 'none';
                        }, 3000);
                    </script>
                @endif

                {{-- Header and Create button --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">{{ __('message.position_list') }}</h4>
                    <a href="{{ route('admin.position.create') }}" class="btn btn-primary">+ {{ __('message.create_position') }}</a>
                </div>

                {{-- Table --}}
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 60px;">#</th>
                                    <th>{{ __('message.name_uz_short') }}</th>
                                    <th>{{ __('message.name_ru_short') }}</th>
                                    <th style="width: 250px;">{{ __('message.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($positions as $position)
                                    <tr>
                                        <td>{{ $position->id }}</td>
                                        <td>{{ $position->name_uz }}</td>
                                        <td>{{ $position->name_ru }}</td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- Delete --}}
                                                <form action="{{ route('admin.position.destroy', $position->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('{{ __('message.confirm_delete') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">🗑️ {{ __('message.delete') }}</button>
                                                </form>

                                                {{-- Show --}}
                                                <a href="{{ route('admin.position.show', $position->id) }}" class="btn btn-success btn-sm">
                                                    👁️ {{ __('message.show') }}
                                                </a>

                                                {{-- Edit --}}
                                                <a href="{{ route('admin.position.edit', $position->id) }}" class="btn btn-primary btn-sm">
                                                    ✏️ {{ __('message.edit') }}
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">{{ __('message.no_positions') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
