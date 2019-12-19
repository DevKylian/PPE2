//   all ------------------
function initPPE2() {
    "use strict";
    //   loader ------------------
    $(".loader-wrap").fadeOut(300, function () {
        $("#main").animate({
            opacity: "1"
        }, 300);
    });
    //   scrollToFixed------------------
    $(".fixed-bar").scrollToFixed({
        minWidth: 1064,
        marginTop: 90,
        removeOffsets: true,
        limit: function () {
            var a = $(".limit-box").offset().top - $(".fixed-bar").outerHeight() - 70;
            return a;
        }
    });
    $(".back-to-filters").scrollToFixed({
        minWidth: 1224,
        zIndex: 12,
        marginTop: 130,
        removeOffsets: true,
        limit: function () {
            var a = $(".limit-box").offset().top - $(".back-to-filters").outerHeight(true) - 10;
            return a;
        }
    });
    $(".scroll-nav-wrapper").scrollToFixed({
        minWidth: 768,
        zIndex: 12,
        marginTop: 80,
        removeOffsets: true,
        limit: function () {
            var a = $(".limit-box").offset().top - $(".scroll-nav-wrapper").outerHeight(true) - 10;
            return a;
        }
    });

    //   tabs------------------
    $(".tabs-menu a").on("click", function (a) {
        a.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var b = $(this).attr("href");
        $(".tab-content").not(b).css("display", "none");
        $(b).fadeIn();
    });
    // twitter ------------------
    if ($("#footer-twiit").length > 0) {
        var config1 = {
            "profile": {
                "screenName": 'envatomarket'
            },
            "domId": 'footer-twiit',
            "maxTweets": 2,
            "enableLinks": true,
            "showImages": false
        };
        twitterFetcher.fetch(config1);
    }
    //   Contact form------------------
	$(document).on('submit','#contactform',function(){
        var a = $(this).attr("action");
        $("#message").slideUp(750, function () {
            $("#message").hide();
            $("#submit").attr("disabled", "disabled");
            $.post(a, {
                name: $("#name").val(),
                email: $("#email").val(),
                comments: $("#comments").val()
            }, function (a) {
                document.getElementById("message").innerHTML = a;
                $("#message").slideDown("slow");
                $("#submit").removeAttr("disabled");
                if (null != a.match("success")) $("#contactform").slideDown("slow");
            });
        });
        return false;
    });
 	$(document).on('keyup', '#contactform input, #contactform textarea', function(){
        $("#message").slideUp(1500);
    });
    //   scroll to------------------
    $(".custom-scroll-link").on("click", function () {
        var a = 70 + $(".scroll-nav-wrapper").height();
        if (location.pathname.replace(/^\//, "") === this.pathname.replace(/^\//, "") || location.hostname === this.hostname) {
            var b = $(this.hash);
            b = b.length ? b : $("[name=" + this.hash.slice(1) + "]");
            if (b.length) {
                $("html,body").animate({
                    scrollTop: b.offset().top - a
                }, {
                    queue: false,
                    duration: 1200,
                    easing: "easeInOutExpo"
                });
                return false;
            }
        }
    });
    $(".scroll-init  ul ").singlePageNav({
        filter: ":not(.external)",
        updateHash: false,
        offset: 110,
        threshold: 120,
        speed: 1200,
        currentClass: "act-scrlink"
    });
    $(".to-top").on("click", function (a) {
        a.preventDefault();
        $("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    // scroll animation ------------------
    $(window).on("scroll", function (a) {
        if ($(this).scrollTop() > 150) {
            $(".to-top").fadeIn(500);
        } else {
            $(".to-top").fadeOut(500);
        }
    });
    // modal ------------------
    var modal = {};
    modal.hide = function () {
        $('.modal').fadeOut();
        $("html, body").removeClass("hid-body");
    };
    $('.modal-open').on("click", function (e) {
        e.preventDefault();
        $('.modal').fadeIn();
        $("html, body").addClass("hid-body");
    });
    $('.close-reg').on("click", function () {
        modal.hide();
    });
	// click ------------------
    $(".more-filter-option").on("click", function () {
        $(".hidden-listing-filter").slideToggle(500);
        $(this).find("span").toggleClass("mfilopact");
    });
    $(".show-search-button").on("click", function () {
        $(".vis-header-search").slideToggle(500);
    });
    $(".listing-view-layout li a.list").on("click", function (e) {
        e.preventDefault();
        $(".listing-view-layout li a").removeClass("active");
        $(".listing-item").addClass("list-layout");
        $(this).addClass("active");
    });
    $(".listing-view-layout li a.grid").on("click", function (e) {
        e.preventDefault();
        $(".listing-view-layout li a").removeClass("active");
        $(".listing-item").removeClass("list-layout");
        $(this).addClass("active");
    });
    // Forms ------------------
	$(document).on('change', '.leave-rating input', function() {
        var $radio = $(this);
        $('.leave-rating .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
    });
$('.chosen-select').niceSelect();
    $('input[type="range"].distance-radius').rangeslider({
        polyfill: false,
        onInit: function () {
            this.output = $(".distance-title span").html(this.$element.val());
        },
        onSlide: function (
            position, value) {
            this.output.html(value);
        }
    });
    $('input.datepicker').dateDropper();
    $("input.timepicker").timeDropper({
        setCurrentTime: false,
        meridians: true,
        primaryColor: "#4DB7FE",
        borderColor: "#4DB7FE",
        minutesInterval: '15'
    });
    $(".eye").on("click touchstart", function () {
		var epi = $(this).parent(".pass-input-wrap").find("input");
        if (epi.attr("type") === "password") {
            epi.attr("type", "text");
        } else {
            epi.attr("type", "password");
        }
    });
			var  datacityw = $("#weather-widget").data("city");
$("#weather-widget").ideaboxWeather({
			location		: datacityw,
});
// Styles ------------------
    if ($("footer.main-footer").hasClass("fixed-footer")) {
        $('<div class="height-emulator fl-wrap"></div>').appendTo("#main");
    }
    function csselem() {
        $(".height-emulator").css({
            height: $(".fixed-footer").outerHeight(true)
        });
        $(".slideshow-container .slideshow-item").css({
            height: $(".slideshow-container").outerHeight(true)
        });
        $(".slider-container .slider-item").css({
            height: $(".slider-container").outerHeight(true)
        });
        $(".map-container.column-map").css({
            height: $(window).outerHeight(true)-80+"px"
        });		
}
    csselem();
    // Mob Menu------------------
    $(".nav-button-wrap").on("click", function () {
        $(".main-menu").toggleClass("vismobmenu");
    });
    function mobMenuInit() {
        var ww = $(window).width();
        if (ww < 1064) {
            $(".menusb").remove();
            $(".main-menu").removeClass("nav-holder");
            $(".main-menu nav").clone().addClass("menusb").appendTo(".main-menu");
            $(".menusb").menu();
        } else {
            $(".menusb").remove();
            $(".main-menu").addClass("nav-holder");
        }
    }
    mobMenuInit();
    //   css ------------------
    var $window = $(window);
    $window.on("resize", function() {
        csselem();
        mobMenuInit();
    });
    $(".box-cat").on({
		mouseenter: function () {
        var a = $(this).data("bgscr");
        $(".bg-ser").css("background-image", "url(" + a + ")");
    }});
    $(".header-user-name").on("click", function () {
        $(".header-user-menu ul").toggleClass("hu-menu-vis");
        $(this).toggleClass("hu-menu-visdec");
    });
function showmemberForm (){
		$(".member-modal-wrap , .bmw-overlay").fadeIn(400);
		$("html, body").addClass("hid-body");
	}
	function hidememberForm (){
		$(".member-modal-wrap , .bmw-overlay").fadeOut(400);
		$("html, body").removeClass("hid-body");
	}	
    $(".member-modal-close , .bmw-overlay").on("click", function () {
  		hidememberForm ();
    });
    $(".book-btn").on("click", function (e) {
		e.preventDefault();
  		showmemberForm ();
    });		
var current_fs, next_fs, previous_fs;
    var left, opacity, scale;
    var animating;
    $(".next-form").on("click", function (e) {
        e.preventDefault();
        if (animating) return false;
        animating = true;
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        $("#progressbar li").eq($(".bookiing-form-wrap fieldset").index(next_fs)).addClass("active");
        next_fs.show();
        current_fs.animate({
            opacity: 0
        }, {
            step: function (now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = (now * 50) + "%";
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'position': 'absolute'
                });
                next_fs.css({
                    'left': left,
                    'opacity': opacity,
                    'position': 'relative'
                });
            },
            duration: 1200,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            easing: 'easeInOutBack'
        });
    });
    $(".back-form").on("click", function (e) {
        e.preventDefault();
        if (animating) return false;
        animating = true;
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        $("#progressbar li").eq($(".bookiing-form-wrap fieldset").index(current_fs)).removeClass("active");
        previous_fs.show();
        current_fs.animate({
            opacity: 0
        }, {
            step: function (now, mx) {
                scale = 0.8 + (1 - now) * 0.2;
                left = ((1 - now) * 50) + "%";
                opacity = 1 - now;
                current_fs.css({
                    'left': left,
                    'position': 'absolute'
                });
                previous_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'opacity': opacity,
                    'position': 'relative'
                });
            },
            duration: 1200,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            easing: 'easeInOutBack'
        });
    });	
}
//   Init All ------------------
$(function () {
    initPPE2();
    initparallax();
});

window.onload = function popupCookies() {
    var x = document.getElementById("cookies");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 9999999999999);
};
