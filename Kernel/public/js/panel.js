$(document).ready(function(){
    $('a').click(function(){
        if(window.location.href == $(this).attr('href')){
            return false;
        }
    });
});