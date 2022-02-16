@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>
                <div class="card-body">
                    <div class="card" style="width: 40rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger">Elimina</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
