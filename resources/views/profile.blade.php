@extends('master')

@section('content')

    <div class="row">
        <div class="large-12 small-12 columns">
            <div class="panel margin-top">
                <h4>Customers Profile Panel</h4>
                <table class="width-full">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Date Registered</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach ($Users as $ThisUser)
                        <tr>
                            <td>{{ $ThisUser->id}}</td>
                            <td>{{ $ThisUser->name }}</td>
                            <td>{{ $ThisUser->Home_Address }}</td>
                            <td>{{ $ThisUser->created_at }}</td>
                            <td><a href="/profile/{{$ThisUser->id}}">View</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection