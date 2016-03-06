@extends('master')

@section('content')

    <div class="row">
        <div class="large-12 small-12 columns">
            <div class="panel margin-top">
                <h4>Emergency Log Panel</h4>
                <table class="width-full">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach ($History as $ThisUser)
                        <tr>
                            <td>{{ $ThisUser->User_ID}}</td>
                            <td>{{ $ThisUser->StartTime }}</td>
                            <td>{{ $ThisUser->EndTime }}</td>
                            <td>{{ $ThisUser->Action }}</td>
                            <td>View</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection