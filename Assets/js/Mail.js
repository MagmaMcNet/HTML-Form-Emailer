function Send_Mail(_To, _User, _app) {
    var email = document.getElementById("Email").value;
    var Msg = document.getElementById("Message").value;
    var Puser = document.getElementById("_User").value;
    document.getElementById("PHP_message").value = "Email: " + email + "\n Message: " + Msg;
}
function compile_message() {
    // Ids of input that you want to be sent to admin
    var email = document.getElementById("Email").value;
    var Msg = document.getElementById("message").value;
    
    // set the values to a input for the code to read
    document.getElementById("Admin_Email").value = email;
    document.getElementById("Message").value = "Email: " + email + "\n Message: " + Msg;
}
function compile_upload() {
    // Ids of input that you want to be sent to admin
    var Msg = document.getElementById("message").value;
    
    // set the values to a input for the code to read
    document.getElementById("Message").value = "Message: " + Msg;
}
