@extends('layouts.app')

@section('content')
    <div class="card">
        <img class="card-image-top" src="https://www.grazia.it/content/uploads/2016/04/Chris-Evans-g.jpg">
        <div class="card-body">
            <h1>Tony Stark</h1>
            <p>All Movies of Tony Stark</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="#">Avengers</a>
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="#" method="post">
                <button type="submit" class="btn btn-link float-end">Delete</button>
            </form>
        </div>
    </div>
@endsection
