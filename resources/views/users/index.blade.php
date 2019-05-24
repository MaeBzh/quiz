@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 mb-4">
                <a href="{{ route('users.create') }}" class="btn btn-success">Create user</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>
                                <a href="{{ route('users.show', compact('user'))}}" class="btn btn-primary">Show</a>
                            </td>
                            <td>
                                <a href="{{ route('users.edit', compact('user'))}}" class="btn btn-secondary">Edit</a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('users.destroy', compact('user'))}}"
                                      onsubmit="return confirm('Are you sure ?')">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                No records
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

