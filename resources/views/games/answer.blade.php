@extends('layouts.app')

@section('content')
    <h2>Game</h2>
    <hr>

    @if($response === 'success')
        <h1 class="text-center text-success"> Well done !</h1>
    @else
        <h1 class="text-center text-danger"> You suck !</h1>
    @endif
    <hr>
    <a href="{{ route('games.show', $game) }}" class="btn btn-primary"> Next question -></a>
@endsection