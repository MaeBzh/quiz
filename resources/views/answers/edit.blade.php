@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="col-lg-6 col-lg-offset-3">
        <h3>Edit Answer</h3>
        {!! Form::model($answer, [
            'url' => route('update_answer', $answer),
            'method' => 'PUT'
        ]) !!}
        <div class="form-group">
            <label for="">Answer</label>
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            <label for="">Valid</label>
            {{ Form::text('is_valid', null, ['class' => 'form-control']) }}
            <label for="">Question_id</label>
            {{ Form::number('question_id', null, ['class' => 'form-control']) }}
        </div>
        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    </div>
    {!! Form::close() !!}

@endsection