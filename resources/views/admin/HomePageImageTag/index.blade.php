@extends('layouts.adminLayout')

@section('title', __('message.homepage_tag_list'))

@section('content')
<div class="main-content">
    <section class="section">
        <div class="container-fluid">
            <style>
                .main-content {
                    margin-left: 250px; /* Sidebar kengligi bilan mos bo‘lishi kerak */
                    padding: 20px;
                }

                .table th, .table td {
                    text-align: center;
                    vertical-align: middle !important;
                }

                .btn {
                    margin: 2px;
                }

                #flash-message {
                    animation: fadeOut 3s ease forwards;
                }

                @keyframes fadeOut {
                    0% { opacity: 1; }
                    90% { opacity: 1; }
                    100% { opacity: 0; display: none; }
                }
            </style>

            {{-- Flash xabar --}}
            @if (session('success'))
                <div id="flash-message" class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">🏷️ {{ __('message.homepage_tag_list') }}</h4>
                    <a href="{{ route('admin.HomePageImageTag.create') }}" class="btn btn-primary">
                        + {{ __('message.create_new') }}
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>{{ __('message.title_uz') }}</th>
                                <th>{{ __('message.title_ru') }}</th>
                                <th>{{ __('message.content_uz') }}</th>
                                <th>{{ __('message.content_ru') }}</th>
                                <th>{{ __('message.actions') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($homePageImageTags as $homepage)
                                <tr>
                                    <td>{{ $homepage->id }}</td>
                                    <td>{{ $homepage->title_uz }}</td>
                                    <td>{{ $homepage->title_ru }}</td>
                                    <td>{{ Str::limit($homepage->body_uz, 60) }}</td>
                                    <td>{{ Str::limit($homepage->body_ru, 60) }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('admin.HomePageImageTag.edit', $homepage->id) }}" class="btn btn-sm btn-primary">
                                            {{ __('message.edit') }}
                                        </a>

                                        <form action="{{ route('admin.HomePageImageTag.destroy', $homepage->id) }}" method="POST"
                                              onsubmit="return confirm('{{ __('message.confirm_delete') }}');"
                                              style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">{{ __('message.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">{{ __('message.no_information') }}</td>
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
