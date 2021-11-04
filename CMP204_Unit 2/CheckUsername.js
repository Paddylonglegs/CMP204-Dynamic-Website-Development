/*
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
*/

$(document).ready(function(){ //When page loaded

    $("#username").keyup(function(){ //checking if the User is typing something

        var Username = $(this).val().trim(); //Setting input of form to variable

        if(Username != '')//checking if the field not null (User Typing)
        {

            jQuery.ajax({
                url: 'CheckUsername.php', //Using php file to check if Username is in database.
                data: 'username='+$("#username").val(), //Setting the input from user as the data
                type: 'post',
                success: function(data) //Database search is complete
                {

                    $("#Availability").html(data); //Output availability to user

                }
            });
        }
        else
        {
            $("#Availability").html(" "); //Don't Output anything
        }

        });

    });