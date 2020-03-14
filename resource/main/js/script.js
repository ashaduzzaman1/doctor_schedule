jQuery(document).ready(function() {
    "use strict";


    /*=== Sticky Header ===*/
    if($("header").hasClass("stick")){
        var menu_bar_height = $(".menu-bar").innerHeight();
        var menu_bar_offset = $(".menu-bar").offset().top;
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= menu_bar_offset) {
                $(".stick").addClass("sticky");
                $(".menu-bar-height").css({
                    "height":menu_bar_height
                });
            } else {
                $(".stick").removeClass("sticky");
                $(".menu-bar-height").css({
                    "height":0
                });
            }
        });
    }


    if($("header").hasClass("stick2")){
        var full_menu_height = $(".full-menu").innerHeight();
        var full_menu_offset = $(".full-menu").offset().top;
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= full_menu_offset) {
                $(".stick2").addClass("sticky2");
                $(".full-menu-height").css({
                    "height":full_menu_height
                });
            } else if (scroll < full_menu_offset){
                $(".stick2").removeClass("sticky2");
                $(".full-menu-height").css({
                    "height":0
                });
            }
        });
    }



    /*=== Responsive Header ===*/
    $(".responsive-topbar-info > div").on("click",function(){
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
    });

    $(".responsive-links > ul li ul").parent().addClass("has-child");
    $(".responsive-links > ul li.has-child > a").on("click",function(){
        $(this).parent().toggleClass("open");
        $(this).next("ul").slideToggle();
        $(this).parent().siblings().removeClass("open").find("ul").slideUp();
        return false;
    });  

    $(".open-menu").on("click",function(){
        $(".responsive-links").addClass("slidein");
        return false;
    });

    $(".responsive-links > span").on("click",function(){
        $(".responsive-links").removeClass("slidein");
    });


    $("nav ul li ul").parent().addClass("has-dropdown");


    /*=== Search Toggle ===*/
    $(".search-btn").on("click",function(){
        $(".fancy-search").slideToggle();
        $(this).toggleClass("active");
        return false;
    });


    /*=== Tabs Fade Effect ===*/
    $(".staff-tabs-selectors .tabs .tab a , .doctors-timetable .tabs .tab a").on("click",function(){
        var tab_id = $(this).attr("href");
        tab_id = tab_id.replace('#', '');
        $("body").find('#' + tab_id).fadeIn(2000);
    });


    /*=================== Canvas Size ===================*/
    var canvas_size = $("#canvas").parent().width();
    $("#canvas").attr("width",canvas_size);


    /*=================== Woocommerce Functionalities  ===================*/
    /*== Add To Cart Button ==*/
    $(".product-hover > a.product-cart").on("click",function(){
        $(this).addClass("added");
        var product_count = parseInt($(this).find("span").html()); 
        $(this).addClass("loading").delay(3000).queue(function(next){
            $(this).removeClass("loading");
            $(this).find("span").html(product_count+1);        
            if(product_count == 0){
                $(this).before("<a class='view-cart' href='#' title=''><i class='fa fa-arrow-right'></i></a>");
            }
            Materialize.toast('The product is successfully added to cart!', 4000);
          next();
        });
        return false;
    });

    /*== Wishlist Button ==*/
    $(".product-hover > a.product-wishlist").on("click",function(){ 
        $(this).addClass("loading").delay(3000).queue(function(next){
            $(this).removeClass("loading");
            if($(this).hasClass("added-to-wishlist")){
                Materialize.toast('The product is successfully removed from wishlist!', 4000);
            }
            else{
                Materialize.toast('The product is successfully added to wishlist!', 4000);
            }
            $(this).toggleClass("added-to-wishlist");
            next();
        });
        return false;
    });

    /*=================== Project Hover Trigger Click On Image  ===================*/
    $(".project-hover a,.product-search").on("click",function(){
        $(this).parent().parent().find(".materialboxed").trigger("click");
        return false;
    });



    /*=================== Datepicker Independency ===================*/
    $('.datepicker').pickadate({
      onOpen:function(){
            $('.picker').appendTo('body');
      },
    });



    /*=================== Smooth Page Scrolling ===================*/
    $("a.btn-text").on("click",function(){
        $(this).parent().siblings().removeClass("active");
        $(this).parent().addClass("active");
    });



    /*=================== Popups ===================*/
    $(".call-popup").on("click",function(){
        $("html").addClass("popup-active");
        var popup_name = $(this).attr("class");
        popup_name = popup_name.replace('call-popup ', '');
        $(".popup-wrapper").find("." + popup_name).addClass("active");
        $(".popup").fadeIn();
        return false;
    });

    $("html").on("click",function(){
        $("html").removeClass("popup-active");
        $(".has-popup-content").removeClass("active");                
        $(".popup").fadeOut();
    });
    $(".has-popup-content").on("click",function(e){
        e.stopPropagation();
    });



    /*=================== Event Map Icons Functionalities ===================*/
    $(".map-icon").on("click",function(){
        $(this).parent().parent().toggleClass("active");
        return false;
    });
    $(".event-detail-img > span").on("click",function(){
        $(this).parent().toggleClass("active");
    });


    /*=================== Opening Timing Background Color ===================*/
    var drop =  $(".opening-shortcode .opening .timing").length;
    var opening_timing =  $(".opening-shortcode .opening .timing");
    var half_drop = Math.round(drop/2);
    var counter = 1;
    $('.opening-shortcode .opening').each(function(){
        var delay = 1;
        var decrement = 0.1;
        $(this).find(opening_timing).each(function(){
            $(this).css({"opacity": delay});
            if(half_drop > counter) {
                delay = delay-decrement;
            }else {
                delay = delay+decrement;
            }
            counter++;
        });
    });

    /*=================== Specialist Social Icons ===================*/
    var icons = $('.specialist-img .social-icons a');
    $('.specialist').each(function(){
        var delay = 0;
        $(this).find(icons).each(function(){
        $(this).css({transitionDelay: delay+'ms'});
        delay += 50;
        });
    });



    /*=================== Accordion ===================*/
    $('.toggle .content').hide();
    $('.toggle h3:first').addClass('active').next().slideDown(500).parent().addClass("activate");
    $('.toggle h3').on("click", function() {
        if ($(this).next().is(':hidden')) {
            $('.toggle h3').removeClass('active').next().slideUp(500).removeClass('animated zoomIn').parent().removeClass("activate");
            $(this).toggleClass('active').next().slideDown(500).addClass('animated zoomIn').parent().toggleClass("activate");
        }
    });



    /*=================== Parallax ===================*/
    $('.parallax').parallax();



    /*=================== LightBox ===================*/
    var foo = $('.lightbox');
    foo.poptrox({
        usePopupCaption: true,
        usePopupNav: true,
    });



    /*=================== Materialize ===================*/
    $('select').material_select();    

    $('.datepicker').pickadate({
        selectMonths:true, // Creates a dropdown to control month
        selectYears:15 // Creates a dropdown of 15 years to control year
    });    
     $('.materialboxed').materialbox();




    /*=================== Contact Form ===================*/
    $('form#contact-form').submit(function (event) {
    event.preventDefault();
    var contactform = $('form#contact-form');
    var formresult = $('#formresult');
    var button = $('form#contact-form button#submit');
    var formdata = $(contactform).serialize();

    $.ajax({
        type: 'POST',
        url: $(contactform).attr('action'),
        data: formdata,
        dataType: 'json',
        beforeSend: function () {
        $(button).attr('disabled', true);
        },
        success: function (response) {
        $(button).attr('disabled', false);
        $(formresult).empty();
        if (response.mail === false) {
            $("#formresult").slideUp();
            $(formresult).html(response.msg);
            $("#formresult").slideDown("slow");
        } else {
            $(formresult).html(response.msg);
            $(contactform).slideUp('slow');
        }
        },
    });
    return false;
    });


    /* ============ Sidemenu Scroll ================*/
    $('.cash-popup-inner').enscroll({
        showOnHover: false,
        verticalTrackClass: 'track3',
        verticalHandleClass: 'handle3'
    });

}); /*=== Document.Ready Ends Here ===*/




jQuery(window).load(function() {
    "use strict";
    $(".pageloader").fadeOut("slow");
}); /*=== Document.Ready Ends Here ===*/

