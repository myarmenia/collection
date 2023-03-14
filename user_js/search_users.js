let serch_type = ""
let name
let search_user_id = $(".user_id").val()

$(".first_part").click(function() {
    let user_id = $(this).find(".users_id").val()
    location.assign("/profile.php?id=" + user_id)
})

$(".clear_filter").click(function() {
    $(".select_country").val("Country")
    $(".select_city").val("City")
    $(".search_rating").prop("checked", false)
    $(".search_country").val("")
    $(".search_city").val("")
    $('.select_status').val("Status")
})

let show_filter = 0

$(".show_filter").click(function () {
    if($(window).width() <= 1000) {
        if(show_filter % 2 == 0) {
            $(".flex-item-right").animate({
                height: "600px",
            }, 1000)
        }else {
            $(".flex-item-right").animate({
                height: "50px",
            }, 1000)
        }
        show_filter++
    }
})

$(".remove_select").on("input", function() {
    if($(this).attr("placeholder") == "Type country") {
        $(".select_country").val("Country")
    }else if($(this).attr("placeholder") == "Type city") {
        $(".select_city").val("City")
    }
})

$(".remove_input").on("input", function() {
    if($(this).hasClass("select_country")) {
        $(".search_country").val("")
    }else if($(this).hasClass("select_city")) {
        $(".search_city").val("")
    }
})



$(".serch_nick").on("input", function() {
    serch_type = "nick"
    let name = $(this).val()
    if(name != "'") {
        $.post(
            "search_users_php/search_users.php",
            {serch_type, name, search_user_id},
            function(ardyunq) {
                let json = JSON.parse(ardyunq)
                $(".zzzz1").html(json.content)
                $('.pagination').html(json.pagination)
            }
        )
    }

})



$(".filter").click(function() {
    serch_type = "all"
    let country = ""
    let city = ""
    let rating = ""
    let status = ""
    if($(".search_country").val() != "") {
        country = $(".search_country").val()
    }

    if($(".select_status").val() != "Status") {
        status = $(".select_status").val()
    }

    if($(".select_country").val() != "Country") {
        country = $(".select_country").val()
    }

    if($(".search_city").val() != ""){
        city = $(".search_city").val()
    }

    if($(".select_city").val() != "City") {
        city = $(".select_city").val()
    }

    for(let k1 = 0; k1 < $(".search_rating").length; k1++) {

        let kk1 = $(".search_rating")

        if($(kk1[k1]).prop("checked") == true) {
            rating += $(kk1[k1]).prop("name") + ","
        }

    }
    rating = rating.substring(0, rating.length-1)

    if(city != "" || country != "" || rating != "" || status != "") {
        $.post(
            "search_users_php/search_users.php",
            {serch_type, country, city, rating, search_user_id, status},
            function(ardyunq) {
                let json = JSON.parse(ardyunq)
                console.log(json.sql);
                $(".zzzz1").html(json.content)
                $('.pagination').html(json.pagination)

            }
        )
        $(".filtration_status").html("")
    }
    else {
        $(".filtration_status").html("Fill fields")
    }

})


$('body').on('click', '.pg-link', function(event){
    event.preventDefault()
    let limit=25;
    let page=$(this).attr('data-value')*1
    $('.pg-link').removeClass('active-link')
    $(this).addClass('active-link')

    if(serch_type == "nick") {
        let name = $(".serch_nick").val()
        $.post(
            "search_users_php/search_users.php",
            {serch_type, name, page, limit},
            function(ardyunq) {
                let json = JSON.parse(ardyunq)
                $(".zzzz1").html(json.content)
                $('.pagination').html(json.pagination)
            }
        )
    }

    else {
        $.post(
            "search_users_php/search_users.php",
            {page, limit, search_user_id},
            function(ardyunq) {
                let json = JSON.parse(ardyunq)
                $(".zzzz1").html(json.content)
                $('.pagination').html(json.pagination)
            }
        )
    }

})