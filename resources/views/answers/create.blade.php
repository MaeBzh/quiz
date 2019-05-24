@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add a Answer
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('questions.answers.store', compact('question')) }}">

                @csrf
                <div class="form-group">
                    <label for="name">Answer:</label>
                    <input id="name" type="text" class="form-control" name="name" required/>
                </div>
                <div class="form-group">
                    <label for="is_valid">Valid:</label>
                    <select id="is_valid" name="is_valid" class="form-control" required>
                        <option value="" selected>--Please choose an option--</option>
                        <option value="1">True</option>
                        <option value="0">False</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-auto">

                    </div>
                    <div class="col-auto">

                    </div>
                </div>
                <button type="submit" class="btn btn-success">Add</button>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Redirect back</a>
            </form>
        </div>
    </div>

@endsection