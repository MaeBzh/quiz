@extends('layouts.app')

@section('content')
    <div class="col-lg-6 col-lg-offset-3">
        <div class="row">
            <div class="col">
                <h4>Question</h4>
            </div>
            <div class="col-auto">
                <a href="{{ route('questions.edit', compact('question')) }}" class="btn btn-primary">
                    Edit
                </a>
            </div>
            <div class="col-auto">
                <form method="post" action="{{ route('questions.destroy', compact('question'))}}" onsubmit="return confirm('Are you sure ?')">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        <div class="form-group">
            <label for="">Question</label>
            {{ Form::text('question', $question->question, ['class' => 'form-control', 'readonly' => true]) }}
            <label for="">Category</label>
            {{ Form::text('category', $question->category, ['class' => 'form-control', 'readonly' => true]) }}
            <label for="">Difficulty</label>
            {{ Form::number('difficulty', $question->difficulty, ['class' => 'form-control', 'readonly' => true]) }}
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h4>Show answers</h4>
            </div>
            <div class="col-auto">
                <a href="{{ route('questions.answers.create', compact('question')) }}" class="btn btn-success">
                    Add an answer
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>IsValid</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
            @forelse($answers as $answer)
                <tr>
                    <td>{{$answer->id}}</td>
                    <td>{{$answer->name}}</td>
                    <td>{{$answer->is_valid ? 'Yes' : 'No'}}</td>
                    <td><a href="{{ route('questions.answers.edit', compact('question', 'answer'))}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form method="post" action="{{ route('questions.answers.destroy', compact('question', 'answer'))}}" onsubmit="return confirm('Are you sure ?')">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        No records
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection