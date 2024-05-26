@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-{{ session('status_type') ?? 'success' }}" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Admin Index
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
