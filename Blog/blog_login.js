$(function(ev){
    document.querySelector("input[name='userid_email']").onchange = function(){
        $(".blog_login_status").text("");
    }

    document.querySelector("input[name='password']").onchange = function(){
        $(".blog_login_status").text("");
    }

});

