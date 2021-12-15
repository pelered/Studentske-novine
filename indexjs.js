
    $(document).ready(function(){
    $(".clanakdiv").hover(function(){
        $(this).animate({  width:"500px", height:"520px" },"fast");
    });
    $(".clanakdiv").mouseout(function(){
        $(this).animate({width:"480", height:"500"},"fast");
    })
});

    $(document).ready(function(){
        $(".clanakdiv1").hover(function(){

            $(this).animate({ width:"358px", height:"265px" },"fast");
        });
        $(".clanakdiv1").mouseout(function(){
            $(this).animate({width:"343", height:"250"},"fast");
        })
    });

    $(document).ready(function(){
        $(".clanakdiv2").hover(function(){
            $(this).animate({ width:"358px", height:"265px" },"fast");
        });
        $(".clanakdiv2").mouseout(function(){
            $(this).animate({width:"343", height:"250"},"fast");
        })
    });


    $(document).ready(function(){
        $("p").click(function(){
            $(this).hide();
        });
    });