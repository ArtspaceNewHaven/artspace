/// Scripts for Exhibitions Page
var bannerHeight = $('.main-banner').height();
$('article.type-exhibitions').css('padding-top', bannerHeight - 20);

/// Stuff for Artist Page
var navHeight = $('.site-nav-wrapper').outerHeight();
$('.page-banner-image').css('margin-top', - (navHeight + 5) );

var featureHeight = $('.main-thumb').outerHeight();
$('.artist-gallery-blocks li').css('height', featureHeight / 2);

$('.artist-gallery-blocks li').click(function() { 
		var currentBG = $(this).css('background-image');
    $('.main-thumb').css('background-image', currentBG); 
}); 
// testing Minigrid

//minigrid('.grid', '.grid-item');

//window.addEventListener('resize', function(){
//  minigrid('.grid', '.grid-item');
//});

$(document).foundation();

$('.medium-block-grid-2 img').hover(function () {
  $('img.main-thumb').attr('src' ,$(this).attr('src'));
});

//$(function(){
//	$('#Container').mixItUp();
//});

$('.item-content').each(function(index){
	var totalHeight = $(this).height();
	var headHeight = $(this).find('header').height();
	var item = $(this);
	var itemParent = $(this).parent().parent().parent().parent().parent().parent();
	var itemContent = $(this).find('.js-item-excerpt');
	var containerHeight = $(this).parent().parent().height();
	//$(this).height(headHeight);
	var clickShow = $(this).find('.js-show-item');
	$(clickShow).click(function(){
		
		//$(itemParent).height( totalHeight + containerHeight );

		$(itemContent).slideToggle( "slow", function() {
    // Animation complete.
  	});
	});
});

/// Initialize Slick on the Homepage
$('.slide-init').slick({
	fade: true,
	prevArrow: $('.slide-nav .ss-navigateleft'),
	nextArrow: $('.slide-nav .ss-navigateright'),
});
$('.timeline-slides').slick({
  arrows: true,
  dots: true
  });
/**
* jQuery Stalactite : Lightweight Element Packing
* Examples and documentation at: http://jonobr1.github.com/stalactite
* Copyright (c) 2011 Jono Brandel
* Version: 0.1 (8-SEPTEMBER-2011)
* Requires: jQuery v1.6.2 or later
*
* Copyright 2011 jonobr1
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/

(function(f){var e=[];f.fn.stalactite=function(i){var h=false;var k=f.extend({},f.fn.stalactite.defaultOptions,i);k.cssSelector=k.cssPrefix+"-loaded";return this.each(function(){var q=f(this);var p=null;var l=a(q,k);g(q);var r=c(q);var o={row:0,prevMinIndex:0,prevMaxIndex:0,i:0};if(r>=0){if(q.children().index(l[0])>0){o=e[r]}}var u=o.row;if(k.fluid){q.css("width","auto");f(window).bind("resize",function(){if(p){clearTimeout(p)}else{g(q)}h=true;p=setTimeout(function(){h=false;p=null;u=0;o={row:0,prevMinIndex:0,prevMaxIndex:0,i:0};e=[];d(q,t,o,k)},2000)})}var n="img, embed, iframe, audio, video, div";var s=q.children().not(k.cssSelector).find(n);var m=q.find(":not("+n+")");d(q,t,o,k);function t(x,L,B,F,E){if(E>=x.length){if(e[r]){e[r]=f.extend(e[r],o)}else{e.push(f.extend({dom:x.parent("div")[0]},o))}k.complete.apply(this);b(k);return}else{if(h&&k.fluid){b(k);return}}var G=f(x[E]);var A=f(x[E-1]);var z=G.offset().left,w=z+G.outerWidth(),K=G.offset().top,I=K+G.outerHeight();if(A.length>0){if(z<A.offset().left&&E>0&&E!==o.i){u++;o.row=u;o.prevMinIndex=B=F;o.prevMaxIndex=F=E-1;o.i=E}}var D=0;if(u>0){for(var C=F;C>=B;C--){var A=f(x[C]);var y=A.offset().left,v=y+A.outerWidth(),J=A.offset().top,H=J+A.outerHeight();if(y>=w||v<=z){continue}else{if(D<H){D=H}}}D=D-K}else{D=-parseInt(G.css("margin-top").toString().replace("px",""))}j(G,{opacity:1,marginTop:"+="+D},function(){t(x,L,B,F,E+1)})}});function g(l){var m={x:l.offset().left+(l.outerWidth()-l.width())/2,y:l.offset().top+(l.outerHeight()-l.height())/2};var n=f("#stalactite-loader");if(n.length<=0){n=f('<p class="stalactite-loader" style="display: none;"/>')}n.css({position:"absolute",top:m.y,left:m.x}).html(k.loader).appendTo("body");n.find("img").bind("load",function(){n.fadeIn()})}function j(l,n,o){var m=f.extend({},n,k.styles);if(m.opacity==l.css("opacity")){delete m.opacity}l.css("z-index","auto").stop().animate(m,k.duration,k.easing,o)}};function c(g){var l=g[0];var j=-1;for(var h=0;h<e.length;h++){var k=e[h].dom;if(l===k){j=h;break}}return j}function b(g){f((g.cssPrefix+"-loader")).fadeOut()}function a(h,i){var g=h.children().not(i.cssSelector);if(i.cssPrep){g.css({position:"relative",display:"inline-block",verticalAlign:"top",opacity:0,zIndex:-1})}return g}function d(g,l,k,j){var i=g.children().addClass(j.cssSelector);var h={x:g.offset().left+(g.outerWidth()-g.width())/2,y:g.offset().top+(g.outerHeight()-g.height())/2};l.apply(this,[i,h,k.prevMinIndex,k.prevMaxIndex,k.i])}f.fn.stalactite.defaultOptions={duration:150,easing:"swing",cssPrefix:".stalactite",cssPrep:true,fluid:true,loader:'<img src="data:image/gif;base64, R0lGODlhEAAQAPQAAP///zMzM/n5+V9fX5ycnDc3N1FRUd7e3rm5uURERJGRkYSEhOnp6aysrNHR0WxsbHd3dwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAAFUCAgjmRpnqUwFGwhKoRgqq2YFMaRGjWA8AbZiIBbjQQ8AmmFUJEQhQGJhaKOrCksgEla+KIkYvC6SJKQOISoNSYdeIk1ayA8ExTyeR3F749CACH5BAkKAAAALAAAAAAQABAAAAVoICCKR9KMaCoaxeCoqEAkRX3AwMHWxQIIjJSAZWgUEgzBwCBAEQpMwIDwY1FHgwJCtOW2UDWYIDyqNVVkUbYr6CK+o2eUMKgWrqKhj0FrEM8jQQALPFA3MAc8CQSAMA5ZBjgqDQmHIyEAIfkECQoAAAAsAAAAABAAEAAABWAgII4j85Ao2hRIKgrEUBQJLaSHMe8zgQo6Q8sxS7RIhILhBkgumCTZsXkACBC+0cwF2GoLLoFXREDcDlkAojBICRaFLDCOQtQKjmsQSubtDFU/NXcDBHwkaw1cKQ8MiyEAIfkECQoAAAAsAAAAABAAEAAABVIgII5kaZ6AIJQCMRTFQKiDQx4GrBfGa4uCnAEhQuRgPwCBtwK+kCNFgjh6QlFYgGO7baJ2CxIioSDpwqNggWCGDVVGphly3BkOpXDrKfNm/4AhACH5BAkKAAAALAAAAAAQABAAAAVgICCOZGmeqEAMRTEQwskYbV0Yx7kYSIzQhtgoBxCKBDQCIOcoLBimRiFhSABYU5gIgW01pLUBYkRItAYAqrlhYiwKjiWAcDMWY8QjsCf4DewiBzQ2N1AmKlgvgCiMjSQhACH5BAkKAAAALAAAAAAQABAAAAVfICCOZGmeqEgUxUAIpkA0AMKyxkEiSZEIsJqhYAg+boUFSTAkiBiNHks3sg1ILAfBiS10gyqCg0UaFBCkwy3RYKiIYMAC+RAxiQgYsJdAjw5DN2gILzEEZgVcKYuMJiEAOwAAAAAAAAAAAA==" />',styles:{},complete:function(g){return g}}})(jQuery);

$(".js-masonry-contain").stalactite({
duration: 350,                        // Duration of animation.
easing: 'swing',                      // Easing method.
cssPrefix: '.stalactite',             // The css naming convention.
cssPrep: true,                        // Should stalactite structurally modify css of children?
fluid: true,                          // Should stalactite recalculate on window resize?
loader: '<div />',                    // The contents of the loader. Defaults to a dataURL animated gif.
styles: {}                            // A style object to place on the child elements

});

