@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Post') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('posts.store') }}">
                            @csrf
                            {{--TITLE--}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            </div>
                            @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            {{--CONTENT--}}
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content">{{ old('content', '') }}</textarea>
                            </div>
                            @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            {{--SUBMIT--}}
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm btn-primary me-1">Submit</button>
                                <a href="{{ route('home') }}" class="btn btn-sm btn-warning">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
