@extends('layouts.app')

@section('content')
    <h2>Game</h2>
    <hr>

    @if(!empty($game_user_question))
        <h3>Player {{ $game_user_question->user->name }} turn !</h3>
        <hr>
        <div class="row">
            <div class="col-12 col-md-6">
                <h3 class='font-weight-bold'> {{ $game_user_question->question->question }} ?</h3>
            </div>
            <div class="col-12 col-md-6">
                <form method='POST' action='{{ route('games.answer', [
            'game' => $game_user_question->game,
            'user' => $game_user_question->user,
            'question' => $game_user_question->question,
        ]) }}'>
                    @csrf
                    @method('POST')
                    <ul class="list-group w-100">
                        @foreach($game_user_question->question->answers as $answer)
                            <li class="list-group-item text-center col-md-6">
                                Answer {{ $loop->iteration }} :
                                <button type="submit" class="btn btn-primary ml-1" name="answer"
                                        value="{{ $answer->getKey() }}">
                                    {{ $answer->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    @else
                        <h1 class="text-center">Fin de la partie !</h1>
                        <hr>
                        <br> {{ $game->playerOne->name }} has {{ $game->player1_points }} points !
                        <br> Player {{ $game->playerTwo->name }} has {{ $game->player2_points }} points !
                        <br>
                        @if($game->getWinner() !== null)
                            <h2 class="text-center">{{ $game->getWinner()->name }} wins, obviously.</h2>
                        @else
                            <h2 class="text-center">Draw !</h2>
                        @endif
                    @endif
                </form>
            </div>
        </div>
@endsection