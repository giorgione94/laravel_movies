@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-light mb-3">
                    All Movies
                    <a href="{{ route('movies.create') }}" class="btn btn-primary btn-sm fas fa-plus"></a>
                </h1>

                @unless(count($movies))
                    <p class="text-light mb-3">No Movies</p>
                @endunless

                <div class="row justify-content-center">
                    @if (count($movies))
                        @foreach ($movies as $movie)
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ $movie->image }}" class="card-img-top">
                                    <div class="card-body">
                                        <h3>
                                            <a href="{{ route('movies.show', $movie->id) }}">
                                                {{ $movie->title }}
                                            </a>
                                        </h3>
                                        <div class="text-danger mt-3">
                                            @for ($i = 1; $i <= $movie->rating_star; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                        <p class="text mt-2"> {{ Str::limit($movie->description, 100) }} </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
