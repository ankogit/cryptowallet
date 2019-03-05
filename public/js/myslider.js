$(function() {
var slideWidth=100;
var sliderTimer;
$(function(){
$('.top-baner').width($('.top-baner').children(".slide").size()*slideWidth+'vw');
    sliderTimer=setInterval(nextSlide,6000);
    $('.top-baner').hover(function(){
        clearInterval(sliderTimer);
    },function(){
        sliderTimer=setInterval(nextSlide,6000);
    });
});

function nextSlide(){
    var currentSlide=parseInt($('.top-baner').data('current'));
    currentSlide++;
    if(currentSlide>=$('.top-baner').children(".slide").size())
    {
        currentSlide=0;   
    }
    $('.top-baner').css("transform", "translateX(" + -currentSlide*slideWidth+"vw)").data('current',currentSlide);
}
})


			
			
				