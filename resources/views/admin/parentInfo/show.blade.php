@extends('layouts.adminLayout')

@section('title', __('message.parents'))

@section('content')
<div class="main-content"><section class="section"><div class="container-fluid"><div class="card"><div class="card-header d-flex justify-content-between"><h4>{{ $parentInfo->title_uz }}</h4><a href="{{ route('admin.parentInfo.index') }}" class="btn btn-secondary btn-sm">{{ __('message.back') }}</a></div><div class="card-body"><h5>{{ $parentInfo->title_ru }}</h5><p>{{ $parentInfo->body_uz }}</p><hr><p>{{ $parentInfo->body_ru }}</p><a href="{{ route('admin.parentInfo.edit', $parentInfo) }}" class="btn btn-primary">{{ __('message.edit') }}</a></div></div></div></section></div>
@endsection
