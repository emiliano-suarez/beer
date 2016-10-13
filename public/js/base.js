$(document).ready(function(){

    $('.button-collapse').sideNav({
        menuWidth: 280, // Default is 240
        edge: 'left', // Choose the horizontal origin
        closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        }
    );

    $('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
        starting_top: '4%', // Starting top style attribute
        ending_top: '10%' // Ending top style attribute
    });

    $("#btnLoginForm").click(function() {
        $.ajax({
            type: 'POST',
            url: "/login",
            data: $('#loginForm').serialize(),
            dataType: "html",
            success: function( html ) {
                $('#modalLogin').closeModal();
                window.location.href = "/";
            },
            error: function(err) {
                // TODO: catch errors to show friendly message to the user
                // alert('response: ' + response.error);
                // var response = $.parseJSON(err.responseText);
                console.log(err);
            return false;
            }
        });
    });

    $("#btnForgotPassword").click(function() {
        $('#modalForgotPassword').openModal();
    });
    
    $("#btnSendForgotPassEmail").click(function() {
        $('#forgotPasswordForm').submit();
        Materialize.toast('Te hemos enviado un email para que puedas generar una nueva clave!', 4000);

        setTimeout(function(){
            $('#modalForgotPassword').closeModal();
        }, 4000);
        
    });

});
