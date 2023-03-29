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



// <---------------------------------------->
    // slider window version
// <---------------------------------------->

$('.slide_section').click(function(){
       
    let slide_child_class = $(this).parent().parent().find('.bigger_block_slider').children()
    let slide_name = slide_child_class.attr('class')
    slide_name = slide_name.split(' ')[0]
    let data_id= $(this).attr("data-id")
    slide_child_class.removeClass();
    slide_child_class.addClass(slide_name + " slide" + data_id);
    console.log(slide_child_class, slide_name)

    let user_id = $(".user_id").val()
    let sport_id = $(event.target).attr("data-id")
    let type = 'checklist';
    $.post(
        'relese_checklist/view_sport_dates.php',
        {sport_id, type, user_id},
        function (result) {
            $('.lock' + sport_id + " .boxer").html(result)
        }
    )

})



// kyanqum chkpnel!!!!!!!!!!!!!!


$('body').on('click',".i-click",function() {
    let date_id = $(this).attr('data-id')
    let sport_id =  $(this).parents('.start2').find(".sport_type_id").val()
    let favorite_type = $(this).parents('.bigger_block_slider').find("input.favorite_type").val()
    let user_id = $(".user_id").val()
    let action = ''
    let parents_class = $(this).parents('.start2').find(".favorite_type")
    let parents_type = ''

    if(user_id != "") {

        if($(parents_class).hasClass('mayr')) {
            parents_type = 'checklists'
        }else if($(parents_class).hasClass('mayr1')){
            parents_type = 'release'
        }

        if($(this).css('color') == "rgb(255, 255, 255)") {
            $(this).css('color', "gold")
            action = 'add'
        }else {
            $(this).css('color', "white")
            action = 'delete'
        }
        $.ajax({
            method:"POST",
            url: "rate_test.php",
            data:{
                  date_id,
                  sport_id,
                  favorite_type,
                  action,
                  user_id,
                  parents_type
            },
            success:function(r){
                console.log(r)
            }
        });
    } else {
        alert("You must be registered to perform this transaction. Please register")
        location.assign('login-register.php')
    }
});

$('.sport9').click(function () {
    location.assign('my_checklist.php')
})