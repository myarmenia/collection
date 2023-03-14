$(".before_select_calendar").click(function() {
    let mounth = $(".mounth_year span:first").attr("data-mounth")
    let year = $(".mounth_year span:last").html()*1

    $.ajax({
        'method': 'post',
        'url': "calendar/select_calendar/before_select_calendar.php",
        'data': {mounth, year},
        success: function(res) {
            let result=JSON.parse(res)
            $(".mounth_year span:last").html(result.year)
            $(".mounth_year span:first").html(result.mounth)
            $(".mounth_year span:first").attr("data-mounth", result.mounth_number)
            $(".select_calendar tbody").html(result.table)
            $(".select_calendar_days").html(result.select_calendar_days)
            // console.log(res)
        }
    })
})

$(".after_select_calendar").click(function() {
    let mounth = $(".mounth_year span:first").attr("data-mounth")
    let year = $(".mounth_year span:last").html()*1

    $.ajax({
        'method': 'post',
        'url': "calendar/select_calendar/after_select_calendar.php",
        'data': {mounth, year},
        success: function(res) {
            let result=JSON.parse(res)
            $(".mounth_year span:last").html(result.year)
            $(".mounth_year span:first").html(result.mounth)
            $(".mounth_year span:first").attr("data-mounth", result.mounth_number)
            $(".select_calendar tbody").html(result.table)
            $(".select_calendar_days").html(result.select_calendar_days)
        }
    })
})

