@extends('layouts.adminLayout')
@section('content')

    <div class="col-md-8 offset-md-2">
        <form action="{{ route('admin.categorychildren.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <h5 class="card-header">{{ __('message.edit_child_category') }}</h5>
                <div class="card-body">
                    <a href="{{ route('admin.categorychildren.index') }}" class="btn btn-success">{{ __('message.back') }}</a>

                    <div class="mb-4">
                        <label for="name_uz" class="form-label">{{ __('message.name_uz_short') }}</label>
                        <input type="text" class="form-control" id="name_uz" placeholder="{{ __('message.name') }}..." name="name_uz" value="{{ $category->name_uz }}">
                    </div>

                    <div class="mb-4">
                        <label for="name_ru" class="form-label">{{ __('message.name_ru_short') }}</label>
                        <input type="text" class="form-control" id="name_ru" placeholder="{{ __('message.name') }}..." name="name_ru" value="{{ $category->name_ru }}">
                    </div>
                     <div class="mb-3">
                        <label for="category_id" class="form-label">{{ __('message.category') }}</label>
                        <select name="category_id" class="form-control" id="category_id">
                            @foreach($Category as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name_uz }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">{{ __('message.update') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
