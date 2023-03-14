$(".hover_news").click(function() {
    if( $(".drop_news").hasClass("show") ) {
        location.assign("main_news.php")
    }
    $(".drop_news").toggleClass("show")
    $(this).parent().toggleClass("dropdown")
})