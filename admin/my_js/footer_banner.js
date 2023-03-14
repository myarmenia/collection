let banners = document.getElementsByClassName("add_banner")
let qty_banners = $("#qty_banners").val()
$(".add").click(function () {
    if(qty_banners < 6) {
        $(".form_content").append(' <div class="add_banner">\n' +
            '                            <div class="remove">\n' +
            '                                <i class="fa fa-times-circle"></i>\n' +
            '                            </div>\n' +
            '                            <input type="text" placeholder="Link" name="link[]" required>\n' +
            '                            <input type="file" id="i4" name="file[]" accept="image/*" required>\n' +
            '                        </div>'
        )
        qty_banners++
    }else {
        $(".status").html("<p class='red'>You already have 6 banners</p>")
    }

    if(banners.length < 1) {
        $(".send").prop("disabled", true)
    }
    else {
        $(".send").prop("disabled", false)
    }
})


$("body").on("click", '.remove i', function () {
        $(this).parent().parent().remove()
    if(banners.length < 1) {
        $(".send").prop("disabled", true)
    }else {
        $(".send").prop("disabled", false)
    }
    $(".status").html("")
    qty_banners--
})

$("#add_banner").on("submit", function (e) {
    e.preventDefault()
    $.ajax({
        url: "add_banner.php",
        method: "POST",
        cache: false,
        contentType: false,
        cache: false,
        processData: false,
        data: new FormData(this),
        success: function (ardyunq) {
            $(".status").html(ardyunq)
        }
    })
})

$(".delete_banner").click(function () {
    $(this).parent().parent().remove()
    let delete_id = $(this).parent().parent().find(".delete_id").val()

    $.post(
        "delete_banner.php",
        {delete_id},
        function (result) {
            $(".status").html(result)
        }
    )

})