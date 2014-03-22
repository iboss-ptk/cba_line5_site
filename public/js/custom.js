/* Add here all your JS customizations */

$(document).ready(function() {

    var div = $('.square');
    var w = div.width(); 
    div.css('height', w);
    div.css('overflow','hidden');
});