@extends('master')

@section('content')

    <div class="row">
        <div class="large-12 small-12 columns">
            @if (count($EmergencyUsers) === 0)
                <div id="main-alert" class="alert-box success margin-top" data-count="{{ count($EmergencyUsers) }}">
                    There are no emergencies at this time.
                </div>
            @else
                <div id="main-alert" class="alert-box alert margin-top" data-count="{{ count($EmergencyUsers) }}">
                    There are currently {{ count($EmergencyUsers) }} ongoing emergencies.
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="large-12 small-12 columns">
            <div class="panel">
                <h4>Emergency Monitoring Panel</h4>
                <table class="width-full" id="primary-table">
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
                            <td>
                                <a href="/profile/{{$ThisUser->id}}/" class="button small">View</a>
                                <input type="submit" class="button small success clear-button" value="Clear">
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

@section('check-script')
    <script>
        // Create a client instance
        client = new Paho.MQTT.Client("kbme.ca", 9001, "web_" + parseInt(Math.random() * 100, 10));

        // set callback handlers
        client.onConnectionLost = onConnectionLost;
        client.onMessageArrived = onMessageArrived;

        // connect the client
        client.connect({onSuccess: onConnect});


        // called when the client connects
        function onConnect() {
            // Once a connection has been made, make a subscription and send a message.
            console.log("onConnect");
            client.subscribe("EmergencyChannel");
        }

        // called when the client loses its connection
        function onConnectionLost(responseObject) {
            if (responseObject.errorCode !== 0) {
                console.log("onConnectionLost:" + responseObject.errorMessage);
            }
        }

        // called when a message arrives
        function onMessageArrived(message) {
            console.log("onMessageArrived:" + message.payloadString);
            var current = $("#main-alert");
            var currentCount = (parseInt(current.data("count")) + 1);
            current.data("count", currentCount);
            current.removeClass("success alert").addClass("alert").html("There are currently " + (currentCount) + " ongoing emergencies.");

            currentMessage = message.payloadString;
            currentArray = currentMessage.split('|');

            $("#primary-table tr:last").after("<tr><td>" + currentArray[0] + "</td><td>" + currentArray[1] + "</td><td>3</td><td>4</td></tr>");
        }

        $(document).ready(function () {
            var current;
            var currentCount;
            $(".clear-button").on("click", function () {
                console.log("Clearing row");
                message = new Paho.MQTT.Message("resolved");
                message.destinationName = "ResolvedChannel";
                client.send(message);

                current = $("#main-alert");
                currentCount = (parseInt(current.data("count")) - 1);
                current.data("count", currentCount);
                if (currentCount == 0) {
                    current.removeClass("success alert").addClass("success").html("There are currently " + (currentCount) + " ongoing emergencies.");
                } else {
                    current.removeClass("success alert").addClass("alert").html("There are currently " + (currentCount) + " ongoing emergencies.");
                }

                $(this).closest("tr").remove();
            });
        });
    </script>
@endsection
