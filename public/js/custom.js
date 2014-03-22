/* Add here all your JS customizations */

$(document).ready(function() {



    var div = $('.square');
    var w = div.width(); 
    var h = div.height();


    div.css('height', w);
    div.css('overflow','hidden');

    var simg = $('.square > img');
    if(w>h) simg.css('height', h);

});