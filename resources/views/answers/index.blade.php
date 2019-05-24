@extends('layouts.app')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 mb-4">
                    <a href="{{ route('questions.answers.create') }}" class="btn btn-success">Add a answer</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>name</th>
                            <th>Valid</th>
                            <th>Question_id</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        @foreach($answer as $answer)
                            <tr>
                                <td>{{$answer->id}}</td>
                                <td>{{$answer->name}}</td>
                                <td>{{$answer->is_valid == true ? "true" : "false"}}</td>
                                <td>{{$answer->question_id}}</td>
                                <td>{{$answer->created_at}}</td>
                                <td>{{$answer->updated_at}}</td>
                                <td><a href="{{ route('questions.answers.edit',$answer)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('questions.answers.destroy', $answer)}}" onsubmit="return confirm('Are you sure ?')">
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection

