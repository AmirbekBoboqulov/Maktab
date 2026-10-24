@extends('layouts.adminLayout')
@section('title', __('message.create_resource'))

@section('content')
<div class="col-md-8 offset-md-2">
    <form action="{{ route('admin.usefulResource.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <h5 class="card-header">{{ __('message.create_resource') }}</h5>
            <div class="card-body">
                <a href="{{ route('admin.usefulResource.index') }}" class="btn btn-success btn-sm mb-3">{{ __('message.back') }}</a>

                @php
                    $fields = [
                        ['name'=>'title_uz','label'=>__('message.title_uz')],
                        ['name'=>'title_ru','label'=>__('message.title_ru')],
                        ['name'=>'body_uz','label'=>__('message.content_uz')],
                        ['name'=>'body_ru','label'=>__('message.content_ru')],
                        ['name'=>'url','label'=>__('message.url'),'type'=>'url'],
                        ['name'=>'image','label'=>__('message.image'),'type'=>'file']
                    ];
                @endphp

                @foreach($fields as $field)
                    <div class="mb-3">
                        <label for="{{ $field['name'] }}" class="form-label">{{ $field['label'] }}</label>
                        <input 
                            type="{{ $field['type'] ?? 'text' }}" 
                            class="form-control @error($field['name']) is-invalid @enderror" 
                            id="{{ $field['name'] }}" 
                            name="{{ $field['name'] }}" 
                            placeholder="{{ $field['label'] }}..." 
                            value="{{ old($field['name']) }}"
                            @if(isset($field['type']) && $field['type']=='file') value="" @endif
                        >
                        @error($field['name'])
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach

                <button class="btn btn-primary" type="submit">{{ __('message.save') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
