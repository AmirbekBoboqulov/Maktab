@extends('admin.site')
@section('content')

        <!-- Image Header Start-->
        <div class="mainContent withImage">
            <div class="imageHeader" style="padding-bottom: 0px;">
                <div class="container">
                    <h1 class="pageTitle text-dark">{{ __('message.Yangiliklar') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol id="w5" class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('message.home') }}</a></li>
                            <li class="breadcrumb-item " aria-current="page">{{ __('message.Yangiliklar') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Image Header End -->
<!-- Header End -->

<!-- Main section Start -->
<main>
    <section>
        <div class="schoolNews">
            <div class="container">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tab1">
                        <div class="imageCardBoxes">
                            <div class="row">

                                @foreach($posts as $post)
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".6s">
                                        <a href="{{ route('newsDetail', $post->id) }}" class="text-decoration-none text-dark">
                                            <div class="imageBox">
                                                <img alt="image" src="{{ $post->image && file_exists(public_path('admin/images/' . $post->image)) ? asset('admin/images/' . $post->image) : asset('admin/images/1747704545.jpg') }}" width="170px">
                                            </div>
                                            <h1>{{ $post->{'title_' . app()->getLocale()} ?: __('message.news_fallback') }}</h1>
                                            <p>{{ Str::limit(strip_tags($post->{'body_' . app()->getLocale()}), 120) }}</p>
                                            <span>{{ $post->created_at->locale(app()->getLocale())->translatedFormat('d F Y') }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</main>
<!-- Main section End -->

@endsection
