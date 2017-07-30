$( document ).ready(function() {

    //hero area scrolling functionality (custom -EP)
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        var j=0;
        if(scroll>0 && j==0){   
            setTimeout(function(){
                j=1;
            },900);
            $(".dropdown").slideUp(1000);
            setTimeout(function(){
                $('#header').css(
                    "background-color","black"
                );
            },900)
        } else {
            setTimeout(function(){
                j=0;
            },900);
            $(".dropdown").slideDown(1000);
            $('#header').css(
                "background-color","rgba(0,0,0,.55)"
            );   
        }
    });

    //iterating through header buttons and showing the bottom border with style (custom -EP)
    var headerButtonArray =[$("#lottoB"),$("#raffleB"),$("#theWorldLottery"),$("#contact"),$("#signIn")];
    var i=0;
    setInterval(function(){ 
        headerButtonArray[i%5].toggleClass('buttonColor');
        setTimeout(function(){
            headerButtonArray[i%5].toggleClass('buttonColor');
        i++     
        },1800) 
    },2000);






    //API

    function randomQuote() {
      $.ajax({
          url: "https://api.forismatic.com/api/1.0/?",
          dataType: "jsonp",
          data: "method=getQuote&format=jsonp&lang=en&jsonp=?",
          success: function( response ) {
            $("#random_quote").html("<p id='random_quote' class='lead text-center'>" +
              response.quoteText + "<br/>&dash; " + response.quoteAuthor + " &dash;</p>");
            $("#tweet").attr("href", "https://twitter.com/home/?status=" + response.quoteText +
              ' (' + response.quoteAuthor + ')');
          }
      });
    }

    $(function() {
      randomQuote();
    });

    $("#quoteButton").click(function(){
      randomQuote();
    });

});
