@extends('master')

@section('content')

    <div class="row">
        <div class="large-12 small-12 columns">
            @if (count($EmergencyUsers) === 0)
                <div class="alert-box success margin-top">
                    There are no emergencies at this time.
                </div>
            @else
                <div class="alert-box alert margin-top">
                    There are currently {{ count($EmergencyUsers) }} ongoing emergencies.
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="large-12 small-12 columns">
            <div class="panel">
                <h4>Emergency Monitoring Panel</h4>
                <table class="width-full">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Contact #</th>
                        <th>User</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach ($EmergencyUsers as $ThisUser)
                        <tr>
                            <td class="user-id">{{ $ThisUser->id}}</td>
                            <td>{{ $ThisUser->number }}</td>
                            <td>{{ $ThisUser->name }}</td>
                            <td>{{ $ThisUser->updated_at }}</td>
                            <td><a href = "/profile/{{$ThisUser->id}}/{{$ThisUser->lat}}/{{$ThisUser->lng}}">View</a></td>
                            <td>Clear</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection