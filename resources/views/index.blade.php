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
                            <td><form action="http://localhost:8500/api/user/{{$ThisUser->id}}/clear?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6XC9cLzE5OS4xMTYuMjQwLjM3XC9hcGlcL2F1dGhlbnRpY2F0ZSIsImlhdCI6MTQ1NzIzOTY3MCwiZXhwIjoxNDg4Nzc1NjcwLCJuYmYiOjE0NTcyMzk2NzAsImp0aSI6IjM1YTA3MGVkY2Y4MTI4N2VmNTM0ZDNhZGZlMTE4ZGZhIn0.IVGIOPLwUmVErU2V5QM51v0OvsgKA4lEqUEZCvzXx0A" method="post">
                                    <input type="submit">
                                </form></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

@section('check-script')
    <script src="/js/scripts.js"></script>
@endsection
