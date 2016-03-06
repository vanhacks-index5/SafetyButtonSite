@extends('master')

@section('content')

    <div class="row">
        <div class="large-12 small-12 columns">
            <div class="panel">
                <h4>Client Profile Panel</h4>
            <table>
                <tbody>
                <tr>
                    <td>ID</td>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{$user->Name}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <td>Home Address</td>
                    <td>{{$user->Home_Address}}</td>
                </tr>
                <tr>
                    <td>Work Address</td>
                    <td>{{$user->Work_Address}}</td>
                </tr>
                <tr>
                    <td>Children Names</td>
                    <td>{{$user->ChildrenNames}}</td>
                </tr>
                <tr>
                    <td>Legal Orders</td>
                    <td>{{$user->Legal_Orders}}</td>
                </tr>
                <tr>
                    <td>License_Plate</td>
                    <td>{{$user->License_Plate}}</td>
                </tr>
                <tr>
                    <td>Emergency</td>
                    <td>{{$user->emergency}}</td>
                </tr>
                <tr>
                    <td>Emergency Code</td>
                    <td>{{$user->emergency_code}}</td>
                </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>Perpetrator Name</td>
                    <td>{{$user->Partner_Name}}</td>
                </tr>
                <tr>
                    <td>Perpetrator Home Address</td>
                    <td>{{$user->Partner_Home_Address}}</td>
                </tr>
                <tr>
                    <td>Perpetrator Work Address</td>
                    <td>{{$user->Partner_Work_Address}}</td>
                </tr>
                <tr>
                    <td>Perpetrator License Plate</td>
                    <td>{{$user->Partner_License_Plate}}</td>
                </tr>
                </tbody>
            </table>

            <iframe
                    width="100%"
                    height="450"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDmfHnyvhOGHaEb0gSg9Y_wFrMkeVhGhFw
                        &q=49.2496600,-123.1193400" allowfullscreen>
            </iframe>

        </div>
    </div>
@endsection