@extends('layouts.adminLayout')

@section('title', __('message.parents') . ': ' . __('message.create'))

@section('content')
<div class="main-content"><section class="section"><div class="container-fluid"><div class="card"><div class="card-header d-flex justify-content-between"><h4>{{ __('message.parents') }}: {{ __('message.create') }}</h4><a href="{{ route('admin.parentInfo.index') }}" class="btn btn-secondary btn-sm">{{ __('message.back') }}</a></div><div class="card-body">
<form action="{{ route('admin.parentInfo.store') }}" method="POST">
@csrf
@include('admin.parentInfo.form')
<button class="btn btn-primary" type="submit">{{ __('message.save') }}</button>
</form>
</div></div></div></section></div>
@endsection
