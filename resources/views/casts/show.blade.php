@extends('layouts.app')

@section('content')

    <div class="card my-4">

        <div class="card m-3" style="widht:18rem;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $cast->image }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div>
                            <h1 class="card-title"> {{ $cast->name }} </h1>
                        </div>

                        <div>
                            <p>Descrizione Attore</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">

            <h1 class="text">All Movies</h1>

            <ul class="list-group list-group-flush">
                
                @if (count($cast->movies))
                    @foreach ($cast->movies as $movie)
                        <li class="list-group-item">
                            <a href="{{ route('movies.show', $movie->id) }}">
                                <img src="{{ $movie->image }}" class="card-img-top" style="width: 18rem;">
                            </a>
                        </li>
                    @endforeach
                @endif

            </ul>
        </div>
    </div>
@endsection
