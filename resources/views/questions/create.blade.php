@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add a Question
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('questions.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="type">Question:</label>
                    <input type="text" class="form-control" name="question"/>
                    <label for="type">Category:</label>
                    <input type="text" class="form-control" name="category"/>
                    <label for="type">Difficulty:</label>
                    <input type="number" class="form-control" name="difficulty"/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    <button type="button" onclick="window.location='{{ route("questions.index") }}'">Back index</button>
@endsection