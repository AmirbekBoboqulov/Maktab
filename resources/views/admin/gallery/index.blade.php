@extends('layouts.adminLayout')
@section('title', __('message.gallery'))

@section('content')
<div class="main-content">
    <section class="section">
        <div class="container-fluid">
            <style>
                .main-content {
                    margin-left: 250px;
                    padding: 20px;
                }
                table img {
                    width: 70px;
                    height: 70px;
                    border-radius: 10px;
                    object-fit: cover;
                }
                .btn {
                    margin: 2px;
                }
                .table th, .table td {
                    text-align: center;
                    vertical-align: middle !important;
                }
                .action-buttons {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 8px;
                }
            </style>

            {{-- Flash message --}}
            @if (session('success'))
                <div id="flash-message" class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(() => {
                        const flash = document.getElementById('flash-message');
                        if (flash) flash.style.display = 'none';
                    }, 3000);
                </script>
            @endif

            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('message.gallery_list') }}</h4>
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-light btn-sm fw-bold">+ {{ __('message.create_new') }}</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>{{ __('message.image') }}</th>
                                <th>{{ __('message.title_uz') }}</th>
                                <th>{{ __('message.title_ru') }}</th>
                                <th>{{ __('message.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($gallerys as $gallery)
                                <tr>
                                    <td>{{ $gallery->id }}</td>
                                    <td><img src="{{ asset('admin/images/' . $gallery->image) }}" alt="{{ __('message.gallery') }}"></td>
                                    <td>{{ $gallery->title_uz }}</td>
                                    <td>{{ $gallery->title_ru }}</td>
                                    <td class="action-buttons">
                                        <a class="btn btn-success btn-sm shadow" href="{{ route('admin.gallery.show', $gallery->id) }}">
                                            {{ __('message.show') }}
                                        </a>
                                        <a class="btn btn-primary btn-sm shadow" href="{{ route('admin.gallery.edit', $gallery->id) }}">
                                            {{ __('message.edit') }}
                                        </a>
                                        <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" 
                                              onsubmit="return confirm('{{ __('message.delete_item') }}');" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm shadow">
                                                O‘chirish
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">{{ __('message.no_gallery') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
