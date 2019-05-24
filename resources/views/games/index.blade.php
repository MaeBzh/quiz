@extends('layouts.app')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>GameId</th>
            <th>P1</th>
            <th>P1 points</th>
            <th>P2</th>
            <th>P2 points</th>
            <th>Show</th>
        </tr>
        </thead>
        <tbody>
        @forelse($games as $game)
            <tr>
                <td>{{ $game->getKey() }}</td>
                <td>{{ $game->playerOne->name }}</td>
                <td>{{ $game->player1_points }}</td>
                <td>{{ $game->playerTwo->name }}</td>
                <td>{{ $game->player2_points }}</td>
                <td><a href="{{ route('games.show',$game)}}" class="btn btn-primary">Show</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No games yet</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection