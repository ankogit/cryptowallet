
function setcookie(a,b,c) {if(c){var d = new Date();d.setTime(d.getTime()+c);}if(a && b) document.cookie = a+'='+b+';path=/'+(c ? '; expires='+d.toUTCString() : '');else return false;}
 function getcookie(a) {var b = new RegExp(a+'=([^;]){1,}');var c = b.exec(document.cookie);if(c) c = c[0].split('=');else return false;return c[1] ? c[1] : false;}






$.fn.tree_menu = function() {


        var nav = this;
        var uls = nav.find("ul");


	var coci_MENU= getcookie( "MENU" );
	if (coci_MENU) {
	setcookie( "MENU",coci_MENU ,30*3600*24*1000 );

        var showedElems = ( coci_MENU || "" ).split(",");
        for( var i = 0; i < showedElems.length; i++ ) {
            $( uls[ showedElems[ i ] ] ).prev('a').addClass('active')  
            $( uls[ showedElems[ i ] ] ).show();
        }}



        var Url = document.URL.split('#')[0];
        $('> li ul',nav).find('a:not([href^="#"])').each(function() {
            var S = $(this).attr('href').split('#')[0];
            if(S&&Url.indexOf(S)!=-1) $(this).parent().addClass('a-active');
        });

        nav.find("a").click(function() {
            var Lnk=$(this).attr("href");
            if(Lnk==''||Lnk.indexOf('#')==0) setcookie( "MENU",1 ,-1);
            var self = $(this).next();
            if ( self.length == 0 ) return;


            var showedElems = [];
            uls.each(function( index ){

                    if ( this === self[0] ) {
                        if ( self.css('display') == "none" ) {
                           showedElems.push(index);$(this).prev('a').addClass('active');
                        }  else $(this).prev('a').removeClass('active');
                        $( this ).slideToggle(400);return true;
                    } 
                    if ( jQuery.inArray( this, self.parents( "ul" ) ) == -1 ) {
                        $(this).prev('a').removeClass('active');$(this).slideUp(400);return true;
                    }
                    showedElems.push(index);
           });


                setcookie( "MENU", showedElems.join(",") ,30*3600*24*1000 );

                return false;

        });
}

$('.treeMenu').tree_menu();
