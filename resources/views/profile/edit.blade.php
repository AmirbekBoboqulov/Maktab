@extends('layouts.adminLayout')

@section('title', 'Profil')

@section('content')
<div class="container-fluid profile-page">
    <h2 class="mb-4">Profil</h2>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>

<style>
    .profile-page { max-width: 900px; }
    .profile-page input { width: 100%; max-width: 520px; padding: .5rem .75rem; border: 1px solid #ced4da; border-radius: .375rem; }
    .profile-page button { margin-top: .5rem; }
</style>
@endsection
