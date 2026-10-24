@extends('layouts.adminLayout')

@section('title', __('message.categories'))

@section('content')
<style>
    .main-content {
        margin-left: 250px; /* Sidebar kengligi bilan mos bo‘lishi kerak */
        padding: 20px;
    }
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }
</style>

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">

                {{-- Flash message --}}
                @if (session('success'))
                    <div id="flash-message" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <script>
                    setTimeout(function() {
                        const flash = document.getElementById('flash-message');
                        if (flash) flash.style.display = 'none';
                    }, 3000);
                </script>

                {{-- Create Button --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold">{{ __('message.category_list') }}</h4>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('message.create') }}
                    </a>
                </div>

                {{-- Category Table --}}
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 5%;">#</th>
                                    <th scope="col" style="width: 30%;">{{ __('message.name_uz_short') }}</th>
                                    <th scope="col" style="width: 30%;">{{ __('message.name_ru_short') }}</th>
                                    <th scope="col" style="width: 35%;">{{ __('message.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name_uz }}</td>
                                        <td>{{ $category->name_ru }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                {{-- Show --}}
                                                <a href="{{ route('admin.category.show', $category->id) }}" 
                                                   class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye"></i> {{ __('message.show') }}
                                                </a>

                                                {{-- Edit --}}
                                                <a href="{{ route('admin.category.edit', $category->id) }}" 
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i> {{ __('message.edit') }}
                                                </a>

                                                {{-- Delete --}}
                                                <form action="{{ route('admin.category.destroy', $category->id) }}" 
                                                      method="POST" 
                                                      onsubmit="return confirm('{{ __('message.confirm_delete_category') }}')" 
                                                      style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i> {{ __('message.delete') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            {{ __('message.no_categories') }}
                                        </td>
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
