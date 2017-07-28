//hero area scrolling functionality (custom -EP)
$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    console.log(scroll);
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