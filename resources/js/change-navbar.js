$(window).scroll(function () {
    if ($(this).scrollTop() > 400){
        $('nav').addClass('color');
    }else{
        $('nav').removeClass('color');
    }
});