jQuery(document).ready(function ($){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:true,  
        items:1,
        center:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        autoHeight:true,
        animateOut: 'fadeOut',
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        });
    })