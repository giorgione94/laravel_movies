@extends('layouts.app')


@section('content')

    <div class="col d-flex justify-content-center">

        <div class="card my-4">
            <div class="card m-3" style="widht:18rem;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $movie->image }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 class="card-title text-center"> {{ $movie->title }} </h1>
                            <p>{{ $movie->description }}</p>
                            <p> {{ $movie->genre }} </p>
                            <p> {{ $movie->release_year }} </p>
                            <div class="text-danger mb-3">
                                @for ($i = 1; $i <= $movie->rating_star; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            <div>
                                <h2 class="text-center">Cast
                                    @auth
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    @endauth
                                </h2>

                                <ul class="list-group list-group-flush">
                                    @if (count($movie->casts))
                                        @foreach ($movie->casts as $cast)
                                            <li class="list-group-item">
                                                <a href="{{ route('casts.show', $cast->id) }}">
                                                    {{ $cast->name }}
                                                </a> -
                                                <span class="text-muted font-italic">
                                                    {{ $cast->pivot->role }}
                                                </span>
                                                @auth
                                                    <form action="{{ route('movie_cast_destroy', [$movie->id, $cast->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-link float-end">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endauth
                                            </li>
                                        @endforeach
                                    @else
                                        No Casts!
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card m-3" style="widht:18rem;">
                <div>
                    <h3 class="text-center">Comments</h3>

                    <ul class="list-group list-group-flush">
                        @if (count($movie->comments))
                            @foreach ($movie->comments as $comment)
                                <li class="list-group-item"><b>{{ $comment->user->name }}: </b>{{ $comment->content }}
                                    @auth
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link text-danger">Delete</button>
                                        </form>
                                    @endauth
                                </li>
                            @endforeach
                        @else
                            <p class="m-2"> No Comments! </p>
                        @endif

                    </ul>
                </div>

                <div class="mt-3">
                    @auth
                        <form action="{{ route('movies.comments.store', $movie->id) }}" method="POST">
                            @csrf
                            <input type="text" name="comment" class="form-control" placeholder="say something...">
                            <button type="submit" class="btn btn-primary mt-2 float-end">Comment</button>
                        </form>
                    @endauth
                </div>
            </div>

            @auth
                <div class="card-footer">
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link float-end">Delete</button>
                    </form>
                </div>
            @endauth
        </div>


        @auth
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Cast</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1>Cast Role</h1>
                                    <form action="{{ route('movie_cast_store', $movie->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">

                                            <label for="">Actor Name</label>

                                            <select name="cast_movie_name" class="form-control">
                                                <option value="">Choose Cast</option>
                                                @if (count($casts))
                                                    @foreach ($casts as $cast)
                                                        <option value="{{ $cast->id }}">{{ $cast->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                        </div>

                                        <div class="form-group">

                                            <label for="">Role</label>
                                            <input type="text" name="cast_movie_role" id="" class="form-control">
                                        </div>

                                        <button type="submit" class="btn btn-primary float-end mt-2">Submit</button>

                                    </form>
                                </div>

                                <div class="col-md-6">
                                    <h1>New Cast</h1>
                                    <form action="{{ route('casts.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Actor Name</label>
                                            <input type="text" name="cast_name" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Actor Image</label>
                                            <input type="text" name="cast_image" id="" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary float-end mt-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
