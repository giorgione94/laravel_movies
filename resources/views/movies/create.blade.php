@extends('layouts.app')


@section('content')
    <div class="card my-5">
        <div class="card-body">
            
            <form action="{{ route('movies.store') }}" method="POST">
                @csrf

                <div class="form-group m-2">
                    <label for="release_year">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group m-2">
                    <label for="release_year">Description</label>
                    <textarea class="form-control" name="description" rows="10"></textarea>
                </div>

                <div class="form-group m-2">
                    <label for="release_year">Genres</label>
                    <input type="text" class="form-control" name="genre">
                </div>

                <div class="form-group m-2">
                    <label for="release_year">Release Year</label>
                    <input type="date" class="form-control" name="release_year">
                </div>

                <div class="form-group m-2">
                    <label for="rating_star">Rating Stars</label>
                    <input type="text" class="form-control" name="rating_star">
                </div>

                <div class="form-group m-2">
                    <label for="image">Image</label>
                    <input type="text" class="form-control" name="image">
                </div>

                <button type="submit" class="btn btn-primary m-2 float-end">Submit</button>

            </form>
        </div>
    </div>
@endsection
