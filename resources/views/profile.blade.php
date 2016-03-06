@extends('master')

@section('content')

    <div class="row">
        <div class="large-12 small-12 columns">
            <div class="panel">
                <h4>Customers Profile Panel</h4>
                <table class="width-full">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>User</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach ($EmergencyUsers as $ThisUser)
                        <tr>
                            <td>{{ $ThisUser->number }}</td>
                            <td>{{ $ThisUser->name }}</td>
                            <td>{{ $ThisUser->updated_at }}</td>
                            <td>View</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection