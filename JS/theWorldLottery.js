$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    // Do something
    console.log(scroll);
    if(scroll>0){
    	
    	$(".dropdown").slideUp(1000);
    	
    } else {

    	$(".dropdown").slideDown(1000);
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

// setTimeout(function(){
// 	setInterval(function(){	
// 		headerButtonArray[i%5].toggleClass('buttonColor');	
// 	},1000);
// },900)

// setInterval(function(){
// 		headerButtonArray[i%5].toggleClass('buttonColor');
// 	},1000);

