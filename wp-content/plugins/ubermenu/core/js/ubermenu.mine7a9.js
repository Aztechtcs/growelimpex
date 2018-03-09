/**
 * UberMenu JavaScript minified 
 * @author Chris Mavricos, SevenSpark http://sevenspark.com
 * @version 2.3.0.2
 */
var $ujq=jQuery,uberMenuWarning=!1;"undefined"!=typeof uberMenuSettings&&"on"==uberMenuSettings.noconflict?$ujq=jQuery.noConflict():uberMenuWarning=!0;
jQuery(document).ready(function(b){uberMenuSettings.removeConflicts="on"==uberMenuSettings.removeConflicts?!0:!1;uberMenuSettings.noconflict="on"==uberMenuSettings.noconflict?!0:!1;uberMenuSettings.autoAlign="on"==uberMenuSettings.autoAlign?!0:!1;uberMenuSettings.fullWidthSubs="on"==uberMenuSettings.fullWidthSubs?!0:!1;uberMenuSettings.androidClick="on"==uberMenuSettings.androidClick?!0:!1;uberMenuSettings.iOScloseButton="on"==uberMenuSettings.iOScloseButton?!0:!1;uberMenuSettings.loadGoogleMaps=
"on"==uberMenuSettings.loadGoogleMaps?!0:!1;uberMenuSettings.repositionOnLoad="on"==uberMenuSettings.repositionOnLoad?!0:!1;uberMenuSettings.hoverInterval=parseInt(uberMenuSettings.hoverInterval);uberMenuSettings.hoverTimeout=parseInt(uberMenuSettings.hoverTimeout);uberMenuSettings.speed=parseInt(uberMenuSettings.speed);uberMenuWarning&&(uberMenuSettings.noconflict&&"undefined"!=typeof console)&&console.log("[UberMenu Notice] Not running in noConflict mode.  Are you using a caching plugin?  If so, you need to load the UberMenu scripts in the footer.");
var e=navigator.userAgent.toLowerCase();uberMenuSettings.androidClick&&e.match(/(android)/)&&(uberMenuSettings.trigger="click");window.navigator.msMaxTouchPoints&&(uberMenuSettings.trigger="click");e.match(/(iphone|ipod|ipad)/)&&(uberMenuSettings.trigger="hover");e=b("#megaMenu");if(0!=e.size()){e.uberMenu(uberMenuSettings);e.data("uberMenu");uberMenuSettings.loadGoogleMaps&&("undefined"!==typeof google&&"undefined"!==typeof google.maps&&"undefined"!==typeof google.maps.LatLng)&&b(".spark-map-canvas").each(function(){var a=
b(this),e=a.attr("data-zoom")?parseInt(a.attr("data-zoom")):8,h=a.attr("data-lat")?new google.maps.LatLng(a.attr("data-lat"),a.attr("data-lng")):new google.maps.LatLng(40.7143528,-74.0059731),j=new google.maps.Map(this,{zoom:e,mapTypeId:google.maps.MapTypeId.ROADMAP,center:h});a.attr("data-address")&&(new google.maps.Geocoder).geocode({address:a.attr("data-address")},function(b,e){e==google.maps.GeocoderStatus.OK&&(j.setCenter(b[0].geometry.location),h=b[0].geometry.location,new google.maps.Marker({map:j,
position:b[0].geometry.location,title:a.attr("data-mapTitle")}))});var f=b(this).parents("li.ss-nav-menu-item-depth-0"),k=function(){google.maps.event.trigger(j,"resize");j.setCenter(h);f.unbind("ubermenuopen",k)};f.bind("ubermenuopen",k)});uberMenuSettings.repositionOnLoad&&jQuery(window).load(function(){uberMenu_redrawSubmenus()});var k=e.find("ul.megaMenu");b("#megaMenuToggle").click(function(){k.slideToggle(function(){k.css("overflow","visible");k.toggleClass("megaMenuToggleOpen")})})}});
(function(b){b.uberMenu=function(e,k){var a=this;a.settings={};var p=function(d,c){a.menuEdge="vertical"==a.settings.orientation?a.$megaMenu.find("> ul.megaMenu").offset().top:a.$megaMenu.find("> ul.megaMenu").offset().left;var e=a.$megaMenu.find("> ul.megaMenu").outerWidth(),f=a.$megaMenu.find("> ul.megaMenu").outerHeight();d.each(function(){var d=b(this),k=d.hasClass("megaHover"),d=d.find("> ul.sub-menu-1");if(c&&a.settings.autoAlign){var l=d.find("li.ss-nav-menu-item-depth-1:not(.ss-sidebar)"),
h=0;d.css("left","-999em").show();l.each(function(){b(this).width()>h&&(h=b(this).width())});l.width(h);d.css("left","")}switch(a.settings.orientation){case "horizontal":if(b(this).hasClass("ss-nav-menu-mega-alignCenter")&&!b(this).hasClass("ss-nav-menu-mega-fullWidth")){var g=b(this).outerWidth(),l=d.outerWidth(),g=b(this).offset().left+g/2-(a.menuEdge+l/2),g=0<g?g:0;g+l>e&&(g=e-l);d.css({left:g})}break;case "vertical":if(b(this).hasClass("ss-nav-menu-mega-alignCenter")){var g=b(this).outerHeight(),
l=d.outerHeight(),g=b(this).offset().top+g/2-(a.menuEdge+l/2),j=0<g?g:0;j+l>f&&(g=f-l);d.css({top:j})}}k||d.hide()})},h=function(d){var c=b(d);q(c);c.addClass("megaHover wpmega-expanded");d=c.find("ul.sub-menu-1");switch(a.settings.transition){case "slide":d.stop(!0,!0).slideDown(a.settings.speed,"swing",function(){c.trigger("ubermenuopen")});break;case "fade":d.stop(!0,!0).fadeIn(a.settings.speed,"swing",function(){c.trigger("ubermenuopen")});break;case "none":d.show(),c.trigger("ubermenuopen")}},
j=function(d){var c=b(d);if(c.has("ul.sub-menu"))switch(c.hasClass("ss-nav-menu-reg")?q(c):c.siblings().each(function(){f(this,!0)}),c.addClass("megaHover"),d=c.find("> ul.sub-menu"),a.settings.transition){case "slide":d.stop(!0,!0).slideDown(a.settings.speed,"swing",function(){c.trigger("ubermenuopen")});break;case "fade":d.stop(!0,!0).fadeIn(a.settings.speed,"swing",function(){c.trigger("ubermenuopen")});break;case "none":d.show(),c.trigger("ubermenuopen")}},f=function(d,c){var e=b(d),f=e.find("> ul.sub-menu");
if(c)f.hide(),e.removeClass("megaHover").removeClass("wpmega-expanded");else if(0<f.size())switch(a.settings.transition){case "slide":f.stop(!0,!0).slideUp(a.settings.speed,function(){e.removeClass("megaHover").removeClass("wpmega-expanded");e.trigger("ubermenuclose")});break;case "fade":f.stop(!0,!0).fadeOut(a.settings.speed,function(){e.removeClass("megaHover").removeClass("wpmega-expanded");e.trigger("ubermenuclose")});break;case "none":f.hide(),e.removeClass("megaHover").removeClass("wpmega-expanded"),
e.trigger("ubermenuclose")}else e.removeClass("megaHover").removeClass("wpmega-expanded")},q=function(d){var b=a.$megaMenu.find("> ul.megaMenu > li");null!=d&&(b=b.not(d));b.removeClass("megaHover").removeClass("wpmega-expanded").find("> ul.sub-menu").hide()};a.openMega=function(b){h(b)};a.openFlyout=function(b){j(b)};a.close=function(b,a){a||(a=!1);f(b,a)};a.redrawSubmenus=function(){var b=a.$megaMenu.find("ul.megaMenu > li.ss-nav-menu-mega.mega-with-sub");a.settings.fullWidthSubs||p(b,!0)};a.settings=
b.extend({},{speed:300,trigger:"hover",orientation:"horizontal",transition:"slide",hoverInterval:100,hoverTimeout:400,removeConflicts:!0,autoAlign:!1,fullWidthSubs:!1,onOpen:function(){}},k);a.el=e;a.$megaMenu=b(e);a.$megaMenu.hasClass("wpmega-noconflict")&&a.$megaMenu.find("ul, ul li.menu-item, ul li.menu-item > a").removeAttr("style").unbind().off();a.$megaMenu.removeClass("megaMenu-nojs").addClass("megaMenu-withjs");b("#megaMenu li.ss-nav-menu-reg li:has(> ul)").addClass("megaReg-with-sub");var m=
a.$megaMenu.find("ul.megaMenu > li.ss-nav-menu-mega.mega-with-sub");a.settings.fullWidthSubs?m.find("> ul.sub-menu-1").hide():(p(m,!0),b(window).resize(function(){p(m,!1)}));switch(a.settings.trigger){case "click":m.find("> a, > span.um-anchoremulator").click(function(a){var c=b(this).parent("li");a.preventDefault();c.hasClass("wpmega-expanded")?(c.removeClass("wpmega-expanded"),f(c.get(0),!1)):(c.addClass("wpmega-expanded"),h(c.get(0)))});b(document).click(function(){q()});a.$megaMenu.click(function(b){b.stopPropagation()});
break;case "hoverIntent":m.hoverIntent({over:function(){h(this)},out:function(a){"object"===typeof a&&b(a.fromElement).is("#megaMenu form, #megaMenu input, #megaMenu select, #megaMenu textarea, #megaMenu label")||f(this,!1)},timeout:a.settings.hoverTimeout,interval:a.settings.hoverInterval,sensitivity:2});break;case "hover":m.hover(function(){h(this)},function(a){"object"===typeof a&&b(a.fromElement).is("#megaMenu form, #megaMenu input, #megaMenu select, #megaMenu textarea, #megaMenu label")||f(this)})}var n=
a.$megaMenu.find("ul.megaMenu > li.ss-nav-menu-reg.mega-with-sub, li.ss-nav-menu-reg li.megaReg-with-sub");n.find("ul.sub-menu").hide();switch(a.settings.trigger){case "click":n.find("> a, > span.um-anchoremulator").click(function(a){var c=b(this).parent("li");a.preventDefault();a.stopPropagation();c.hasClass("wpmega-expanded")?(c.removeClass("wpmega-expanded"),f(c.get(0))):(c.addClass("wpmega-expanded"),j(c.get(0)))});break;case "hoverIntent":n.hoverIntent({over:function(){j(this)},out:function(a){"object"===
typeof a&&b(a.fromElement).is("#megaMenu form, #megaMenu input, #megaMenu select, #megaMenu textarea, #megaMenu label")||f(this,!1)},timeout:a.settings.hoverTimeout,interval:a.settings.hoverInterval,sensitivity:2});break;case "hover":n.hover(function(){j(this)},function(){f(this)})}n=navigator.userAgent.toLowerCase().match(/(iphone|ipod|ipad)/);if(uberMenuSettings.iOScloseButton&&(jQuery.uber_mobile||n))b('<span class="uber-close">&times;</span>').appendTo("#megaMenu li.mega-with-sub > a, #megaMenu li.mega-with-sub > span.um-anchoremulator").click(function(a){a.preventDefault();
"open"==b(this).attr("data-uber-status")?(f(b(this).parents("li.mega-with-sub")[0],!0),b(this).html("&darr;").attr("data-uber-status","closed")):(h(b(this).parents("li.mega-with-sub")[0]),b(this).html("&times;").attr("data-uber-status","open"));return!1}),a.$megaMenu.find("ul.megaMenu > li.mega-with-sub").hover(function(a){a.preventDefault();b(this).find(".uber-close").html("&times;").attr("data-uber-status","open").show()},function(){b(this).find(".uber-close").hide()})};b.fn.uberMenu=function(e){return this.each(function(){if(void 0==
b(this).data("uberMenu")){var k=new b.uberMenu(this,e);b(this).data("uberMenu",k)}})}})(jQuery);function uberMenu_openMega(b){$ujq("#megaMenu").data("uberMenu").openMega(b)}function uberMenu_openFlyout(b){$ujq("#megaMenu").data("uberMenu").openFlyout(b)}function uberMenu_close(b){$ujq("#megaMenu").data("uberMenu").close(b)}function uberMenu_redrawSubmenus(){$ujq("#megaMenu").data("uberMenu").redrawSubmenus()}
(function(b){jQuery.uber_mobile=/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(b)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(b.substr(0,
4))})(navigator.userAgent||navigator.vendor||window.opera);