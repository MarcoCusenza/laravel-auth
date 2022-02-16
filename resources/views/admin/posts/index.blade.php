@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Tutti i post') }}</div>

                    <div class="card-body row p-5 ">
                        @foreach ($posts as $post)
                            <div class="card col-6 p-3" style="width: 18rem;">
                                <img class="card-img-top" src="..." alt="Immagine di {{ $post->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ $post->content }}</p>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Visualizza</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
