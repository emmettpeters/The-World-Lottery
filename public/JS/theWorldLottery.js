$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    console.log(scroll);
    if(scroll>0){	
    	$(".dropdown").slideUp(1000);
    	$('#header').css(
    		"background-color","black"
        );
    } else {
    	$(".dropdown").slideDown(1000);
    	$('#header').css(
    		"background-color","rgba(0,0,0,.55)"
    	);
    }
});

var headerButtonArray =[$("#lottoB"),$("#raffleB"),$("#theWorldLottery"),$("#contact"),$("#signIn")];
var i=0;

setInterval(function(){	
	headerButtonArray[i%5].toggleClass('buttonColor');
	setTimeout(function(){
		headerButtonArray[i%5].toggleClass('buttonColor');
	i++		
	},1900)	
},2000);

