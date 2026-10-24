@extends('layouts.adminLayout')
@section('title', __('message.useful_resources'))

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <style>
                    .main-content {
                        margin-left: 250px;
                        padding: 20px;
                    }
                    .table td, .table th {
                        padding: 0.5rem;
                        vertical-align: middle;
                        font-size: 0.9rem;
                    }
                    .btn-sm {
                        padding: 0.25rem 0.4rem;
                        font-size: 0.75rem;
                    }
                    img.resource-img {
                        width: 50px;
                        height: 50px;
                        object-fit: cover;
                        border-radius: 4px;
                    }
                </style>

                @if (session('success'))
                    <div id="flash-message" class="alert alert-success py-1 px-2 mb-2">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(() => {
                            const flash = document.getElementById('flash-message');
                            if (flash) flash.style.display = 'none';
                        }, 3000);
                    </script>
                @endif

                <div class="d-flex justify-content-between mb-2">
                    <h5 class="mb-0">📚 {{ __('message.useful_resources') }}</h5>
                    <a href="{{ route('admin.usefulResource.create') }}" class="btn btn-sm btn-primary">➕ {{ __('message.create') }}</a>
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover table-sm mb-0">
                        <thead class="table-light small">
                            <tr>
                                <th>#</th>
                                <th>{{ __('message.image') }}</th>
                                <th>{{ __('message.title_uz') }}</th>
                                <th>{{ __('message.title_ru') }}</th>
                                <th>{{ __('message.content_uz') }}</th>
                                <th>{{ __('message.content_ru') }}</th>
                                <th>{{ __('message.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            @foreach($usefulResources as $res)
                                <tr>
                                    <td>{{ $res->id }}</td>
                                    <td>
                                        <img src="/admin/images/{{ $res->image }}" alt="image" class="resource-img">
                                    </td>
                                    <td>{{ Str::limit($res->title_uz, 20) }}</td>
                                    <td>{{ Str::limit($res->title_ru, 20) }}</td>
                                    <td>{{ Str::limit($res->body_uz, 25) }}</td>
                                    <td>{{ Str::limit($res->body_ru, 25) }}</td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('admin.usefulResource.show', $res->id) }}" class="btn btn-success btn-sm" aria-label="{{ __('message.show') }}" title="{{ __('message.show') }}"><i class="bx bx-show" aria-hidden="true"></i></a>
                                        <a href="{{ route('admin.usefulResource.edit', $res->id) }}" class="btn btn-primary btn-sm" aria-label="{{ __('message.edit') }}" title="{{ __('message.edit') }}"><i class="bx bx-edit" aria-hidden="true"></i></a>
                                        <form action="{{ route('admin.usefulResource.destroy', $res->id) }}" method="POST" onsubmit="return confirm('{{ __('message.delete_item') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" aria-label="{{ __('message.delete') }}" title="{{ __('message.delete') }}"><i class="bx bx-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
