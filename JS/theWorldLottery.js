// $(window).scroll(function() {

//     if ($(this).scrollTop()>-10){
//         $('.dropdown').slideDown();
//      } else {
//       $('.dropdown').slideUp();
//      }
//  });

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

