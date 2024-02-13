$(document).ready(function(){

    $('select').change(function() {
        //alert($(this).children(':selected').val());
        if(this.value == "1"){
            $(".img").show();
            $(".text").hide();
        }else if(this.value == "2"){
            $(".img").hide();
            $(".text").show();
        }else if(this.value == "0"){
            $(".img").hide();
            $(".text").hide();
        }
      });
    
    $(".submit_button").click(function(){
        var logo_image = $("#logo_img")[0].files[0];
        var logo_img_name = $(".logo_img_name").val();
        var logo_text = $("#logo_text").val();
        var item1 = $("#menu_item1").val();
        var item2 = $("#menu_item2").val();
        var item3 = $("#menu_item3").val();
        var item4 = $("#menu_item4").val();
        var item5 = $("#menu_item5").val();
        var bg_img = $("#bg_img")[0].files[0];
        var bg_img_name = $(".bg_img_name").val();
        var h_heading = $("#highlight_heading").val();
        var heading = $("#banner_heading").val();
        var paragraph = $("#banner_pg").val();
        var button = $("#button").val();

        var input_data = new FormData();
        input_data.append("logo_image",logo_image);
        input_data.append("logo_img_name", logo_img_name);
        input_data.append("logo_text",logo_text);
        input_data.append("item1",item1);
        input_data.append("item2",item2);
        input_data.append("item3",item3);
        input_data.append("item4",item4);
        input_data.append("item5",item5);
        input_data.append("bg_img",bg_img);
        input_data.append("bg_img_name",bg_img_name);
        input_data.append("h_heading",h_heading);
        input_data.append("heading",heading);
        input_data.append("paragraph",paragraph);
        input_data.append("button",button);

        $.ajax({
            type:"POST",
            url:"input.php",
            data: input_data,
            processData: false,
            contentType: false,
            success: function(response){
                logo_img_name.text(response.logo_img_name);
                bg_img_name.text(response.bg_img_name);
            }
        });
    });

    $(".create_admin").click(function(){
        window.open("create_admin.php");
    });

    $(".login").click(function(){
        var userid = $("#user").val();
        var password = $("#password").val();

        $.ajax({
            type:"POST",
            url: "user_valid.php",
            data: {
                userid : userid,
                password : password,
            },
            success: function(response){
            
                if(response == 1){
                    window.location.href = 'form.php';
                }
                else {
                    alert ("User not verified!");
                }
            }
        });
    });

    $(".create").click(function(){
        var fname = $("#first_name").val();
        var mname = $("#middle_name").val();
        var lname = $("#last_name").val();
        var pass = $("#pwd").val();
        var cpass = $("#cpwd").val();

        $.ajax({
            type:"POST",
            url: "admin_valid.php",
            data: {
                fname : fname,
                mname : mname,
                lname : lname,
                pass : pass,
                cpass : cpass
            },
            success: function(response){
                alert(response);
            }
        });
    });

    $(".logout").click(function(){
        $.ajax({
            type: "POST",
            url: "logout.php",
            contentType: false,
            processData: false,
            success: function (response){
                if(response == "logout"){
                    alert ("Logging out");
                    window.location.href = 'index.php';
                }
                else {
                    alert ("Try again");
                }
            }
        });
    });
});
