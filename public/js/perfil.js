$(document).ready(function(){
    username=$("#username").val();
    $("#usernameEdit").hide();

    $("#editUsername").on("click",function(){
        $("#usernameEdit").show();
    })

    $("#submitUsername").on("click",function(){
       
        newUsername=$("#newUsername").val();
        $.ajax({
            url: "http://127.0.0.1/PhotoPlay-Web/servicios.php",
            type: "POST",
            data: { function: "updateUsername", username:username, newUsername:newUsername},
            success: function(data){
                
            }
        });
    })
})