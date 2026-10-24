@extends('admin.site')

@section('title', __('message.Dars jadvali tafsilotlari'))

@section('content')
<main>
    <section class="education-detail py-5">
        <div class="container">
            <a href="{{ route('education') }}" class="btn btn-outline-primary mb-4">
                <i class="fas fa-arrow-left me-2"></i>{{ __('message.Orqaga') }}
            </a>

            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="row g-0">
                    <div class="col-lg-6 bg-light d-flex align-items-center justify-content-center p-4">
                        @if($schedule->image && file_exists(public_path('admin/images/' . $schedule->image)))
                            <img src="{{ asset('admin/images/' . $schedule->image) }}" alt="{{ $schedule->week_day }}" class="img-fluid rounded-3 detail-image">
                        @else
                            <img src="{{ asset('image/oqtuvchi.png') }}" alt="{{ __('message.schedule') }}" class="img-fluid rounded-3 detail-image">
                        @endif
                    </div>

                    <div class="col-lg-6 p-4 p-md-5">
                        <span class="badge bg-primary mb-3">{{ $schedule->smena['name_' . app()->getLocale()] ?? __('message.shifts') }}</span>
                        <h1 class="h2 text-primary mb-4">{{ $schedule->week_day }}</h1>

                        <dl class="row mb-0 schedule-info">
                            <dt class="col-sm-5">{{ __('message.Fan') }}</dt>
                            <dd class="col-sm-7">{{ $schedule->lesson['name_' . app()->getLocale()] ?? __('message.not_specified') }}</dd>

                            <dt class="col-sm-5">{{ __('message.Xona') }}</dt>
                            <dd class="col-sm-7">{{ $schedule->room ?: __('message.not_specified') }}</dd>

                            <dt class="col-sm-5">{{ __('message.Vaqti') }}</dt>
                            <dd class="col-sm-7">{{ $schedule->time ?: __('message.not_specified') }}</dd>

                            @if($schedule->employee)
                                <dt class="col-sm-5">{{ __('message.Oqituvchi') }}</dt>
                                <dd class="col-sm-7">{{ $schedule->employee['name_' . app()->getLocale()] }}</dd>
                            @endif
                        </dl>

                        <div class="mt-4 p-3 rounded-3 bg-light text-muted">
                            {{ __('message.Dars jadvali tafsilotlari') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    .detail-image {
        max-height: 430px;
        width: 100%;
        object-fit: contain;
    }

    .schedule-info dt,
    .schedule-info dd {
        padding: 10px 0;
        border-bottom: 1px solid #edf0f5;
    }

    .schedule-info dt {
        color: #687386;
        font-weight: 600;
    }

    .schedule-info dd {
        color: #172033;
        font-weight: 500;
    }
</style>
@endsection
