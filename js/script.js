$(document).ready(function(){
//Add new URL using AJAX
    $("#shorten").click(function() {    
            $("#shorten").hide(); //hide submit button
            $("#generated-link").hide(); //hide Generated Link Box
            $("#LoadingImage").show(); //show loading image
            var myData = 'url='+ $("#url").val(); //build a post data structure
            jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "shortener.php", //Where to make Ajax calls
            dataType:"text", 
            data:myData, //Form variables
            success:function(response){
                $("#url").val(''); //empty input field
                $("#LoadingImage").hide(); //hide loading image
                $("#shorten").show(); //show submit button   
                $("#url").removeClass("valid");   
                $("#shorten").attr("disabled","true");          
                $("#shorten").removeClass("submit").addClass("submit-disabled");
                $("#generated-link").show();
                $("#generated-link").val(response);
                $("#shorten").attr("disabled");
            },
            error:function (xhr, ajaxOptions, thrownError){
                $("#shorten").show(); //show submit button
                $("#LoadingImage").hide(); //hide loading image
                alert(thrownError);
            }
            });
    }); 

//Check Stats
    $("#stat-button").click(function() {    
            if($("#stat-code").val()==='')
            {
                //If input field is blank then display a message.
                $(".code-error").text("Please Enter the Short URL.");
                $(".code-error").fadeIn(1000);
                $(".code-error").fadeOut(4000);
                return false;
            }
            $("#stat-button").hide(); //hide submit button
            $("#LoadingImage2").show(); //show loading image
            var myData = 'code='+ $("#stat-code").val(); //build a post data structure
            jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "stats.php", //Where to make Ajax calls
            dataType:"text", 
            data:myData, //Form variables
            success:function(response){
                $("#stat-code").val(''); //empty input field
                $("#LoadingImage2").hide(); //hide loading image
                $("#stat-button").show(); //show submit button   
                $("#stats").html(response);
            },
            error:function (xhr, ajaxOptions, thrownError){
                $("#stat-button").show(); //show submit button
                $("#LoadingImage2").hide(); //hide loading image
                alert(thrownError);
            }
            });
    }); 

    // check the input box to make sure a proper URL is entered
    $('#url').on('input', function() {
        var input=$(this);
        if (input.val().substring(0,4)=='www.'){input.val('http://www.'+input.val().substring(4));}
        var re = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/;
        var is_url=re.test(input.val());
        if(is_url){
            input.removeClass("invalid").addClass("valid");
            $("#shorten").removeClass("submit-disabled").addClass("submit");
            $("#shorten").removeAttr("disabled");
        }else{
            input.removeClass("valid").addClass("invalid");
            $("#shorten").removeClass("submit").addClass("submit-disabled");
            $("#shorten").attr("disabled","true");
            }
        
        if ($("#url").val()=='') {
            $("#url").removeClass("invalid");
            $("#url").removeClass("valid");
        }
    });

    //Copy the generated URL to clipboard if the user clicks on the URL
    $("#generated-link").click(function(){
        $(this).focus();
        $(this).select();
        document.execCommand('copy');
        $(".code-error").text("Copied to Clipboard");
        $(".code-error").fadeIn(1000);
        $(".code-error").fadeOut(4000);
    });

});