@extends('admin.site')

@section('content')
<style>
    .parents-section {
        background: #f8f9ff;
        padding: 32px 0 56px;
    }

    .parents-page-header {
        margin-bottom: 0;
    }

    .parents-page-header .imageHeader {
        margin-bottom: 0;
    }

    .parents-content {
        width: min(1120px, calc(100% - 48px));
        margin: 0 auto;
    }

    .parents-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .parents-grid-single {
        grid-template-columns: minmax(0, 920px);
        justify-content: center;
    }

    .parent-info-card {
        min-width: 0;
        margin: 0;
        padding: 24px 28px;
        border: 1px solid #e1e6f0;
        border-left: 4px solid #2a3fcc;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 5px 16px rgba(28, 45, 85, 0.06);
        text-align: left;
    }

    .parent-info-card h2 {
        margin: 0 0 12px;
        color: #202633;
        font-size: 22px;
        font-weight: 700;
        line-height: 1.35;
    }

    .parent-info-card p {
        margin: 0;
        color: #4c5668;
        font-size: 16px;
        line-height: 1.75;
        overflow-wrap: anywhere;
    }

    .parents-empty {
        padding: 40px 20px;
        color: #687386;
        text-align: center;
    }

    .parents-contact {
        margin-top: 32px;
        text-align: center;
    }

    @media (max-width: 700px) {
        .parents-section {
            padding: 32px 0 48px;
        }

        .parents-content {
            width: min(100% - 32px, 560px);
        }

        .parents-grid {
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .parent-info-card {
            padding: 20px;
        }

        .parent-info-card h2 {
            font-size: 19px;
        }
    }
</style>

<div class="mainContent withImage parents-page-header">
    <div class="imageHeader" style="padding-bottom: 0px;">
        <div class="container">
            <h1 class="pageTitle text-dark">{{ __('message.OtaOnalar') }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('message.home') }}</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ __('message.OtaOnalar') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<main>
    <section class="parents-section">
        <div class="parents-content">
            <div class="parents-grid {{ $parentInfos->count() === 1 ? 'parents-grid-single' : '' }}">
            @forelse($parentInfos as $parentInfo)
                <article class="parent-info-card">
                    <h2>{{ $parentInfo['title_' . app()->getLocale()] }}</h2>
                    <p>{{ $parentInfo['body_' . app()->getLocale()] }}</p>
                </article>
            @empty
                <p class="parents-empty">{{ __('message.Maʼlumot mavjud emas') }}</p>
            @endforelse
            </div>

            <div class="parents-contact">
                <a class="btn btn-primary" href="{{ route('connect') }}">{{ __('message.Boglanish') }}</a>
            </div>
        </div>
    </section>
</main>
@endsection
