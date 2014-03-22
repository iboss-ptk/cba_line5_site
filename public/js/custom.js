/* Add here all your JS customizations */

$(document).ready(function() {


    var div = $('.square');
    var w = div.width(); 
    var h = div.height();


    div.css('height', w);
    div.css('overflow','hidden');



    // var simg = $('.square > img');
    
    // simg.each(function(){
    // 	var wph = $(this).width()/$(this).height();

    // 	console.log(wph);

    // 	if($(this).width()>$(this).height()) {
    // 		$(this).css('height', '100%');
    // 		$(this).css('width', ($(this).height() * wph) +' px');

    // 	} else {
    // 		$(this).css('width', '100%');
    // 		$(this).css('height', ($(this).width() * (1/wph))+' px');
    // 	}


    // });

});