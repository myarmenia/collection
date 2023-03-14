$(".after_week").click(function () {
    let last_day_of_week = $(".days:last").attr("data-day")
    let this_mounth = $(".mounth").attr("data-mounth")
    let this_year = $(".year").html()
    let this_thursday_day = $(".this_thursday_day").val()

    $.post(
        "calendar/week_calendar/after_week_calendar.php",
        {last_day_of_week, this_mounth, this_year, this_thursday_day},
        function (result){
            console.log(11);
            let res = JSON.parse(result)
            $(".calendar_header").html(res.week_days)
            $(".mounth").html(res.week_mounth)
            $(".year").html(res.week_year)
            $(".mounth").attr("data-mounth", res.week_mounth_number)
            $(".this_thursday_day").val(res.this_thursday_day)
            $('.fel').html(res.trs)
        }
    )

})

$(".before_week").click(function () {
    let last_day_of_week = $(".days:first").attr("data-day")
    let this_mounth = $(".mounth").attr("data-mounth")
    let this_year = $(".year").html()
    let this_thursday_day = $(".this_thursday_day").val()

    $.post(
        "calendar/week_calendar/before_week_calendar.php",
        {last_day_of_week, this_mounth, this_year, this_thursday_day},
        function (result){
            console.log(22);
            let res = JSON.parse(result)
            $(".calendar_header").html(res.week_days)
            $(".mounth").html(res.week_mounth)
            $(".year").html(res.week_year)
            $(".mounth").attr("data-mounth", res.week_mounth_number)
            $(".this_thursday_day").val(res.this_thursday_day)
            $('.fel').html(res.trs)
        }
    )

})


