!function(){"use strict";function e(){jQuery("img.svg").each(function(e){var t=jQuery(this),o=t.attr("id"),n=t.attr("class"),i=t.attr("src");jQuery.get(i,function(e){var i=jQuery(e).find("svg");"undefined"!=typeof o&&(i=i.attr("id",o)),"undefined"!=typeof n&&(i=i.attr("class",n+" replaced-svg")),i=i.removeAttr("xmlns:a"),t.replaceWith(i)},"xml")}),$(".datepicker").each(function(){var e=$(this);e.find("input").datepicker({format:"dd M yyyy",todayHighlight:!0,autoclose:!0})}),$(".select-control").selectpicker({style:"btn-select",size:4,liveSearchPlaceholder:"Cari disini.."}),setTimeout(t,100),$("body").on("click",'a[href]:not([target="_blank"]):not([href^="#"]):not([href^="tel:"]):not([href^="mailto:"]):not([data-lity]):not([data])',function(e){var t=this.href;return $("body").hasClass("menu-open")?($("body").removeClass("menu-open"),setTimeout(function(){$("body").addClass("transition"),setTimeout(function(){location.href=t},500)},300)):($("body").addClass("transition"),setTimeout(function(){location.href=t},500)),!1})}function t(){$("body").addClass("ready"),$(".sticky-me").each(function(){var e=$("header").outerHeight()+30;$(this).sticky({topSpacing:e})}),$(".site-menu-bar-toggle").click(function(){$("body").hasClass("menu-open")?($("body").removeClass("menu-open"),$("body").find(".menu-backdrop").remove()):($("body").addClass("menu-open"),$("body").append('<div class="menu-backdrop"></div>'))}),$("body").on("click",".menu-backdrop",function(){$("body").removeClass("menu-open"),$("body").find(".menu-backdrop").remove()}),$("body").find("input.number").keydown(function(e){$.inArray(e.keyCode,[46,8,9,27,13,110,190])!==-1||65===e.keyCode&&(e.ctrlKey===!0||e.metaKey===!0)||e.keyCode>=35&&e.keyCode<=40||(e.shiftKey||e.keyCode<48||e.keyCode>57)&&(e.keyCode<96||e.keyCode>105)&&e.preventDefault()})}e()}();