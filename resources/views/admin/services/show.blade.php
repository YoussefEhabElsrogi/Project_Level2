@extends('admin.master')

@section('title', __('keywords.show_service'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.show_service') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="title">{{ __('keywords.title') }}</label>
                                    <p>{{ $service->title }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="icon">{{ __('keywords.icon') }}</label>
                                    <div class="mt-2">
                                        {{ $service->icon }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description">{{ __('keywords.description') }}</label>
                                    <p>{{ $service->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
