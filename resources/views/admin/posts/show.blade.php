@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>
                <div class="card-body">
                    <div class="card" style="width: 40rem;">
                        <img class="card-img-top" src="..." alt="Immagine di {{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Visualizza</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
