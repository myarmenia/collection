$('#btn').on('click',function(){
    //alert()
    var from_data = $("#from").val()
    var to_data = $("#to").val()
    //alert(from_date+to_date)
    $.ajax({
        type:'POST',
        url:'check_dates.php',
        data: { f_data: from_data,
            t_data: to_data,
        },
        success:function(result){
            $(".status").html(result)
            setTimeout(function () { location.reload(); }, 400)
        }

    })
})