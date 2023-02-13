@extends('layouts.app')

@section('content')

    <h1 class="text-light">
        All Movies
        <a href="{{ route('movies.create') }}" class="btn btn-primary btn-sm fas fa-plus"></a>
    </h1>

    @unless(count($movies))
        <p>No Movies</p>
    @endunless

    <div class="row">
        @if (count($movies))
            @foreach ($movies as $movie)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $movie->image }}" class="card-img-top">
                        <div class="card-body">
                            <h3><a href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a></h3>
                            <div class="text-danger">
                                @for ($i = 1; $i <= $movie->rating_star; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            <p> {{ Str::limit($movie->description, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
