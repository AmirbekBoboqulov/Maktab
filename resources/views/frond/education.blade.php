@extends('admin.site')
@section('content')

<div class="mainContent withImage">
    <div class="imageHeader" style="padding-bottom: 0px;">
        <div class="container">
            <h1 class="pageTitle text-dark">{{ __("message.Ta'lim") }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}">{{ __('message.home') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __("message.Ta'lim") }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<main class="py-5">
    <section>
        <div class="container">
            @php
                $visibleSmenaTypes = request()->filled('category')
                    ? $smenaType->where('id', (int) request('category'))
                    : $smenaType;
            @endphp
            <!-- Smena tabs -->
            <ul class="nav nav-tabs mb-4" id="smenaTabs" role="tablist">
                @foreach($visibleSmenaTypes as $smena)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                id="smena{{ $smena->id }}-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#smena{{ $smena->id }}"
                                type="button" role="tab">
                            {{ $smena['name_' . app()->getLocale()] }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">
                @foreach($visibleSmenaTypes as $smena)
                    @php
                        $smenaSchedules = $educations->where('smena_id', $smena->id);
                    @endphp

                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                         id="smena{{ $smena->id }}" role="tabpanel">

                        <div class="row g-4">
                            @foreach($smenaSchedules as $schedule)
                                <div class="col-md-6 col-lg-4">
                                    <a href="{{ route('educationDetail', $schedule->id) }}"
                                       class="text-decoration-none">
                                        <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden
                                                    bg-primary bg-gradient text-white
                                                    d-flex flex-row align-items-center p-3
                                                    transition-all hover-shadow">
                                            <!-- Rasm -->
                                            <div class="me-3 flex-shrink-0">
                                                   <img src="{{ $schedule->image && file_exists(public_path('admin/images/' . $schedule->image)) ? asset('admin/images/' . $schedule->image) : asset('image/23-maktab-logo.svg') }}"
                                                       alt="23-maktab, {{ $schedule->week_day }}"
                                                     class="img-fluid rounded-3"
                                                       width="90" height="90"
                                                       style="object-fit: contain; background-color: #f6f3e9;">
                                            </div>

                                            <!-- Matn -->
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-bold">{{ $schedule->week_day }}</h5>
                                                <small class="opacity-75">{{ __('message.Dars jadvali') }}</small>
                                            </div>

                                            <!-- Arrow icon -->
                                            <div class="ms-2">
                                                <i class="fas fa-arrow-right"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <!-- Agar ma’lumot bo‘lmasa -->
                        @if($smenaSchedules->isEmpty())
                            <div class="text-center py-5 text-muted">
                                <i class="fas fa-calendar-times fa-3x mb-3"></i>
                                <p>{{ __('message.Hozircha dars jadvali mavjud emas') }}</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@endsection
