
$(".before_mounth").click(function() {
    let mounth = $(".mounth").attr("data-mounth")
    let year = $(".year").html()

    $.ajax({
        'method': 'post',
        'url': "calendar/mounth_calendar/before_mounth_calendar.php",
        'data': {mounth, year},
        success: function(res) {
            let result=JSON.parse(res)
            $(".year").html(result.year)
            $(".mounth").html(result.mounth)
            $(".mounth").attr("data-mounth", result.mounth_number)
            $(".calendar_body").html(result.table)
        }
    })
})


$(".after_mounth").click(function() {
    let mounth = $(".mounth").attr("data-mounth")
    let year = $(".year").html()
    $.ajax({
        'method': 'post',
        'url': "calendar/mounth_calendar/after_mounth_calendar.php",
        'data': {mounth, year},
        success: function(res) {
            let result=JSON.parse(res)
            $(".year").html(result.year)
            $(".mounth").html(result.mounth)
            $(".mounth").attr("data-mounth", result.mounth_number)
            $(".calendar_body").html(result.table)
        }
    })
})

$(".select_day").click(function () {
    let week_start = $(this).parents(".f_first").children().first().find('.number_day').text()


})