$(document).ready(function() {
	var z=0;
$(function writing(){
	
var a = new String;
if (z==0){
a = 'Всегда отвечаем за качество!';
}
else if (z==1) {
a = 'Цены от производителя!';
}
else if (z==2) {
a = 'Доставка на дом!';
}


$('.text_cont_inner').text('');
var c=a.length;
j=0;
var timerId=setInterval(function(){
if(j<c){
$('.text_cont_inner').text($('.text_cont_inner').text()+a[j]);
j=j+1; 
} 
else {
	clearInterval(timerId);
	j=c;


setTimeout(function(){
	var timerId2=setInterval(function() {
		if (j!=-1) {
			a = $('.text_cont_inner').text();
			$('.text_cont_inner').text(a.substring(0, a.length-1));
			j=j-1;
			}
				else{
					clearInterval(timerId2);
					setTimeout(function() {
						if (z==2) {
							z=0;
						}
						else {
							z++;
						}
						writing();
				},1000);
				}
		
		
	},20);
	},1900);
	

}
},100);


});
});