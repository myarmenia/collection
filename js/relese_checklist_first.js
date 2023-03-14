// $(document).ready(function(){
//     $('.section4').owlCarousel({
//         loop:true,
//         rewind:true,
//         autoplay:true,
//         autoplayHoverPause:true,
//         margin:0,
//         nav:true,
//         dots:true,
//         navText:["",""],
//         items:1,
//         URLhashListener:true,
//     onChange:hashes
// });
// function hashes(){
//     setTimeout(function(){
//         var hashes=$(".owl-item.active").find(".section4_item").data('slidn');
//         $(".section4_nav a.active").removeClass("active");
//         $('a[data-hashes="'+hashes+'"]').addClass("active");
//     },10)}
//
//     $(window).on('load',hashes);
//         $(".section4_nav a").click(function(e){
//             e.preventDefault();
//             var slideNumber=$(this).data('hashes');
//             $('.section4').trigger('to.owl.carousel',slideNumber);
//             hashes();
//         });
// });

if($(".favorite_dates").attr("aria-hidden") == "true") {
    $(".favorite_dates").attr("aria-hidden", false)
}





