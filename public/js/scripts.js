

var emergencyUsersDB = [];
var emergencyUsersPage = [];

var contents = $('.user-id');
for(var i = 0; i < contents.length; i++){
    emergencyUsersPage.push(Number(contents[i].innerHTML));
}



var check = function() {
    var emergencyUsers = window.location.href + "api/emergencyusers?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6XC9cLzE5OS4xMTYuMjQwLjM3XC9hcGlcL2F1dGhlbnRpY2F0ZSIsImlhdCI6MTQ1NzIzOTY3MCwiZXhwIjoxNDg4Nzc1NjcwLCJuYmYiOjE0NTcyMzk2NzAsImp0aSI6IjM1YTA3MGVkY2Y4MTI4N2VmNTM0ZDNhZGZlMTE4ZGZhIn0.IVGIOPLwUmVErU2V5QM51v0OvsgKA4lEqUEZCvzXx0A";
    $.getJSON( emergencyUsers, {
        format: "json"
    })
        .done(function( data ) {
            emergencyUsersDB = [];

            for(var i = 0; i < data.length; i++){
                emergencyUsersDB.push(data[i].id);
                console.log(data[i].id)
            }


            if($(emergencyUsersDB).not(emergencyUsersPage).length !== 0 && $(emergencyUsersDB).not(emergencyUsersPage).length !== 0){
                location.reload();
            }
        });
};

check();


setInterval(function(){ check() }, 5000);
