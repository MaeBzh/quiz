@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="col-lg-6 col-lg-offset-3">
        <h3>Edit Question</h3>
        {!! Form::model($question, [
            'url' => route('questions.update', ['question' => $question ]),
            'method' => 'PUT'
        ]) !!}
        <div class="form-group">
            <label for="">Question</label>
            {{ Form::text('question', null, ['class' => 'form-control']) }}
            <label for="">Category</label>
            {{ Form::text('category', null, ['class' => 'form-control']) }}
            <label for="">Difficulty</label>
            {{ Form::number('difficulty', null, ['class' => 'form-control']) }}
        </div>
        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    </div>
    {!! Form::close() !!}

@endsection