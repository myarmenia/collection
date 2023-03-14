
$('.rel_image').click( function () {
    let src = $(this).attr('data-src')
    let id = $(this).attr('data-id')
    $('#modal_picture').attr('src', 'images_realeses/' + src)
    $("#show_more").attr('href', 'base_checklist.php?id=' + id)
})

$(".reload_page").click(function () {
    location.reload()
})

$(".favorite_release").click(function () {
    let id = $(this).attr('data-r-id')
    let user_id = $(".user_id").val()
    let data = $(".data11").html()

    if (user_id != '') {

        if($(this).css('color') == "rgb(255, 255, 255)") {
            $(this).css('color', "gold")
            action = 'add'

        }else {
            $(this).css('color', "white")
            action = 'delete'
        }

        $.post(
            '/favorite_release.php',
            {id, user_id, action, data},
            function (ardyunq) {
                console.log(ardyunq)
            }
        )
    } else {
        alert("You must be registered to perform this transaction․ Please register")
        location.assign('login-register.php')
    }

})