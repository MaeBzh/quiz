@extends('layouts.app')

@section('content')
    <form action="{{ route('games.store') }}" method="POST">
        @csrf
        @method('POST')

        <h2>Create a game</h2>
        <hr>

        @if (count($errors) > 0)
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label for="player1_name">Player one name</label>
        <input type="text" id="player1_name" name="player1_name" value="{{ old('player1_name') }}" class="form-control" required>

        <label for="player2_name">Player Two name</label>
        <input type="text" id="player2_name" name="player2_name" value="{{ old('player2_name') }}"class="form-control" required>

        <hr>
        <button type="submit" class="btn btn-success">Submit</button>

    </form>
@endsection