
$(document).ready(function(){
    $(".btn").on('click',function(e){        
        e.preventDefault();
        var name = $(this).attr("name");
        // console.log(title);
        var temp = name.split("_");
        var title = temp[0];
        // console.log(title);
        var ODER = temp[1];
        // console.log(ODER);
        $.ajax({
            // url: url_1 + page,
            url: "index.php?controller=admin&action=admin",
            method: 'GET',  
            data: {title:title,oder:ODER,
            }, 
            success: function(e){
                // console.log(e);
                $("#content_1").html(e);
            }
        });
    });
});
