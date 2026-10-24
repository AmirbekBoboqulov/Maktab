@extends('layouts.adminLayout')
@section('title', __('message.schedule_list'))

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
                    .table-img {
                        width: 50px;
                        height: 50px;
                        object-fit: cover;
                        border-radius: 5px;
                    }
                    .action-btns form, .action-btns a {
                        margin-right: 4px;
                    }
                </style>

                @if (session('success'))
                    <div id="flash-message" class="alert alert-success mb-2">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(() => { document.getElementById('flash-message').style.display = 'none'; }, 3000);
                    </script>
                @endif

                <a href="{{ route('admin.schedule.create') }}" class="btn btn-primary mb-2">{{ __('message.create') }}</a>
                
                <div class="card-body p-0">
                    <table class="table table-hover table-sm mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>{{ __('message.shifts') }}</th>
                            <th>{{ __('message.lessons') }}</th>
                            <th>{{ __('message.image') }}</th>
                            <th>{{ __('message.classes') }}</th>
                            <th>{{ __('message.room') }}</th>
                            <th>{{ __('message.time') }}</th>
                            <th>{{ __('message.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schudeli as $schude)
                            <tr>
                                <td>{{ $schude->id }}</td>
                                <td>{{ $schude->smena?->name_uz ?? '-' }}</td>
                                <td>{{ $schude->lesson?->name_uz ?? '-' }}</td>
                                <td>
                                    @if($schude->image)
                                        <img src="{{ asset('admin/images/'.$schude->image) }}" alt="schedule" class="table-img">
                                    @endif
                                </td>
                                <td>{{ Str::limit($schude->week_day, 15) }}</td>
                                <td>{{ $schude->room }}</td>
                                <td>{{ $schude->time }}</td>
                                <td class="action-btns d-flex">
                                    <a href="{{ route('admin.schedule.show', $schude->id) }}" class="btn btn-success btn-sm">{{ __('message.show') }}</a>
                                    <a href="{{ route('admin.schedule.edit', $schude->id) }}" class="btn btn-primary btn-sm">{{ __('message.edit') }}</a>
                                    <form action="{{ route('admin.schedule.destroy', $schude->id) }}" method="POST" onsubmit="return confirm('{{ __('message.delete_item') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('message.delete') }}</button>
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
