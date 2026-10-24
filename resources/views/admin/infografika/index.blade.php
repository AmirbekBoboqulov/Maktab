@extends('layouts.adminLayout')

@section('title', __('message.infographics'))

@section('content')
<div class="main-content">
    <section class="section">
        <div class="container-fluid">
            <style>
                .main-content {
                    margin-left: 250px;
                    padding: 20px;
                }
                table th, table td {
                    vertical-align: middle !important;
                    text-align: center;
                }
                img {
                    border-radius: 8px;
                    object-fit: cover;
                }
            </style>

            {{-- ✅ Flash Message --}}
            @if (session('success'))
                <div id="flash-message" class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <script>
                setTimeout(() => {
                    const flash = document.getElementById('flash-message');
                    if (flash) flash.style.display = 'none';
                }, 3000);
            </script>

            {{-- ✅ Create Button --}}
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h4>📊 {{ __('message.infographic_list') }}</h4>
                <a href="{{ route('admin.infografika.create') }}" class="btn btn-primary">
                    ➕ {{ __('message.create_new') }}
                </a>
            </div>

            {{-- ✅ Table --}}
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('message.image') }}</th>
                                <th scope="col">{{ __('message.title_uz') }}</th>
                                <th scope="col">{{ __('message.title_ru') }}</th>
                                <th scope="col" style="width: 220px;">{{ __('message.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($infoGrafika as $infoGrafik)
                                <tr>
                                    <th scope="row">{{ $infoGrafik->id }}</th>
                                    <td>
                                        @if($infoGrafik->image && file_exists(public_path('admin/images/' . $infoGrafik->image)))
                                            <img src="{{ asset('admin/images/' . $infoGrafik->image) }}" alt="{{ __('message.image') }}" style="width: 70px; height: 70px;">
                                        @else
                                            <span class="text-muted">{{ __('message.no_image') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $infoGrafik->title_uz }}</td>
                                    <td>{{ $infoGrafik->title_ru }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.infografika.show', $infoGrafik->id) }}" class="btn btn-success btn-sm">
                                                👁 {{ __('message.show') }}
                                            </a>
                                            <a href="{{ route('admin.infografika.edit', $infoGrafik->id) }}" class="btn btn-primary btn-sm">
                                                ✏ {{ __('message.edit') }}
                                            </a>
                                            <form action="{{ route('admin.infografika.destroy', $infoGrafik->id) }}" method="POST" onsubmit="return confirm('{{ __('message.delete_item') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">🗑 {{ __('message.delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">{{ __('message.no_records') }}</td>
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
