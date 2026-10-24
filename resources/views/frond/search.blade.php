@extends('admin.site')

@section('content')
<div class="mainContent withImage">
    <div class="imageHeader">
        <div class="container">
            <h1 class="pageTitle text-dark">{{ __('message.search') }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('message.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('message.search') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<main>
    <section>
        <div class="search">
            <div class="container mb-4">
                <form action="{{ route('search.posts') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="{{ __('message.search') }}..." value="{{ request('query') }}">
                        <button class="btn btn-primary" type="submit">{{ __('message.search') }}</button>
                    </div>
                </form>
            </div>

            <div class="container">
                @if(request('query'))
                    @if($posts->isEmpty() && $directors->isEmpty() && $employees->isEmpty())
                        <div class="emptyBox">
                            <i class="fas fa-search"></i>
                            <p>{{ __('message.no_results_found') }}</p>
                        </div>
                    @else
                        @if($posts->isNotEmpty())
                            <h2>{{ __('message.news') }}</h2>
                            <div class="row">
                                @foreach($posts as $post)
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <a href="{{ route('newsDetail', $post->id) }}">
                                            <div class="imageBox">
                                                <img src="{{ $post->image && file_exists(public_path('admin/images/' . $post->image)) ? asset('admin/images/' . $post->image) : asset('admin/images/1747704545.jpg') }}" alt="{{ $post->{'title_' . app()->getLocale()} }}" style="width: 200px">
                                            </div>
                                            <h5>{{ $post->{'title_' . app()->getLocale()} }}</h5>
                                            <p>{{ Str::limit($post->{'body_' . app()->getLocale()}, 100) }}</p>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if($employees->isNotEmpty())
                            <h2>{{ __('message.employees') }}</h2>
                            <div class="row">
                                @foreach($employees as $employee)
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <a href="{{ route('teacher.detail', $employee->id) }}">
                                            <div class="imageBox">
                                                <img src="{{ $employee->image && file_exists(public_path('admin/images/' . $employee->image)) ? asset('admin/images/' . $employee->image) : asset('image/23-maktab-logo.svg') }}" alt="{{ $employee->{'name_' . app()->getLocale()} }}" style="width: 200px">
                                            </div>
                                            <h5>{{ $employee->{'name_' . app()->getLocale()} }}</h5>
                                            <span>{{ $employee->position->{'name_' . app()->getLocale()} }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endif
                @else
                    <div class="emptyBox">
                        <i class="fas fa-search"></i>
                        <p>{{ __('message.enter_search_term') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
</main>
@endsection
