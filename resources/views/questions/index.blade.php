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
                    <a href="{{ route('questions.create') }}" class="btn btn-success">Add a question</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Question</th>
                            <th>Category</th>
                            <th>Difficulty</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        @forelse($questions as $question)
                            <tr>
                                <td>{{$question->id}}</td>
                                <td>{{$question->question}}</td>
                                <td>{{$question->category}}</td>
                                <td>{{$question->difficulty}}</td>
                                <td>{{$question->created_at}}</td>
                                <td>{{$question->updated_at}}</td>
                                <td><a href="{{ route('questions.show', compact('question'))}}" class="btn btn-primary">Show</a></td>
                                <td><a href="{{ route('questions.edit', compact('question'))}}" class="btn btn-secondary">Edit</a></td>
                                <td>
                                    <form method="post" action="{{ route('questions.destroy', compact('question'))}}" onsubmit="return confirm('Are you sure ?')">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
                                        No records
                                    </td>
                                </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

