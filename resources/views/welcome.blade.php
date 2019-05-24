@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome to 'Qui veut gagner des pepettes ?'</h1>
        <hr>

        <div class="row pt-5">
            <div class="col">
                <a href="#{{-- route('games.create') --}}" class="btn btn-primary btn-lg disabled">
                    <h2>One player (soon !)</h2>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('games.create') }}" class="btn btn-success btn-lg">
                    <h2>Two players</h2>
                </a>
            </div>
        </div>
    </div>
@endsection